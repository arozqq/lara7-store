<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\{Category, Brand, Product, Cart};
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        if (request()->ajax()) {
            return DataTables::of($categories)
                ->addColumn('action', function ($data) {
                    $action = '<a href="javascript:void(0)" class="btn btn-warning text-white mx-3" id="edit-category" data-toggle="modal" data-id=' . $data->id . '>Edit</a><a href="javascript:void(0)" id="delete-category" data-id=' . $data->id . ' class="btn btn-danger text-white delete-user">Delete</a>';
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
        return view('admin.category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCategory(Request $request, Category $category)
    {
        $request->validate(['category_name' => 'required|min:3']);
        $id = $request->id;

        $category->updateOrCreate(
            ['id' =>  $id],
            ['category_name' => $request->category_name, 'slug' => Str::slug($request->category_name)],
        );

        if (empty($request->id)) {
            $msg = 'Category added.';
        } else {
            $msg = 'Category updated.';
        }
        return redirect()->back()->with('success', $msg);
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
        $categories = Category::where($where)->first();
        return response()->json($categories);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return response()->json([
            'success' => 'Category deleted!'
        ]);
    }

    public function deleteSelected()
    {
        $ids = request()->input('id');
        Category::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Categories have been deleted"]);
    }

    public function show(Category $category)
    {
        $brands = Brand::get();
        $categories = Category::get();
        $products = $category->product()->where('status', 1)->latest()->paginate(8);
        return view('layouts.front_layout.front-master', compact('products', 'brands', 'categories', 'category'));
    }
}
