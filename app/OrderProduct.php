<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
	public $incrementing = false;
	public $timestamps = false;
	protected $table = 'order_product';
    protected $fillable = [
    	'product_id', 'order_id', 'amount',
    ];
}
