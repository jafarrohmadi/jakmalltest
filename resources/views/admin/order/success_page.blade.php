@extends('layouts.app')

@section('content')
<b>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-heading"><h3>Success!</h3> <br>
                        <table border="0" style="width: 100%;">
                            <tr>
                                <td>Order no.</td>  
                                <td align="right">{{ $order->order_no }}</td>
                            </tr>
                            <tr>
                                <td>Total</td> 
                                <td align="right">{{ $order->total }}</td>
                            </tr>
                            <tr>
                                <td>Date</td> 
                                <td align="right">{{ $order->created_at }}</td>
                            </tr>
                        </table>
                        @if($order->orderable->product_name)
                            <p>{{ $order->orderable->product_name }} that costs {{ $order->orderable->price }} will be shipped to: <br>
                            {{ $order->orderable->shipping_address }} <br> only after you pay</p>
                        @else
                            <p>Your mobile phone number {{ $order->orderable->mobile_number}} will receive Rp {{ $order->orderable->value }}</p>
                        @endif
                        <div class="row xs-pt-15">
                            <div class="col-xs-12">
                            	<a href="{{ url('/admin/pay_order/?id='. Helper::encrypt($order->id)) }}" class="btn btn-space btn-primary form-control"> 
                                	Pay Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</b>
@endsection