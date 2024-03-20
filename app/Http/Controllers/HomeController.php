<?php

namespace App\Http\Controllers;

use App\{Brand, Category, Product, Cart};
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function index()
  {
    return view('layouts.front_layout.front-master', [
      'categories' => Category::get(),
      'brands' => Brand::get(),
      'products' => Product::with(['category', 'brand'])->where(['featured' => 1])->latest()->paginate(8)
    ]);
  }
}
