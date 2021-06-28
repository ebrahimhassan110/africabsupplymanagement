<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClearingAgent extends Model
{
    use HasFactory;
    protected $table = 'clearingagent';
    protected $primaryKey = "id";
    protected $fillable = ['name'];

}
