<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\PreBooking;
use Carbon\Carbon;
use App\Models\User;


class ReportSupplierIndividualController extends Controller
{
    public function index(){
      $today = date('Y-m-d');
      $_start_date = date('d/m/Y',strtotime($today));
      $_end_date = date('d/m/Y',strtotime($today));
/*
      $attendance_report_data = User::leftjoin('tbattendance',function($join) use($today){
                                  $join->on("users.id","tbattendance.employeeId")->whereDate('tbattendance.created_at',$today);
                                })
                              ->leftJoin('status','status.id','tbattendance.status')
                              ->select('users.id as id','users.name as name','users.tel as tel','tbattendance.regtime','tbattendance.outtime','tbattendance.status')
                              ->get();
                              */

        $prebookings=PreBooking::whereNotNull('po_number')->get();               

      // return $attendance_report_data;
      $suppliers =  Supplier::all();
      
      return view('report.supplierindividual.index',compact('prebookings','suppliers','_start_date','_end_date'));
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


    $prebookings=PreBooking::whereNotNull('po_number');
      if(!is_null($request->supplier) AND $request->supplier != '0'){

        $prebookings->where('supplier_id',$request->supplier);
      }
        $prebookings->whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->get();               

      // return $attendance_report_data;
        $_start_date=$start_date;
        $_end_date=$end_date;
        $_supplier=$request->supplier;
      $suppliers =  Supplier::all();
       return view('report.supplierindividual.index',compact('prebookings','suppliers','_start_date','_end_date','_supplier'));
      
    }
}
