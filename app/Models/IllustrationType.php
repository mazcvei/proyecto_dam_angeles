<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IllustrationType extends Model
{
    protected $table = "illustration_types";
    protected $fillable = ["type","price"];
}
