<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'Vendor_price',
        'sale_price',
        'photo',
        'cat_id',
        'supplier_id',
        'brand',
    ];
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function prepareProducts()
    {
        return $this->hasMany(PrepareProduct::class, 'product_id');
    }
    public function confirmProducts()
    {
        return $this->hasMany(ConfirmProduct::class, 'product_id');
    }
}
