<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    
    protected $fillable = [
    	'client_name', 'date',
    ];

   	public function products() {
   		return $this->hasMany('App\OrderProduct');
   	}
}
