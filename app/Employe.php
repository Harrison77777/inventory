<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'experience',
        'salary',
        'city',
        'photo',
    ];

    public function advance_salary()
    {
        return $this->hasMany(AdvanceSalary::class);
    }
    public function salary()
    {
        return $this->hasMany(Salary::class);
    }
    public function attendances(){
       return $this->hasMany(Attendance::class, 'employe_id');
    }
}
