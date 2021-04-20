<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = "customerId";
    protected $table = "tbcustomer";




    public function partner(){
        return $this->belongsTo(User::class,"partnerincharge","id");
    }

     public function staff(){
        return $this->belongsTo(User::class,"staffincharge","id");
    }
}
