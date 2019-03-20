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
            <h3><b>Product Page</b></h3> <br>
            {!! Form::open(['url' => '/admin/product', 'class' => 'form-vertical', 'files' => true]) !!}
            <div class="form-group {{ $errors->has('product_name') ? 'has-error' : ''}}">
    	        {!! Form::textarea('product_name', null, ['class' => 'form-control input-sm', 'placeholder' => 'Product', 'rows' =>'3']) !!}
    	        {!! $errors->first('product_name', '<p class="invalid-block">:message</p>') !!}
        	</div>
            <div class="form-group {{ $errors->has('shipping_address') ? 'has-error' : ''}}">
                {!! Form::textarea('shipping_address', null, ['class' => 'form-control input-sm', 'placeholder' => 'Shipping address', 'rows' =>'3']) !!}
                {!! $errors->first('shipping_address', '<p class="invalid-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                {!! Form::text('price', null, ['class' => 'form-control input-sm', 'placeholder' => 'Price']) !!}
                {!! $errors->first('price', '<p class="invalid-block">:message</p>') !!}
            </div>
            <div class="row xs-pt-15">
                <div class="col-xs-12">
                    {!! Form::submit('Submit', ['class' => 'btn btn-space btn-primary form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection