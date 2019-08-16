<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable =[
        'name',
        'email',
        'phone',
        'address',
        'shop_address',
        'type',
        'Main_supplier_or_distributor',
        'photo',
        'payment_way',
    ];
}
