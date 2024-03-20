<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name', 'slug', 'harga', 'stok', 'gender', 'deskripsi', 'thumbnail', 'brand_id', 'category_id', 'user_id', 'status', 'featured'];
    protected $with = ['category', 'brand'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
