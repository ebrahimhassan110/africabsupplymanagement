<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Workplan;
use App\Models\Customer;
use App\Models\WorkType;
use App\Models\User;
use App\Models\Institute;
use Auth;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
class WorkflowController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if ($role->hasPermissionTo('workplan-index')){
        $permissions = Role::findByName($role->name)->permissions;
        foreach ($permissions as $permission)
            $all_permission[] = $permission->name;
        if(empty($all_permission))
            $all_permission[] = 'dummy text';

        $workplans = DB::table('tbworkorder')
                    ->join("tbcustomer","tbcustomer.customerId","tbworkorder.customerId")
                    ->join("workplan_status","workplan_status.id","tbworkorder.status")
                    ->join("users","users.id","tbworkorder.employeeId")
                    ->join("tbworktype","tbworktype.worktypeId","tbworkorder.worktypeId");

        if( Auth::user()->role_id != 1 ){
          $workplans = DB::table('tbworkorder')
                      ->join("tbcustomer","tbcustomer.customerId","tbworkorder.customerId")
                      ->join("users","users.id","tbworkorder.employeeId")
                      ->join("workplan_status","workplan_status.id","tbworkorder.status")
                      ->join("tbworktype","tbworktype.worktypeId","tbworkorder.worktypeId")
                      ->where('employeeId', Auth::id());
        }

        $workplans = $workplans->paginate(100);
        $customers =  Customer::all();
        $worktypes =  WorkType::all();
        $employees =  User::all();
        $status =  DB::table("workplan_status")->get();
        return view('workflow.index',compact('workplans','customers','worktypes','employees','status','all_permission'));
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
        $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
        if ($role->hasPermissionTo('workplan-add')){
        $customers =  Customer::all();
        $institutes =  Institute::all();
        $Workstypes =  WorkType::all();
        $users =  User::all();
        $status =  DB::table("workplan_status")->get();
        return view('workflow.create',compact('customers','Workstypes','users','status'));
      }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        // $request->validate([
        //     'time' => ['regex:/\b((1[0-2]|0?[1-9]):([0-5][0-9]) ([AaPp][Mm]))/i'],
        // ]);
        $sessions =  Workplan::whereDate('start_time', Carbon::create($request->start_time)->toDateString())
                    ->select(DB::raw("TIME(start_time) as start_time"),DB::raw("TIME(end_time) as end_time"))
                    ->where("employeeId",$request->employeeId)
                    ->get();

        $date = Carbon::createFromFormat("Y-m-d H:i:s",$request->start_time);
        $start_time = $date->format("H:i:s");

        $date = Carbon::createFromFormat("Y-m-d H:i:s",$request->end_time);
        $end_time = $date->format("H:i:s");
        //check for timeframe overlap
        foreach($sessions as $session){
            if( (strtotime($start_time)  >= strtotime($session->start_time) &&  strtotime($start_time) <= strtotime($session->end_time) ) || (strtotime($end_time) <= strtotime($session->end_time) && strtotime($end_time) >= strtotime($session->start_time))){
              return redirect()->back()->withInput()->with("error","Timeframe is allocated ");
            }
        }



        $data = $request->all();
        $data["created_by"] = Auth::user()->id;
        $data["regdate"] = date("Y-m-d H:i:s");
        //return $request;
        $workplan = Workplan::create(
            $data
        );

        if(isset($data['helperEmployeeId'])){
          foreach($data['helperEmployeeId'] as $helper ){
            $data['employeeId'] = $helper;
            $data['helperWorkOrderId'] = $workplan->workorderId;

            $workplan = Workplan::create(
              $data
            );
          }

        }

