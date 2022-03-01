<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Item extends Model implements Transformable
{
    use TransformableTrait;
    use HasFactory;

    protected $fillable = [
        'itemId', 'itemDescription', 'itemQuantity', 'itemAmount'
    ];
}
