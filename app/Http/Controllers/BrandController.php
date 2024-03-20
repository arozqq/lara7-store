<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\{Brand, Cart, Category};
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        if (request()->ajax()) {
            return DataTables::of($brands)
                ->addColumn('action', function ($data) {
                    $action = '<a href="javascript:void(0)" class="btn btn-warning text-white mx-3" id="edit-brand" data-toggle="modal" data-id=' . $data->id . '>Edit</a><a href="javascript:void(0)" id="delete-brand" data-id=' . $data->id . ' class="btn btn-danger text-white delete-user">Delete</a>';
                    return $action;
                })
                ->addColumn('checkbox', function ($data) {
                    $checkbox = '<td><div class="custom-checkbox custom-control text-center"><input type="checkbox" class="custom-control-input checkbox-select" id="' . $data->id . '" name="ids" value="' . $data->id . '"><label for="' . $data->id . '" class="custom-control-label"></label></div></td>';
                    return $checkbox;
                })
                ->rawColumns(['action', 'checkbox'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.brand');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand_name' => 'required'
        ];

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $logoInput = $request->file('logo');
        if ($logoInput) {
            $fileName = $logoInput->getClientOriginalName();
            $path = 'storage/image/brands/' . strtolower(str_replace(" ", "-", $fileName));
            $logo_resize = Image::make($logoInput->getRealPath());
            $logo_resize->resize(270, 270)->save($path);
            $logo = 'image/brands/' . strtolower(str_replace(" ", "-", $fileName));
        } else {
            $logo = null;
        }

        Brand::create([
            'brand_name' => $request->brand_name,
            'slug' => Str::slug($request->brand_name),
            'logo' => $logo
        ]);

        return response()->json(['success' => 'Brand added.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        $brands = Brand::get();
        $categories = Category::get();
        $products = $brand->product()->where('status', 1)->latest()->paginate(8);
        return view('layouts.front_layout.front-master', compact('products', 'brands', 'categories', 'brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $product  = Brand::where($where)->first();
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($logoInput = $request->file('logo')) {
            Storage::delete($request->hidden_logo);
            $fileName = $logoInput->getClientOriginalName();
            $path = 'storage/image/brands/' . strtolower(str_replace(" ", "-", $fileName));
            $logo_resize = Image::make($logoInput->getRealPath());
            $logo_resize->resize(270, 270)->save($path);
            $logo = 'image/brands/' . strtolower(str_replace(" ", "-", $fileName));
        } else {
            $logo_path = Brand::where('id', $request->id)->first(["logo"]);
            $logo = $logo_path->logo;
        }
        $data = ['brand_name' => $request->brand_name,     'slug' => Str::slug($request->brand_name), 'logo' => $logo];
        Brand::whereId($request->id)->update($data);

        return response()->json(['success' => 'Brand Updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Brand::where('id', $id)->first(['logo']);
        Storage::delete($data->logo);
        Brand::findOrFail($id)->delete();
        return response()->json([
            'success' => 'Brand deleted.'
        ]);
    }

    public function deleteSelected()
    {
        $ids = request()->input('id');
        $singular_data = explode(",", $ids);

        foreach ($singular_data as $id) {
            $i = Brand::findOrFail($id);
            Storage::delete($i->logo);
            $i->delete();
        }
        return response()->json(['success' => "Brands have been deleted"]);
    }
}
