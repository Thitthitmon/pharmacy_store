@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User Detail
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                   <div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $users->name !!}</p>
</div>
<div class="form-group">
    {!! Form::label('name', 'Address:') !!}
    <p>{!! $users->address !!}</p>
</div>
<div class="form-group">
    {!! Form::label('name', 'Phone Number:') !!}
    <p>{!! $users->phone !!}</p>
</div>
<div class="form-group">
    {!! Form::label('name', 'Address:') !!}
    <p>{!! $users->address !!}</p>
</div>
                   
                </div>
            </div>
        </div>
    </div>
@endsection
