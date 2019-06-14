<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Okka Thiri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>

    <!-- Css -->
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

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
                    <p class="contact-action"><i class="fa fa-phone-square"></i>IN CASE OF ANY QUESTIONS, CALL THIS NUMBER: <strong>+95 0912345678</strong></p>
                </div>
                <div class="col-md-3 clearfix">
                    <ul class="login-cart">
                        <li>
                            <a data-toggle="modal" data-target="#myModal" href="#">
                            <i class="material-icons">
                            account_box
                            </i>
                                Login
                            </a>
                        </li>
                        <li>
                            <div class="cart dropdown">
                                <a data-toggle="dropdown" href="#"><i class="material-icons">
                                add_shopping_cart
                                </i>Cart(1)</a>
                                <div class="dropdown-menu dropup">
                                    <span class="caret"></span>
                                    <ul class="media-list">
                                        <li class="media">
                                            <img class="pull-left" src="images/product-item.jpg" alt="">
                                            <div class="media-body">
                                                <h6>Italian Sauce
                                                    <span>$250</span>
                                                </h6>
                                            </div>
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-sm">Checkout</button>
                                </div>
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

    
    
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{!! route('/') !!}">
                        <img src="images/logo.jpg" alt="logo" style="width:1000px;height:150px;>

                    </a>
                </div>  
            </div>  
        </div> 
    </header> 
     <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div> <!-- End of /.navbar-header -->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav nav-main">
                    <li class="active"><a href="#">HOME</a></li>
                    <li><a href="products.html">SHOP</a></li>
                    <li><a href="blog.html">BLOG</a></li>
                    <li><a href="blog-single.html">ARTICLE</a></li>
                    <li class="dropdown">
                        <a href="#">
                            PAGES
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a  href="#">Action</a></li>
                            <li><a  href="#">Another action</a></li>
                            <li><a  href="#">Something else here</a></li>
                            <li><a  href="#">Separated link</a></li>
                        </ul>
                    </li> <!-- End of /.dropdown -->

                    
                </ul> <!-- End of /.nav-main -->
            </div>  <!-- /.navbar-collapse -->
        </div>  <!-- /.container-fluid -->
    </nav>  <!-- End of /.nav -->
@if (\Session::has('login'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('login') !!}</li>
        </ul>
    </div>
@endif

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav nav-main">
                    <li class="active"><a href="#">HOME</a></li>
                    <li><a href="products.html">SHOP</a></li>
                    <li><a href="blog.html">BLOG</a></li>
                    <li><a href="blog-single.html">ARTICLE</a></li>
                    <li class="dropdown">
                        <a href="#">
                            PAGES
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a  href="#">Action</a></li>
                            <li><a  href="#">Another action</a></li>
                            <li><a  href="#">Something else here</a></li>
                            <li><a  href="#">Separated link</a></li>
                        </ul>
                    </li> <!-- End of /.dropdown -->

                    
                </ul> <!-- End of /.nav-main -->
            </div>
    
        <!-- PRODUCTS Start
    ================================================== -->



    <section id="products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="products-heading">
                        NEW PRODUCTS
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="products">
                        <a href="single-product.html">
                            <img src="images/product-image-8.jpg" alt="">
                        </a>
                        <a href="single-product.html">
                            <h4>{!! $product->name !!}</h4>
                        </a>
                        <p class="price">{!! $product->price !!}</p>
                        <div >
                            <a class="view-link shutter" href="#">
                            <i class="fa fa-plus-circle"></i>Add To Cart</a>
                        </div>
                    </div>  <!-- End of /.products -->
                </div>
                @endforeach <!-- End Of /.Col-md-3 -->
            </div>  <!-- End of /.row -->
        </div>  <!-- End of /.container -->
    </section>  <!-- End of Section -->


    
    
   

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="cash-out pull-left">
                            <li>
                                <a href="#">
                                    <img src="images/American-Express.png" alt="">  
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="images/PayPal.png" alt="">    
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="images/Maestro.png" alt="">   
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="images/Visa.png" alt="">  
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="images/Visa-Electron.png" alt=""> 
                                </a>
                            </li>
                        </ul>
                        <p class="copyright-text pull-right">OKKA THIRI @2019 | All Rights Reserved</p>
                    </div>  <!-- End Of /.col-md-12 --> 
                </div>  <!-- End Of /.row -->   
            </div>  <!-- End Of /.container --> 
        </div>  <!-- End Of /.footer-bottom -->
    </footer> <!-- End Of Footer -->
    
    <a id="back-top" href="#"></a>
</body>
</html>