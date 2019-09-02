<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrepareProduct extends Model
{
    protected $fillable = [
        'product_id',
        'status',
        'quantity',
    ];

    public function product(){

        return $this->belongsTo('App\Product');
        
    }
}
