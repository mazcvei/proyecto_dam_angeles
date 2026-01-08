<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "ratings";
    protected $fillable = ["score","description","user_id","order_id","illustration_type_id"];

    public function ratingUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }
     public function illustrationType(){
        return $this->belongsTo(IllustrationType::class,'illustration_type_id','id');
    }

    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
