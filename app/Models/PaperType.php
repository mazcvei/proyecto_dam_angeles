<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaperType extends Model
{
    protected $table = "paper_types";
    protected $fillable = ["type"];
}
