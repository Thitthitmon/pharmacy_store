@extends('layouts.frontend')

@section('content')




    <!-- PRODUCTS Start
================================================== -->

    <section id="products">
        <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav nav-main">
                    <li class="{{ Request::segment(1) === 'home' || Request::segment(1) == '' ? 'active' : null }}"><a
                                href="{{ route('home.index')}}">Home</a></li>
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

    <site style="display: none">
        <table class="table">
            <thead>
            <tr>

                <th scope="col">Order Name</th>
                <th scope="col">Order Price</th>
                <th scope="col">Order Quantity</th>
            </tr>
            </thead>
            <tbody style="padding-left: 20px">
            @foreach($orders as $order)
                @foreach($order as $product)
                <tr>
                    <td>{{ $product['attributes']['name'] }}</td>
                    <td>{{ $product['attributes']['price'] }}</td>
                    <td>{{ $product['quantity'] }}</td>
                </tr>
                    @endforeach
            @endforeach
            <tr>
                <td colspan="2">Ordered Total</td>
                <td>{{ $total }}</td>
            </tr>
            </tbody>
        </table>
    </site>
    <script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
    <script>
        $('document').ready(function () {
            // var swal_html = '<div class="panel" style="background:aliceblue;font-weight:bold"><div class="panel-heading panel-info text-center btn-info"> <b>Import Status</b> </div> ' +
            //     '<table class="table">\n' +
            //     '        <thead>\n' +
            //     '            <tr>\n' +
            //     '                <th>ID</th>\n' +
            //     '                <th>Name</th>\n' +
            //     '                <th>Salary</th>\n' +
            //     '                <th>Country</th>\n' +
            //     '                <th>City</th>\n' +
            //     '            </tr>\n' +
            //     '        </thead>\n' +
            //     '        <tbody>\n' +
            //     '            <tr>\n' +
            //     '                <td>1</td>\n' +
            //     '                <td>Dakota Rice</td>\n' +
            //     '                <td>$36,738</td>\n' +
            //     '                <td>Niger</td>\n' +
            //     '                <td>Oud-Turnhout</td>\n' +
            //     '            </tr>\n' +
            //     '            <tr>\n' +
            //     '                <td>2</td>\n' +
            //     '                <td>Minerva Hooper</td>\n' +
            //     '                <td>$23,789</td>\n' +
            //     '                <td>Curaçao</td>\n' +
            //     '                <td>Sinaai-Waas</td>\n' +
            //     '            </tr>\n' +
            //     '            <tr>\n' +
            //     '                <td>3</td>\n' +
            //     '                <td>Sage Rodriguez</td>\n' +
            //     '                <td>$56,142</td>\n' +
            //     '                <td>Netherlands</td>\n' +
            //     '                <td>Baileux</td>\n' +
            //     '            </tr>\n' +
            //     '            <tr>\n' +
            //     '                <td>4</td>\n' +
            //     '                <td>Philip Chaney</td>\n' +
            //     '                <td>$38,735</td>\n' +
            //     '                <td>Korea, South</td>\n' +
            //     '                <td>Overland Park</td>\n' +
            //     '            </tr>\n' +
            //     '</tbody>\n' +
            //     '</table>';
            // var markup = document.getElementsByTagName('site')[0].innerHTML;
            //   alert(markup);
            //   swal({title:"Success!", customClass: 'swal-wide', html: swal_html}).then(function(){ window.location.href = 'http://127.0.0.1:1111/test';});
            var html = document.getElementsByTagName('site')[0].innerHTML;
            swal({title: "Success!", customClass: 'swal-wide', html: html}).then(function () {
                window.location.href = 'http://127.0.0.1:8000';
            });

        });
    </script>

@endsection




