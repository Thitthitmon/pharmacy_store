@extends('layouts.frontend')

@section('content')




    <!-- PRODUCTS Start
================================================== -->

    <section id="products">
        <div class="container">
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav nav-main">
                    <li class="{{ Request::segment(1) === 'home' || Request::segment(1) == '' ? 'active' : null }}"><a href="{{ route('home.index')}}">Home</a></li>
                     @foreach ($types as $type)
                   

                    <li class="{{ Request::segment(2) == $type->id ? 'active' : null }}">
                          <a href="{!! route('home.category', [$type->id]) !!}">{{ $type->name }}</a>
                    </li>
                    @endforeach
                </ul> <!-- End of /.nav-main -->
            </div>  
            <div class="row">
                <div class="col-md-12">
                    <div class="products-heading">
                        <br>
                        <h4>NEW PRODUCTS</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <br>
                @foreach ($products as $product)
                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <a href="{{ route('frontend.show',$product->id)}}">
                                <img src="{{asset($product->image)}}" width="200" height="150">
                            </a>
                            <a href="{{ route('frontend.show',$product->id)}}">
                                <h4>{!! $product->name !!}</h4>
                            </a>
                            <p class="price">{!! $product->price !!} Ks</p>

                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <input type="number" value="1" class="form-control qty"/>

                                </div>
                                <input type="hidden" value="{{ $product->id }}" class="form-control id">
                                <input type="hidden" value="{{ $product->price }}" class="form-control price">
                                <input type="hidden" value="{{ $product->name }}" class="form-control name">
                                <div class="col-md-6">
                                    <button class="btn btn-primary add-to-cart"><i class="fa fa-shopping-cart"></i> Add
                                        to Cart
                                    </button>
                                </div>

                            </div>
                        </div>  <!-- End of /.products -->
                    </div>
            @endforeach <!-- End Of /.Col-md-3 -->
            </div>  <!-- End of /.row -->
        </div>  <!-- End of /.container -->
    </section>  <!-- End of Section -->


@endsection

    
   

        