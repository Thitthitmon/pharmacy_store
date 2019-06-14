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
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css"/>
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jS -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="js/owl.carousel.min.js" type="text/javascript"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/main.js" type="text/javascript"></script>


</head>
<body>


<!-- TOP HEADER Start
    ================================================== -->

<section id="top">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <p class="contact-action"><i class="fa fa-phone-square"></i>IN CASE OF ANY QUESTIONS, CALL THIS NUMBER:
                    <strong>+95 0912345678</strong></p>
            </div>
            <div class="col-md-3 clearfix">
                <ul class="login-cart">
                    <li>
                        <a data-toggle="modal" data-target="#myModal" href="#">
                            <i class="fa fa-user"></i>
                            Login
                        </a>
                    </li>
                    <li>
                        <div class="cart dropdown">

                                <a href="{{ route('cart.index',['a' => 'cart'])}}"><i class="fa fa-shopping-cart"></i>Cart( {{ $total }} )</a>


                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">
                <div class="search-box">
                    <div class="input-group">
                        <input placeholder="Search Here" type="text" class="form-control">
                        <span class="input-group-btn">
                                <button class="btn btn-default" type="button"></button>
                            </span>
                    </div><!-- /.input-group -->
                </div><!-- /.search-box -->
            </div>
        </div> <!-- End Of /.row -->
    </div>  <!-- End Of /.Container -->


    <!-- MODAL Start
        ================================================== -->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Introduce Yourself</h4>
                </div>
                <div class="modal-body clearfix">

                    <form action="#" method="post" id="create-account_form" class="std">
                        <fieldset>
                            <h3>Create your account</h3>
                            <div class="form_content clearfix">
                                <h4>Enter your e-mail address to create an account.</h4>
                                <p class="text">
                                    <label for="email_create">E-mail address</label>
                                    <span>
                                            <input placeholder="E-mail address" type="text" id="email_create"
                                                   name="email_create" value="" class="account_input">
                                        </span>
                                </p>
                                <p class="submit">
                                    <button class="btn btn-primary">Create Your Account</button>
                                </p>
                            </div>
                        </fieldset>
                    </form>
                    <form action="" method="post" id="login_form" class="std">
                        <fieldset>
                            <h3>Already registered?</h3>
                            <div class="form_content clearfix">
                                <p class="text">
                                    <label for="email">E-mail address</label>
                                    <span><input placeholder="E-mail address" type="text" id="email" name="email"
                                                 value="" class="account_input"></span>
                                </p>
                                <p class="text">
                                    <label for="passwd">Password</label>
                                    <span><input placeholder="Password" type="password" id="passwd" name="passwd"
                                                 value="" class="account_input"></span>
                                </p>
                                <p class="lost_password">
                                    <a href="#popab-password-reset" class="popab-password-link">Forgot your
                                        password?</a>
                                </p>
                                <p class="submit">
                                    <button class="btn btn-success">Log in</button>
                                </p>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>  <!-- End of /Section -->


</div> <!-- End of /.navbar-header -->
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