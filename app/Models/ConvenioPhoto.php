<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvenioPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['convenio_id', 'photo_id'];
}
