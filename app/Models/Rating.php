<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "ratings";
    protected $fillable = ["score","description","user_id","order_id"];

    public function ratingUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
