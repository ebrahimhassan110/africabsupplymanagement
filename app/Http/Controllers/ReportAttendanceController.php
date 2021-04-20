<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;
use App\Models\User;
class ReportAttendanceController extends Controller
{
    public function index(){
      $today = date('Y-m-d');
      $_start_date = date('d/m/Y',strtotime($today));
      $_end_date = date('d/m/Y',strtotime($today));

      $attendance_report_data = User::leftjoin('tbattendance',function($join) use($today){
                                  $join->on("users.id","tbattendance.employeeId")->whereDate('tbattendance.created_at',$today);
                                })
                              ->leftJoin('status','status.id','tbattendance.status')
                              ->select('users.id as id','users.name as name','users.tel as tel','tbattendance.regtime','tbattendance.outtime','tbattendance.status')
                              ->get();

      // return $attendance_report_data;
      $employees =  User::all();
      $statuses = \DB::table('tbstatus')->get();
      return view('report.attendance.index',compact('attendance_report_data','employees','statuses','_start_date','_end_date'));
    }

    public function show(Request $request){
      $request->validate([
          'start_date' => ['required','date_format:d/m/Y'],
          'end_date' => ['required','date_format:d/m/Y']
      ]);

      $start_date= Carbon::createFromFormat('d/m/Y',$request->start_date);
      $start_date = $start_date->format("Y-m-d");
      $end_date= Carbon::createFromFormat('d/m/Y',$request->end_date);
      $end_date = $end_date->format("Y-m-d");


      $attendance_report_data = Attendance::with('employee')->with('_status');
      if(!is_null($request->employee) AND $request->employee != '0'){
        $attendance_report_data->where('employeeId',$request->employee);
      }
      if(!is_null($request->status) AND $request->status != '0'){
        $attendance_report_data->where('status',$request->status);
      }
      $attendance_report_data = $attendance_report_data->whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->get();

      $employees =  User::all();
      $statuses = \DB::table('tbstatus')->get();
      return view('report.attendance.index',compact('attendance_report_data','employees','statuses'));
    }
}
