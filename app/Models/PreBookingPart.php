<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreBookingPart extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "prebooking_parts";
   // protected $fillable = ['worktypeName'];
   
   
    public function prebooking(){
        return $this->belongsTo(PreBooking::class,"prebooking_id","id");
    }

   
   
   
}
