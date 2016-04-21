<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'size', 'user_id', 'base_price',
    ];
}
