<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $table ='order';
    protected $fillable = ['order_no', 'status','total', 'user_id'];

    const STATUS_UNPAID = 0;
    const STATUS_PAID = 1;
    const STATUS_FAILED = 2;
    const STATUS_CANCELED = 3;

    public function orderable()
    {
        return $this->morphTo();
    }

    public static function statusOptions()
    {
        return [
            self::STATUS_UNPAID => 'UNPAID',
            self::STATUS_PAID => 'Success',
            self::STATUS_FAILED => 'Failed',
            self::STATUS_CANCELED => 'Canceled',
        ];
    }

    public function getStatusTextAttribute()
    {
        $statusOptions = $this->statusOptions();
        return isset($statusOptions[$this->status]) ?
                $statusOptions[$this->status] : "Not set";
    }
}