        return redirect()->back()->withInput($request->only('employeeId'))->with("message","Workplan Details Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function getWorkplan(Request $request)
    {

      $start =  Carbon::create($request->start)->toDateString();
      $end = Carbon::create($request->end)->toDateString();
      $employeeId = $request->employeeId;

      $workplan = Workplan::whereDate('start_time',">=",$start)->whereDate("end_time","<=",$end)->select("workorderId as id","remark as title","start_time as start","end_time as end")->where('employeeId',$employeeId)->get();
      return $workplan;
      // $sql = "SELECT * FROM ".$SETTINGS["data_table"]." WHERE UNIX_TIMESTAMP(`regdate`) >=".strtotime($mysqli->real_escape_string($_GET['start']))." AND UNIX_TIMESTAMP(`regdate`)<=".strtotime($mysqli->real_escape_string($_GET['end']));
    }

    public function filter(Request $request)
    {
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if ($role->hasPermissionTo('workplan-index')){
        $permissions = Role::findByName($role->name)->permissions;
        foreach ($permissions as $permission)
            $all_permission[] = $permission->name;
        if(empty($all_permission))
            $all_permission[] = 'dummy text';

        $request->validate([
            'start_date' => ['required','date_format:d/m/Y'],
            'end_date' => ['required','date_format:d/m/Y']
        ]);

        $date = Carbon::createFromFormat('d/m/Y',$request->start_date);
        $_start_date = $date->format("Y-m-d");
        $date = Carbon::createFromFormat('d/m/Y',$request->end_date);
        $_end_date = $date->format("Y-m-d");

        $_employee = $request->employee;
        $_customer = $request->customer;
        $_worktype = $request->worktype;
        $_remark = $request->comment;
        $_status = $request->status;

        $workplans = DB::table('tbworkorder')
                ->join("tbcustomer","tbcustomer.customerId","tbworkorder.customerId")
                ->join("users","users.id","tbworkorder.employeeId")
                ->join("tbworktype","tbworktype.worktypeId","tbworkorder.worktypeId")
                ->where([
                    ['tbworkorder.customerId', '=', "$_customer"],
                ])->orWhere([
                    ['tbworkorder.status', 'LIKE', "%{$_status}%"]
                ])
                ->orWhere([
                    ['tbworkorder.employeeId', '=', "$_employee"]
                ])
                ->orWhere([
                    ['tbworkorder.remark', 'LIKE', "%{$_remark}%"],

                ])->orWhereDate(
                     'tbworkorder.startdate',"$_start_date"

                )->orWhereDate(

                      'tbworkorder.enddate',"$_end_date"
                )->orWhere(

                      'tbworkorder.worktypeId',"$_worktype"
                )
                ->paginate(100);

        $customers =  Customer::all();
        $worktypes =  WorkType::all();
        $employees =  User::all();
        $_start_date =  date('d/m/Y',strtotime($_start_date));
        $_end_date  =  date('d/m/Y',strtotime($_end_date));
        return view('workflow.index'
                ,compact('workplans','customers','worktypes','employees','_customer','_employee','_start_date','_end_date','_status','_worktype',
                        '_start_date','_end_date',
                        '_remark','all_permission'
                ));
      }
         else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $workplan = DB::table('tbworkorder')
                    ->join("tbcustomer","tbcustomer.customerId","tbworkorder.customerId")
                    ->join("users","users.id","tbworkorder.employeeId")

                    ->join("tbworktype","tbworktype.worktypeId","tbworkorder.worktypeId")
                    ->where("workorderId",$id)
                    ->first();
        $helpers = DB::select("SELECT id,name,tel FROM users WHERE id in (SELECT employeeId FROM tbworkorder WHERE helperWorkOrderId = '$id')");


        $customers =  Customer::all();
        $Workstypes =  WorkType::all();
        $employees =  User::all();
        $status =  DB::table("workplan_status")->get();
        return view('workflow.edit',compact('workplan','customers','Workstypes','employees','status','helpers'));
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

      $sessions =  Workplan::whereDate('start_time', Carbon::create($request->start_time)->toDateString())
                  ->select(DB::raw("TIME(start_time) as start_time"),DB::raw("TIME(end_time) as end_time"),"workorderId")
                  ->where("employeeId",$request->employeeId)
                  ->get();

      $date = Carbon::createFromFormat("Y-m-d H:i:s",$request->start_time);
      $start_time = $date->format("H:i:s");

      $date = Carbon::createFromFormat("Y-m-d H:i:s",$request->end_time);
      $end_time = $date->format("H:i:s");
      //check for timeframe overlap


      foreach($sessions as $session){
          if( ((strtotime($start_time)  >= strtotime($session->start_time) &&  strtotime($start_time) <= strtotime($session->end_time) ) || (strtotime($end_time) <= strtotime($session->end_time) && strtotime($end_time) >= strtotime($session->start_time))) AND  $session->workorderId != $id){

            return redirect()->back()->withInput()->with("error","Timeframe is allocated ");
          }
      }

      $workplan = Workplan::find($id);
      $copy = $workplan->replicate();
      $workplan->delete();
      $copy->workorderId = $id;
      $copy->customerId = $request->customerId;
      $copy->employeeId = $request->employeeId;
      $copy->start_time = $request->start_time;
      $copy->end_time = $request->end_time;
      $copy->status = $request->status;
      $copy->save();

      if(isset($request->_helperEmployeeId)){
        //return $request->_helperEmployeeId;
        foreach($request->_helperEmployeeId as $helperid ){

          $helper = Workplan::where("employeeId",$helperid)->where('helperWorkOrderId',$id)->first();

          if(!is_null($helper)){
            $helper->employeeId = $helperid;
            $helper->customerId = $request->customerId;
            $helper->start_time = $request->start_time;
            $helper->end_time = $request->end_time;
            $helper->save();
          }else{
            $data = $request->all();
            $data['employeeId']  = $helperid;
            $data['helperWorkOrderId'] = $id;

            $workplan = Workplan::create(
              $data
            );
          }
        }
      }

      if(isset($request->unavailableHelperEmployeeId)){
        foreach($request->unavailableHelperEmployeeId as $helperid)
          $helper = Workplan::where("employeeId",$helperid)->where('helperWorkOrderId',$id)->first();
          if(!is_null($helper))
            $helper->delete();
      }

      $request->session()->flash('message', 'Successfully updated');
      return redirect()->route('Workflow.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getFreeHelper(Request $request){
      //return "oe";
      $start_date = Carbon::create($request->start_time)->toDateString();
      $end_date = Carbon::create($request->end_time)->toDateString();
      $start_time = Carbon::create($request->start_time)->toTimeString();
      $end_time = Carbon::create($request->end_time)->toTimeString();
      $sql = "SELECT * FROM users WHERE id NOT IN (SELECT employeeId FROM `tbworkorder` WHERE ( (DATE(start_time) = '$start_date' AND TIME(start_time) >= '$start_time' AND TIME(start_time) <= '$end_time') OR (TIME(end_time) >= '  $start_time' AND TIME(end_time) <= '$end_time') ))";
      $req =  DB::select($sql);
      return $req;
    }

    public function checkAvailability(Request $request){
      //return "oe";
      $start_date = Carbon::create($request->start_time)->toDateString();
      $end_date = Carbon::create($request->end_time)->toDateString();
      $start_time = Carbon::create($request->start_time)->toTimeString();
      $end_time = Carbon::create($request->end_time)->toTimeString();
      $employeeId = $request->employeeId;
      $workorderId = $request->workorderId;
      $helperEmployeeId = $request->helperEmployeeId;
      $sql = "SELECT count(employeeId) as aggregate
                    FROM `tbworkorder`
                    WHERE
                         workorderId != '$workorderId' AND employeeId = '$employeeId' AND ( (DATE(start_time) = '$start_date' AND TIME(start_time) >= '$start_time' AND TIME(start_time) <= '$end_time') OR (TIME(end_time) >= '  $start_time' AND TIME(end_time) <= '$end_time') )";

      $req =  DB::select($sql);

      $helperEmployeeId = implode("','",$helperEmployeeId);

      $sql = "SELECT * FROM users WHERE id NOT IN (SELECT employeeId FROM `tbworkorder` WHERE  (helperWorkOrderId != '$workorderId' or helperWorkOrderId is null) and  employeeId in ('$helperEmployeeId') AND ( (DATE(start_time) = '$start_date' AND TIME(start_time) >= '$start_time' AND TIME(start_time) <= '$end_time') OR (TIME(end_time) >= '  $start_time' AND TIME(end_time) <= '$end_time') ))";
      $helpers =  DB::select($sql);

      if($req[0]->aggregate){
        $error = ["code"=>0,"message"=>"Timeframe not available","sql"=>$sql];
      }else{
        $error = ["code"=>1,"message"=>"Timeframe available","sql"=>$sql,"helpers"=>$helpers];

      }
      return $error;

    }



    public function destroy($id)
    {
        //


    }


    // for($i=0;i<count(times); i++){
    //    checktimes(times.st,times.end);
    // }
    //
    // checkdate(st,en){
    //   if ($time1 >= $st && $time2 <= en){
    //      echo 'error,tme taken';
    //   }
    //   functionInsert()
    // }
}
