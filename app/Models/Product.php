<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{	
	protected $dates = ['deleted_at'];
	protected $table ='product';
    protected $fillable = ['product_name', 'shipping_address', 'price', 'shipping_code'];

    public function order()
    {
        return $this->morphMany('App\Models\Order', 'orderable');
    }
}

