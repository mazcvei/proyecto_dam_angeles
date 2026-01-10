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
        'state_id',
        'num_photos',
    ];

     public function UserOrder()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
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
        return $this->belongsTo(OrderState::class,'state_id','id');
    }

     public function OrderImages()
    {
        return $this->hasMany(OrderImages::class);
    }

    public function OrderRatings()
    {
        return $this->hasMany(Rating::class,'illustration_type_id','id')
        ->orderByDesc('created_at');
    }
    public function hasUserRated($userId)
    {
        return $this->OrderRatings()->where('user_id', $userId)->exists();
    }
}
