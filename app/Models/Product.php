<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'type', 'description', 'price', 'slug', 'quantity'
    ];

    //ada bbrp variabel(cth: name) yg gk mau kita munculin kita bs masukan ke hidden
    protected $hidden = [
        
    ];

    //relasi ke tabel product-gallery
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class,'products_id');
    }
}