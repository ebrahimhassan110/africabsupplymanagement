<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerFee extends Model
{
    use HasFactory;
    protected $table = "tbcustomerfee";
    protected $primaryKey = "id";
    protected $fillable = ["id","customerId","amount","attachment","created_by"];
}
