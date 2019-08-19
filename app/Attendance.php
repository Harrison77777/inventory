<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'employe_id',
        'date',
        'month',
        'year',
    ];
    public function employee(){

       return $this->belongsTo(Employe::class, 'employe_id');

    }

}
