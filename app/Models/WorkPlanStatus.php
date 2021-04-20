<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkPlanStatus extends Model
{
    use HasFactory;

    protected $table = 'workplan_status';
    public $timestamps = false; 
    /**
     * Get the notes for the status.
     */
   
}
