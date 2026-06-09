<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
       protected $fillable = [
        'name',
        'email',
        'phone',
        'title',
        'price',
        'category_id',
        'quantity',
        'image',
        'delivary_status',
       
    ];

    public function category(){

        return $this->belongsTo(Category::class);
    }

}
