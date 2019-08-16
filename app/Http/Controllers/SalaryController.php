<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\AdvanceSalary;
use App\Employe;
use App\Salary;
class SalaryController extends Controller
{
    public function index()
    {
        
        $employees = Employe::all();
        
        return view('salary.index', compact('employees'));
    }
    public function payAdvanceSalary()
    {
        $employees = Employe::select('id', 'name')->get();
        return view('salary.pay_advance_salary', compact('employees')); 
    }
    public function AcceptAdvanceSalary(Request $request){

        $validator = Validator::make($request->all(), 
        [
           
            'year' => 'required',
            'month' => 'required',
            'salary_amount' => 'required',
            'emp_id' => 'required',
        ],
        [
            'emp_id.required' => 'Name field must not be empty.'
        ]
        );
        $CheckDuplicateAdvanceSalary = AdvanceSalary::where('month', $request->month)
            ->where('emp_id', $request->emp_id)->get();
        if ($validator->passes()) {
            if ($CheckDuplicateAdvanceSalary->count() > 0) {
                return response()->json(['errorMsg' => 'This employer has already been taken the advance salary of '.$request->month]);
            }else {
                $advanceSalary = new AdvanceSalary();
                $advanceSalary->emp_id = $request->emp_id;
                $advanceSalary->salary_amount = $request->salary_amount;
                $advanceSalary->month = $request->month;
                $advanceSalary->year = $request->year;
                $advanceSalary->save();
                return response()->json(['successMsg' => 'Successfully advance salary is given :)']);
            }
        }else {
            $allError = 0;
            foreach ($validator->errors()->all() as $error) {
                $allError = $error;
            }
            return response()->json(['errorMsg'=> $allError]);
        }

    }
}
