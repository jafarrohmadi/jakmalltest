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
                <div class="panel-heading  panel-heading-divider">Prepaid Balance</div>
                <div class="panel-body">
                    {!! Form::open(['url' => '/admin/topup_balance', 'class' => 'form-vertical', 'files' => true]) !!}
                    <div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : ''}}">
            	        {!! Form::text('mobile_number', null, ['class' => 'form-control input-sm', 'placeholder' => 'Mobile number']) !!}
            	        {!! $errors->first('mobile_number', '<p class="invalid-block">:message</p>') !!}
                	</div>
                    <div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
                        {!! Form::select('value', array('10000' => '10.000', '50000' => '50.000','100000' => '100.000'),null, ['class' => 'form-control input-sm', 'placeholder' => 'value']) !!}
                        {!! $errors->first('value', '<p class="invalid-block">:message</p>') !!}
                    </div>
                    <div class="row xs-pt-15">
                        <div class="col-xs-12 col-md-12">
                                {!! Form::submit('Submit', ['class' => 'btn btn-space btn-primary form-control']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection