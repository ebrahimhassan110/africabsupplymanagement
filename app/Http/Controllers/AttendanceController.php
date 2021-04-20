<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;
use DB;
use Auth;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if ($role->hasPermissionTo('attendance-index')){
            $attendance_data = DB::table('users')->leftJoin("tbattendance",function($join){
            $today = date("Y-m-d");
            $join->on("tbattendance.employeeId","users.id")->whereDate('tbattendance.regdate',$today );
        })->select('users.*','tbattendance.*','users.id as employee_id')->leftjoin('attendance_status','attendance_status.id','tbattendance.status')
        ->get();
   
        $status = DB::table("attendance_status")->get();
        return view("attendance.index",compact("attendance_data","status"));
      }
      else
          return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $today = date('Y-m-d');
        $data = [];
        $data['employeeId'] = $request->employee;
        $data['comment'] = $request->remark;
        $data['status'] = $request->status;
        $data['regdate'] = date('Y-m-d H:i:s');
        $data['regtime'] =$request->time_in;
        $data['outtime'] = $request->time_out;
        $data['created_by'] = Auth::id();
        $data['isdel'] = '0';
        $att = Attendance::where('employeeId',$request->employee)->whereDate('regdate',$today)->get();

        if(count($att)){

            $user = DB::table('tbattendance')
                    ->where('employeeId', $request->employee)  // find your user by their email
                    ->whereDate('regdate', $today)
                    ->limit(1)  // optional - to ensure only one record is updated.
                    ->update(array('outtime' => $request->time_out,'comment'=>$request->remark));
        }else{

            $att = Attendance::create($data);

        }

        if($att){
            return response()->json(['success' => 'manual entry successfully updated']);
        }else{
            return response()->json(['error' => 'manual entry successfully updated']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

     public function search(Request $request)
    {
        //

        $request->validate([
            'attendance_date' => ['required','date_format:d/m/Y']
        ]);



        $date= Carbon::createFromFormat('d/m/Y',$request->attendance_date);
        $date = $date->format("Y-m-d");
        //return $date;
        $attendance_data = DB::table('users')->leftJoin("tbattendance",function($join) use ($date){

            $join->on("tbattendance.employeeId","users.id")->whereDate('tbattendance.regdate',$date );
        })->select('users.*','tbattendance.*','users.id as employee_id')->get();

        return view("attendance.index",compact("attendance_data","date"));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
