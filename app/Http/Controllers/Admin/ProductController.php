<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
    	return view('admin.product.index');
    }

    public function store(ProductRequest $request)
    {
        $order_id = $this->order->save('\App\Models\Product', $request);
        return redirect('/admin/success_page/'. $order_id);
    }
}