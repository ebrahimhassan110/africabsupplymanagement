<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentProcess extends Model
{
    use HasFactory;
    protected $fillable = ['attachment','shipmentid','description','file_no','created_by'];
    protected $primaryKey = "id";
    protected $table = "shipment_processing";




     
}
