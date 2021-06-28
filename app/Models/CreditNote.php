<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditNote extends Model
{
    use HasFactory;
    protected $table = 'credit_note';
    protected $primaryKey = "id";
    protected $fillable = ['prebooking_id','type','amount','currency','created_by'];
  
  
     public function booking(){
        return $this->belongsTo(PreBooking::class,"prebooking_id","id");
    }
	
	   public function createdby(){
        return $this->belongsTo(User::class,"created_by","id");
    }
  

}
