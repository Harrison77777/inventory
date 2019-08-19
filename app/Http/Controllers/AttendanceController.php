<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Employe;
use DB;
class AttendanceController extends Controller
{
    
    public function index(){
        date_default_timezone_set('Asia/Dhaka');
        $date = date('d-m-Y'); 
        $currentMonth = date('F');
        $previousMonth = date('F', strtotime('-1 month'));
        $attendances = Attendance::where('date', $date)->get();
        return view('attendance.index', compact('date', 'currentMonth', 'previousMonth', 'attendances'));

    }
    public function takeAttendance()
    {
        date_default_timezone_set('Asia/Dhaka');
        $date = date('d-m-Y'); 
        $year = date('Y'); 
        $employees = Employe::select('id','name', 'photo')->get();
        return view('attendance.take_attendance', compact('date', 'year', 'employees'));

    }
    public function insertAttendance(Request $request){
        date_default_timezone_set('Asia/Dhaka');
        $date = date('d-m-Y'); 
        $month = date('F'); 
        $year = date('Y');
        $CheckTodayAttendance = Attendance::where('date', $date)->select('date')->get(); 
    if ($CheckTodayAttendance->count() > 0){
       session()->flash('errorMsg', 'Today attendance has already been taken..');
       return redirect()->back(); 
    }else {
        foreach ($request->attendance as $key => $value) {  
        $insertAttendance = new Attendance();
        $insertAttendance->employe_id = $key;
        $insertAttendance->attend = $value; 
        $insertAttendance->date = $date; 
        $insertAttendance->month = $month; 
        $insertAttendance->year = $year; 
        $insertAttendance->save(); 
            }
    }
       session()->flash('successMsg', 'Successfully today attendance has been taken :)');
       return redirect()->back();  
    }

    public function currentMonthAttendance()
    {
        $date = date('d/m/Y'); 
        $currentMonth = date('F');
        $dates = Attendance::where('month', $currentMonth)->select('date')->distinct()->get();
        return view('attendance.all_current_month_attendance', compact('dates'));
    }

    public function dateWiseAttendance($date){
        $showDate = $date;
        $attendances = Attendance::with(['employee'])->where('date', $date)->get();
        return view('attendance.date_wise_attendance', compact('attendances', 'showDate'));
    }

    
}
