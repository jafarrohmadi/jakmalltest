<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopupBalance extends Model
{	
	protected $dates = ['deleted_at'];
	protected $table ='topup_balance';
    protected $fillable = ['mobile_number', 'value'];

    public function order()
    {
        return $this->morphMany('App\Models\Order', 'orderable');
    }
}

