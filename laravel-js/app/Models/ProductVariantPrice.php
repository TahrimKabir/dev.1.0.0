<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariantPrice extends Model
{
    public function V1()
    {
        return $this->belogngsTo(ProductVariant::class,'product_variant_one','id');
    }
    public function V2()
    {
        return $this->belogngsTo(ProductVariant::class,'product_variant_two','id');
    }
    public function V3()
    {
        return $this->belogngsTo(ProductVariant::class,'product_variant_three','id');
    }
}
