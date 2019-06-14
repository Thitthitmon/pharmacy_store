@extends('layouts.frontend')

@section('content')


    <div class="container">
        <br>
        <h4>Shopping Cart</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                   {!! $cartContents !!}
                </div>
            </div>
        </div>
    </div>


@endsection