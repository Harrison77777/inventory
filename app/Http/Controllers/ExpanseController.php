<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Expanse;

class ExpanseController extends Controller
{
    public function index(){
        //$months = Expanse::select('month')->distinct()->get();
       
        $month = date('F');
        $currentMonthExpanses = Expanse::where('month', $month)->orderBy('id','desc')->get();
        return view('expanse.index', compact('currentMonthExpanses'));
    }
    public function create(){
        
        return view('expanse.create');
    }
    public function store(Request $request){
        
        $validator = Validator::make($request->all(),[
            'description' => 'required',
            'amount' => 'required|numeric',
        ]);
        date_default_timezone_set('Asia/Dhaka');
        $date = date('d/m/Y');
        $month = date('F');
        if ($validator->passes()) {
            $addExpanse = new Expanse();
            $addExpanse->description = $request->description;
            $addExpanse->date =$date;
            $addExpanse->month = $month;
            $addExpanse->amount = $request->amount;
            $addExpanse->save();
            return \response()->json(['successMsg'=> 'Successfully a new expanse added :)']);
        }else{
            return \response()->json(['errorMsg'=> $validator->errors()->all()]);
        }
    }
    public function todayExpanse(){
        date_default_timezone_set('Asia/Dhaka');
        $date = date('d/m/Y');
        $todayExpanses = Expanse::where('date', $date)->orderBy('id', 'desc')->get();
        $totalAmount = 0;
        foreach ($todayExpanses as $value) {
            $totalAmount = $totalAmount + $value->amount;
        }
        return view('expanse.today_all_expanse', compact('todayExpanses', 'totalAmount'));
    }

}
