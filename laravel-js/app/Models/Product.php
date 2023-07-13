<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'sku', 'description'
    ];
    
    // ProductVariant
    public function ProductVariant()
    {
        return $this->hasMany(ProductVariant::class,'product_id','id');
    }

    // price
    public function Price()
    {
        return $this->hasMany(ProductVariantPrice::class,'product_id','id');
    }
}
