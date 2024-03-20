<?php

namespace App\Http\Controllers;

use App\{Product, Brand, Category, Cart};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Yajra\DataTables\DataTables;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        $brands = Brand::get();
        $categories = Category::get();
        if (request()->ajax()) {
            return DataTables::of($products)
                ->addColumn('action', function ($data) {
                    $action = '<div class="d-flex justify-content-evenly align-item-center"><a href="javascript:void(0)" class="btn btn-warning text-white" id="edit-product" data-toggle="modal" data-id=' . $data->id . '>Detail</a><a href="javascript:void(0)" id="delete-product" data-id=' . $data->id . ' class="btn btn-danger text-white delete-user mx-3">Delete</a></div>';
                    return $action;
                })
                ->editColumn('brand_id', function ($data) {
                    return $data->brand->brand_name;
                })
                ->editColumn('category_id', function ($data) {
                    return $data->category->category_name;
                })
                ->editColumn('status', function ($data) {
                    if ($data->status === 1) {
                        return "Active";
                    } else {
                        return "Inactive";
                    }
                })
                ->editColumn('harga', function ($data) {
                    return "Rp. " . number_format($data->harga, 0, ',', '.');
                })
                ->addColumn('checkbox', function ($data) {
                    $checkbox = '<td><div class="custom-checkbox custom-control text-center"><input type="checkbox" class="custom-control-input checkbox-select" id="' . $data->id . '" name="ids" value="' . $data->id . '"><label for="' . $data->id . '" class="custom-control-label"></label></div></td>';
                    return $checkbox;
                })
                ->rawColumns(['action', 'checkbox'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.product', compact(['brands', 'categories', 'products']));
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
            'image ' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_name' => 'required',
            'category_name' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ];

        $error = Validator::make($request->all(), $rules);

        // make response error
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // single img (PR MULTIPLE IMG)
        $img = $request->file('image');
        if ($img) {
            $fileName = $img->getClientOriginalName();
            $path = 'storage/image/products/' . strtolower(str_replace(" ", "-", $fileName));
            $image_resize = Image::make($img->getRealPath());
            $image_resize->resize(270, 270)->save($path);
            $image_data = 'image/products/' . strtolower(str_replace(" ", "-", $fileName));
        } else {
            $image_data = null;
        }


        Product::create([
            'product_name' => $request->product_name,
            'slug' => Str::slug($request->product_name),
            'stok' => $request->stok,
            'harga' => $request->harga,
            'status' => $request->status,
            'gender' => $request->gender,
            'deskripsi' => $request->deskripsi,
            'thumbnail' => $image_data,
            'brand_id' =>  $request->brand_name,
            'category_id' =>  $request->category_name,
            'featured' => $request->featured,
        ]);

        return response()->json(['success' => 'Product added.']);
    }


    public function show(Product $product)
    {
        $brands = Brand::get();
        $related = Product::where(['category_id' => $product->category_id], ['status', 1])->inRandomOrder()->take(4)->get();
        $categories = Category::get();
        return view('product.detail', compact('product', 'brands', 'categories', 'related'));
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
        $product  = Product::where($where)->first();
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
        $rules = [
            'image ' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_name' => 'required',
            'category_name' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ];

        $error = Validator::make($request->all(), $rules);

        // make response error
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        if ($imgInput = $request->file('image')) {
            Storage::delete($request->hidden_image);
            $fileName = $imgInput->getClientOriginalName();
            $path = 'storage/image/products/' . strtolower(str_replace(" ", "-", $fileName));
            $image_resize = Image::make($imgInput->getRealPath());
            $image_resize->resize(270, 270)->save($path);
            $image_data = 'image/products/' . strtolower(str_replace(" ", "-", $fileName));
        } else {
            $old_img = Product::where('id', $request->id)->first(["thumbnail"]);
            $image_data = $old_img->thumbnail;
        }



        $data = [
            'product_name' => $request->product_name,
            'slug' => Str::slug($request->product_name),
            'stok' => $request->stok,
            'harga' => $request->harga,
            'status' => $request->status,
            'gender' => $request->gender,
            'deskripsi' => $request->deskripsi,
            'thumbnail' => $image_data,
            'brand_id' =>  $request->brand_name,
            'category_id' =>  $request->category_name,
            'featured' => $request->has('featured'),
        ];

        Product::whereId($request->id)->update($data);
        return response()->json(['success' => 'Product Updated.']);
    }

    /**`
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::where('id', $id)->first(['thumbnail']);
        Storage::delete($data->thumbnail);
        Product::findOrFail($id)->delete();
        return response()->json([
            'success' => 'Product deleted.'
        ]);
    }

    // delete selected
    public function deleteSelected()
    {
        $ids = request()->input('id');
        $data = Product::whereIn('id', explode(",", $ids))->select("thumbnail")->get();
        foreach ($data as $d) {
            Storage::delete($d->thumbnail);
        }
        Product::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Product have been deleted"]);
    }

    // add to cart
    public function addToCart(Request $request)
    {
        $data = $request->all();

        // cek stok tersedia atau tidak
        $getStok = Product::where('id', $data['product_id'])->first();
        if ($getStok->stok < $data['quantity']) {
            $message = "Stok kurang dari yang dibutuhkan.";
            return redirect()->back()->withErrors($message);
        }
    }
}
