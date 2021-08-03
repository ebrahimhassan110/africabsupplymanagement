<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = "id";
    protected $table = "shipment";



 public function supplier(){


        return $this->belongsTo(Supplier::class,"supplier_id", "id");
    }

     public function booking(){
        return $this->belongsTo(PreBooking::class,"booking_id","id");
    }
	
}
