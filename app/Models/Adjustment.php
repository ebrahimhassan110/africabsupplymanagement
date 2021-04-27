<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adjustment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = "id";
    protected $table = "adjustments";
	


 
    public function from_booking_id(){
        return $this->belongsTo(PreBooking::class,"from_booking_id","id");
    }
	
	public function to_booking_id(){
        return $this->belongsTo(PreBooking::class,"to_booking_id","id");
    }
// 
    //  public function staff(){
    //     return $this->belongsTo(User::class,"staffincharge","id");
    // }
 
}
