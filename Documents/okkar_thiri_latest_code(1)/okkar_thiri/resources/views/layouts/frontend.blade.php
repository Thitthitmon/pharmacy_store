<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Okkar Thiri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>

    <!-- Css -->
    <link rel="stylesheet" href="{{asset('css/nivo-slider.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<style>
    .swal-wide{
        width:500px !important;
    }
</style>
    <!-- jS -->

    <script src="{{ asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{ asset('js/main.js" type="text/javascript')}}"></script>
    <script src="{{ asset('js/components/pizza.js')}}"></script>


</head>
<body>


<!-- TOP HEADER Start
    ================================================== -->

<section id="top">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-md-4">
                        <p class="contact-action">
                        <h1><a href="{{ route('home.index')}}">Okkar Thiri</a></h1></p>
                    </div><!-- logo  -->
                    <div class="col-md-3">
                        <br>
                        <div class="pull-left">
                            <form action="{!! route('search') !!}" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="product" class="form-control" placeholder="Search for..." required/>
                                    <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Go!</button>
                                </span>
                                </div><!-- /input-group -->
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <br>
                        <div class="pull-right">
                            @if (Auth::guest())
                                <a href="login">
                                    <i class="fa fa-user"></i>Login
                                </a>
                            @else

                                <ul class="nav navbar-nav">
                                    <!-- User Account Menu -->
                                    <li class="dropdown user user-menu">
                                        <!-- Menu Toggle Button -->
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <!-- The user image in the navbar-->
                                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                            <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <!-- The user image in the menu -->
                                            <li class="user-header">
                                                <img src="images/index.png"
                                                     class="img-circle" alt="User Image"/>
                                                <br>
                                                <font color="black">  {!! Auth::user()->name !!}
                                                    <br>
                                                    <small>Member
                                                        since {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                                </font>
                                            </li>
                                            <!-- Menu Footer-->
                                            <li class="user-footer">

                                                <div class="pull">
                                                    <a href="{!! url('/logout') !!}"
                                                       class="btn btn-success">
                                                        Sign out
                                                    </a>
                                                    <a href="{!! url('/edit') !!}"
                                                       class="btn btn-default btn-flat pull-right"
                                                       onclick="event.preventDefault(); document.getElementById('edit-form').submit();">
                                                        Edit Profile
                                                    </a>

                                                    <form id="edit-form" action="{{ route('/edit',['id' => Auth::user()->id] ) }}"
                                                          method="POST"
                                                          style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div><!-- cart -->
                    <div class="col-md-2">
                        <br>
                        <div>
                            <a href="{{ route('cart.index',['a' => 'cart'])}}"><i
                                        class="fa fa-shopping-cart"></i>Cart( {{ $total }} )
                            </a>

                        </div>
                    </div><!-- user -->
                </div>
            </div> <!-- End Of /.row -->
        </div>  <!-- End Of /.Container -->


        <!-- MODAL Start
            ================================================== -->


</section>  <!-- End of /Section -->


<!-- LOGO Start
================================================== -->


@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('login'))
    <div class="alert alert-info">
        {{ session()->get('login') }}
    </div>
@endif
@yield('content')


<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 align="left">Contact Us</h3>
                <p align="left">
                    No.28, Pyay Road, Hlaing Township, Yangon, Myanmar
                    Yangon
                    <br>
                    Phone:01 500 049


            </div>
            <div class="col-md-6">
            </div> <!-- End Of /.col-md-12 -->
            <div class="row">
                <p class="copyright-text pull-right">OKKAR THIRI @2019 | All Rights Reserved</p>
            </div>
        </div>  <!-- End Of /.row -->
    </div>  <!-- End Of /.container -->
</div>  <!-- End Of /.footer-bottom -->
</footer> <!-- End Of Footer -->

<a id="back-top" href="#"></a>
<script>
    $(document).ready(function () {
        $('.add-to-cart').on('click', function (e) {
            e.preventDefault();

            var $btn = $(this);
            var id = $btn.parent().parent().find('.id').val();
            var color = $btn.parent().parent().find('.color').val() || '';
            var qty = $btn.parent().parent().find('.qty').val();
            var name = $btn.parent().parent().find('.name').val();
            var price = $btn.parent().parent().find('.price').val();


            var $form = $('<form action="cart?a=cart" method="post" />').html('<input type="hidden" name="add" value="1"><input type="hidden" name="price" value="' + price + '"> <input type="hidden" name="name" value="' + name + '"><input type="hidden" name="id" value="' + id + '"><input type="hidden" name="color" value="' + color + '"><input type="hidden" name="qty" value="' + qty + '">');

            $('body').append($form);
            $form.submit();
        });

        $('.btn-update').on('click', function () {
            var $btn = $(this);
            var id = $btn.attr('data-id');
            var qty = $btn.parent().parent().find('.quantity').val();
            var color = $btn.attr('data-color');

            var $form = $('<form action="cart?a=cart" method="post" />').html('<input type="hidden" name="update" value="1"><input type="hidden" name="id" value="' + id + '"><input type="hidden" name="qty" value="' + qty + '"><input type="hidden" name="color" value="' + color + '">');

            $('body').append($form);
            $form.submit();
        });

        $('.btn-remove').on('click', function () {
            var $btn = $(this);
            var id = $btn.attr('data-id');
            var color = $btn.attr('data-color');

            var $form = $('<form action="cart?a=cart" method="post" />').html('<input type="hidden" name="remove" value="1"><input type="hidden" name="id" value="' + id + '"><input type="hidden" name="color" value="' + color + '">');

            $('body').append($form);
            $form.submit();
        });

        $('.btn-empty-cart').on('click', function () {
            var $form = $('<form action="cart?a=cart" method="post" />').html('<input type="hidden" name="empty" value="1">');

            $('body').append($form);
            $form.submit();
        });
    });
</script>

</body>
</html>
