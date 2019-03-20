<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use App\Repositories\OrderInterface;
use Auth;

class Controller extends BaseController
{
    protected $order;

    public function __construct(OrderInterface $order)
    {
        $this->order = $order;
        $this->middleware(function ($request, $next) {
            $this->order->getUnpaidOrder(Auth::id());

            return $next($request);
        });
    }
}
