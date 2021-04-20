<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workplan extends Model
{
    use HasFactory;
    protected $table = "tbworkorder";
    protected $primaryKey = "workorderId";
    protected $fillable = ["customerId","employeeId","regdate","starttime","targethour","start_time","end_time","worktypeId","helperWorkOrderId","remark","status","startdate","created_by"];




    public function customer()
    {
        return $this->belongsTo('App\Models\Customer',"customeId","customeId");
    }

    public function Employee()
    {
        return $this->belongsTo('App\Models\Employee',"employeeId","employeeId");
    }


    public function worktype()
    {
        return $this->belongsTo('App\Models\WorkType',"worktypeId","worktypeId");
    }

        public function work_status()
    {
        return $this->belongsTo('App\Models\WorkPlanStatus',"status","id");
    }

}
