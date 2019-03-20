@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Order History</div>

                <div class="panel-body">

                    <div class="row">
                        <form action="{{ url()->current() }}">
                            <div class="col-md-10">
                                <input type="text" name="keyword" class="form-control" placeholder="Search by Order no..." value="{{ request('keyword') }}">
                            </div>

                        </form>
                    </div>

                    <hr>

                    <div class="table-responsive">
                        <table width="100%" border="0">
                            <tbody>
                                @foreach ($order as $orders)
                                    <tr style="border-top:1px solid black;">
                                        <td>{{ $orders->order_no }}</td>
                                        <td>Rp. {{ $orders->total }}</td>
                                        <td rowspan="2">
                                            @if($orders->status == 0)
                                                <a href="{{ url('admin/pay_order/?id='. encrypt($orders->id)) }}" class="btn btn-space btn-primary"> Pay Now </a>
                                            @elseif($orders->status == 1 && $orders->orderable->product_name)
                                                Shipping code : {{ $orders->orderable->shipping_code}}
                                            @else
                                                {{ $orders->status_text }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr style="border-bottom:1px solid black;">
                                        @if($orders->orderable->value)
                                            <td colspan="2"><b>{{ $orders->orderable->value }} for {{ $orders->orderable->mobile_number }}</b></td>
                                        @else
                                            <td colspan="2"><b>{{ $orders->orderable->product_name }} that costs {{ $orders->orderable->price }}</b></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $order->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection