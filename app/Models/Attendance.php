<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = "tbattendance";
    protected $primaryKey = 'attendanceId';
    protected $fillable = ["employeeId","status","regdate","regtime","comment","isdel","outtime","created_by"];

    public function employee(){
        return $this->belongsTo(Employee::class,"employeeId","employeeId");
    }

    public function _status(){
        return $this->belongsTo(AttendanceStatus::class,"status");
    }
}
