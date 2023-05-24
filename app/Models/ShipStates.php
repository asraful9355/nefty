<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipStates extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function division(){
    	return $this->belongsTo(ShipDivision::class,'shipdivision_id','id');
    }
    public function district(){
    	return $this->belongsTo(ShipDistricts::class,'shipdistrict_id','id');
    }

}
