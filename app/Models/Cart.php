<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
      protected $fillable = [
        'title',
        'description',
        'quantity',
        'price',
        'image',
        'category_id',
       
    ];

    public function category(){

        return $this->belongsTo(Category::class);
    }
}
