<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteCustomer extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = "id";
    protected $table = "tbcustomer_institute";




    public function customer(){
        return $this->belongsTo(Customer::class,"customer_id","custotmer_id");
    }

     public function institute(){
        return $this->belongsTo(Institute::class,"institute_id","instituteId ");
    }
}
