<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerFeeDetails extends Model
{
    use HasFactory;
    protected $table  = "tbcustomerfeedetails";
    protected $fillable = ["customerfeeId","feetypeId","amount","comment","created_by"];
}
