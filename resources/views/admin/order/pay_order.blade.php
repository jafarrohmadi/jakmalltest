@extends('layouts.app')

@section('content')

@if ($errors->any())
<ul class="alert alert-danger list-unstyled">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading  panel-heading-divider">Pay your order</div>
                <div class="panel-body">
                    {!! Form::open(['url' => '/admin/pay_order', 'class' => 'form-vertical', 'files' => true]) !!}
                    <div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : ''}}">
            	        {!! Form::text('order_no', isset($order->order_no) ? $order->order_no : null, ['class' => 'form-control input-sm', 'placeholder' => 'Order no']) !!}
            	        {!! $errors->first('order_no', '<p class="invalid-block">:message</p>') !!}
                	</div>
                    <div class="row xs-pt-15">
                        <div class="col-xs-12">
                            <p class="text-right">
                                {!! Form::submit('Pay now', ['class' => 'btn btn-space btn-primary form-control'] ) !!}
                            </p>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection