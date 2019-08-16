<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvanceSalary extends Model
{
   protected $fillable = [
        'employee_id',
        'month',
        'year',
        'salary_amount',
    ];

    public function employee_id()
    {
        return $this->belongsTo(Employe::class);
    }
}
