<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    public function Product()
    {
        return $this->belogngsTo(Product::class,'id','product_id');
    }

    public function Variant()
    {
        return $this->belogngsTo(Variant::class,'variant_id','id');
    }
    
    public function pv1()
    {
        return $this->hasMany(ProductVariantPrice::class,'product_variant_one','id');
    }
    public function pv2()
    {
        return $this->hasMany(ProductVariantPrice::class,'product_variant_two','id');
    }
    public function pv3()
    {
        return $this->hasMany(ProductVariantPrice::class,'product_variant_three','id');
    }
}
