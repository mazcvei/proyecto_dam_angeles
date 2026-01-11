<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = "settings";
    protected $fillable = [
        'description',
        'email_contact',
        'phone_contact',
        'url_instagram',
        'photos_carousel',
        'logo',
        'primary_color',
        'secondary_color',
        'auxiliar_color',
    ]; 

    protected $casts = [
        'photos_carousel' => 'array',
    ];
}
