<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'summary', 'description', 'stock', 'price', 'offer_price', 'discount', 'conditions', 'status', 'photo', 'vendor_id', 'cat_id', 'brand_id', 'child_cat_id', 'size'];


    /* public  function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'cat_id', 'id');
    }*/

    public  function rel_prods()
    {
        return $this->hasMany('App\Models\Product', 'cat_id', 'cat_id')->where('status', 'active')->limit('10');
    }
}
