<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfirmProduct extends Model
{
    protected $fillable = [
        'product_id', 
        'buyer_customer_id', 
        'quantity', 
        'date', 
        'month', 
        'year', 
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function buyerCustomer()
    {
        return $this->belongsTo(BuyerCustomer::class);
    }
}
