<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    protected $fillable = [
        'user_id',
        'date',
        'paper_type_id',
        'paper_size_id',
        'illustration_type_id',
        'order_state_id',
        'num_photos',
    ];

    public function PaperSize()
    {
        return $this->belongsTo(PaperSize::class);
    }

    public function PaperType()
    {
        return $this->belongsTo(PaperType::class);
    }

    public function IllustrationType()
    {
        return $this->belongsTo(IllustrationType::class);
    }

    public function OrderState()
    {
        return $this->belongsTo(OrderState::class);
    }

     public function OrderImages()
    {
        return $this->hasMany(OrderImages::class);
    }
}
