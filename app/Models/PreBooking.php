<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreBooking extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "prebooking";
   // protected $fillable = ['worktypeName'];
   
   
    public function supplier(){


        return $this->belongsTo(Supplier::class,"supplier_id", "id");
    }

   
   
   
}
