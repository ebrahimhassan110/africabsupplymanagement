<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\FeeType;
use App\Models\Workplan;
use App\Models\CustomerFee;
use App\Models\CustomerFeeDetails;
use Auth;
use DB;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index(){

        $role_id = Auth::user()->role_id;
        $employeeId = Auth::user()->id;

        if($role_id == 1){
          $pending_jobs = Workplan::where("status",1)->count();
          $completed_jobs = Workplan::where("status",3)->count();
          $total_jobs = Workplan::count();
        }else {
          $pending_jobs = Workplan::where("status",1)->where("employeeId",$employeeId)->count();
          $completed_jobs = Workplan::where("status",3)->where("employeeId",$employeeId)->count();
          $total_jobs = Workplan::where("employeeId",$employeeId)->count();
        }


        return view("dashboard.homepage",compact('pending_jobs','completed_jobs','total_jobs'));
    }
}
