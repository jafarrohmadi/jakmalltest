<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\TopupBalanceRequest;

class TopupBalanceController extends Controller
{
    public function index()
    {
    	return view('admin.topup_balance.index');
    }

    public function store(TopupBalanceRequest $request)
    {
    	$order_id = $this->order->save('\App\Models\TopupBalance', $request);
        return redirect('/admin/success_page/'. $order_id);
    }
}