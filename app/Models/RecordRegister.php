<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordRegister extends Model
{
    use HasFactory;
    protected $table = "tboutsource";
    protected $primaryKey = "outsourceId";
    protected $fillable = ["customerId","office","doctypeId","employeeId","status","remark","attachment","created_by"];

    public function customer(){
      return $this->belongsTo(Customer::class, "customerId","customerId");
    }

    public function documentype(){
      return $this->belongsTo(DocumentType::class, "doctypeId","doctypeId");
    }

    public function employee(){
      return $this->belongsTo(User::class, "employeeId");
    }
}
