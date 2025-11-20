<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ="orders";

    protected $fillable = [
        'user_id',
        'date',
        'paper_type_id',
        'paper_size_id',
        'illustration_type_id',
        'order_state_id'];

}
