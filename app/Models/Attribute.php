<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function attribute_values()
    {
        return $this->hasMany('App\Models\AttributeValue');
    }
}
