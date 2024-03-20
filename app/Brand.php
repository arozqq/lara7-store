<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = ['brand_name', 'slug', 'logo'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}