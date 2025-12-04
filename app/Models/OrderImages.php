<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderImages extends Model
{
    //
    protected $table = "order_images";
    protected $fillable = ['order_id','image_path'];
}
