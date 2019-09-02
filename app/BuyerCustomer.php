<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyerCustomer extends Model
{
    protected $fillable = [
        'name', 
        'email',
        'address',
        'date', 
        'month', 
        'year', 
    ];
    public function confirmProducts(){
        return $this->hasMany(ConfirmProduct::class);
    }
}
