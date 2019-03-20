<?php

namespace App\Repositories;

use DB;
use App\Models\Order;
use App\Models\Product;
use App\Models\TopupBalance;
use App\Jobs\CancelOrder;
use App\Helpers\Helper;

class OrderRepository implements OrderInterface
{
	protected $order;
	protected $user_id;

	public function __construct(Order $order)
	{
        $this->order = $order;
    }

 	public function getUnpaidOrder($id)
 	{
 		$this->user_id = $id;
 		view()->share('unpaid', $this->unpaidOrder());
 	}

    public function getPaginate($per_page = 20, $keyword = '')
    {
        return $this->order->where('user_id', $this->user_id)->when($keyword, function ($query) use ($keyword) {
            $query->where('order_no', 'like', "%{$keyword}%");
        })->orderBy('created_at', 'DESC')->paginate($per_page);
    }

	public function find($id)
	{
		$id = Helper::decrypt($id);
		return $this->order->findOrFail($id);
	}

	public function save($model, $request){
		DB::beginTransaction();
        try {
			$value = $model::create($request->all());
	        
	        $order =  new Order();
	        $order->order_no = Helper::randomNumber(10);
	        $order->user_id = $this->user_id;	        
	        $order->total = isset($request->price) ? $request->price + 10000 : $request->value + $request->value*5/100;

	        $value->order()->save($order);

	        CancelOrder::dispatch($order)->delay(300);
	    } catch (Exception $ex) {
            DB::rollBack();
        }
        DB::commit();

        return Helper::encrypt($order->id);
	}

	public function updateOrderStatus($request)
	{
		DB::beginTransaction();
		try {
			$order =  $this->order->where(['order_no' => $request->order_no,'user_id' => $this->user_id])->first();

			if ($order->orderable->product_name) {
				$order->status = Order::STATUS_PAID;	
				$order->orderable->shipping_code  = str_random(8);
			} else {
				$change = rand(1,100);
				$percent = 41;
				
				if (strtotime(date("h:i:s")) > strtotime("08:59:59") && strtotime(date("h:i:s")) < strtotime("17:00:01"))
				{
					$percent = 91;   	
				}

			   	$order->status = ($change < $percent) ? Order::STATUS_PAID : Order::STATUS_FAILED;
			}

			$order->orderable->save();
	        $order->save();
        } catch (Exception $ex) {
            DB::rollBack();
        }
        DB::commit();
	}

	public function unpaidOrder()
	{
		return $this->order->where(['status' => Order::STATUS_UNPAID, 'user_id' => $this->user_id])->count();
	}
}