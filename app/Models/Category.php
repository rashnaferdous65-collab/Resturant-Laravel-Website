<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   

     
     protected $fillable = [
        'cat_title',
       
    ];

     public function carts()
    {
        return $this->hasMany(Cart::class, 'category_id');
    }
}
