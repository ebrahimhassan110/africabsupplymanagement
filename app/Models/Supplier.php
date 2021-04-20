<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = "id";
    protected $table = "supplier";
	


/*
    public function partner(){
        return $this->belongsTo(User::class,"partnerincharge","id");
    }

     public function staff(){
        return $this->belongsTo(User::class,"staffincharge","id");
    }
	*/
}
