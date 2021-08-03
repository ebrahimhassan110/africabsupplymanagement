<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentPart extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = "id";
    protected $table = "shipment_part";



    public function shipment(){
        return $this->belongsTo(Shipment::class,"shipment_id","id");
    }

 
	
}
