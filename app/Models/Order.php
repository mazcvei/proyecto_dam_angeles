<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ="orders";
    protected $fillable = ['paper_type', 'size', 'illustration_type'];

}
