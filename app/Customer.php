<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'shop_or_company',
        'bank_holder',
        'bank_branch',
        'bank_account',
    ];
}
