<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleryPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['galery_id', 'photo_id'];
}
