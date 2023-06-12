<?php

namespace App\Models;


use App\Models\User;
use App\Models\Product;
use App\Models\ShipStates;
use App\Models\ShipDivision;
use App\Models\ShipDistricts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
    	return $this->belongsTo(User::class,'user_id','id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }

    public function order_details(){
        return $this->hasMany('App\Models\OrderDetail');
    }

    public function order_Detail(){
        return $this->belongsTo('App\Models\OrderDetail');
    }

    public function division()
    {
        return $this->belongsTo(ShipDivision::class,'division_id','id');
    }
    public function district()
    {
        return $this->belongsTo(ShipDistricts::class,'district_id','id');
    }

    public function upazilla()
    {
        return $this->belongsTo(ShipStates::class,'upazilla_id','id');
    }

}
