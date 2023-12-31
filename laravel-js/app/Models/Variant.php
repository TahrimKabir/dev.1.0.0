<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable = [
        'title', 'description'
    ];

    public function PVariant()
    {
        return $this->hasMany(ProductVariant::class,'id','variant_id');
    }
}
