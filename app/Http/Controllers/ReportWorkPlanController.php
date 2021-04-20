<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Workplan;
use Carbon\Carbon;
use App\Models\User;
class ReportWorkPlanController extends Controller
{
    public function index(){
      $today = date('Y-m-d');
      $_start_date = date('d/m/Y',strtotime($today));
      $_end_date = date('d/m/Y',strtotime($today));
      $workplan_report_data = Workplan::with('Employee')->with('customer')->with('worktype')->whereDate('created_at',$today)->orderBy('created_at', 'desc')->get();
      $employees =  User::all();
      $statuses = \DB::table('workplan_status')->get();
      return view('report.workplan.index',compact('workplan_report_data','employees','statuses','_start_date','_end_date'));
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


      $workplan_report_data = Workplan::with('Employee')->with('customer')->with('worktype');
      if(!is_null($request->employee) AND $request->employee != '0'){
        $workplan_report_data->where('employeeId',$request->employee);
      }
      if(!is_null($request->status) AND $request->status != '0'){
        $workplan_report_data->where('status',$request->status);
      }
      $workplan_report_data = $workplan_report_data->whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->orderBy('created_at', 'desc')->get();
      $employees =  User::all();
      $statuses = \DB::table('workplan_status')->get();
      return view('report.workplan.index',compact('workplan_report_data','employees','statuses'));
    }
}
