<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\PayOrderRequest;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $order = $this->order->getPaginate(20 ,$request->keyword);
        return view('admin.order.index', compact('order'));
    }
    
    public function successPage($id) 
    {
        $order = $this->order->find($id);
        return view('admin.order.success_page', compact('order'));
    }
    
    public function payOrder()
    {	
    	$id =Input::get('id');
    	if ($id) {
        	$order = $this->order->find($id);
        	return view('admin.order.pay_order', compact('order'));
    	}

    	return view('admin.order.pay_order');
    }

    public function updatePayOrder(PayOrderRequest $request)
    {
    	$this->order->updateOrderStatus($request);
        return redirect('/admin/order');
    }
}