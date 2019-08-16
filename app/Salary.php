<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'emp_id',
        'Pay_month',
        'Pay_amount',
        'status',
    ];

    public function employee()
    {
        return $this->belongsTo(Employe::class);
    }
}
