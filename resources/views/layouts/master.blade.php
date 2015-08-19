<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>eCommerce</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        {{-- <h1>ssssssssssssssssssssss</h1> --}}
        <link rel="stylesheet" type="text/css" href="/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <script type="text/javascript" src="/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>

   <body>
        <div id="wrapper">
            <header>
                <section id="top-area">
                    <p>Phone orders: 1-800-0000 | Email us: <a href="mailto:office@shop.com">office@shop.com</a></p>
                </section><!-- end top-area -->
                <section id="action-bar">
                    <div id="logo">
                    <a href="/"><img class="logo" src="/img/logo.jpg"></a>
                        {{-- <a href=""><span id="logo-accent">e</span>Commerce</a> --}}
                    </div><!-- end logo -->


                    <nav class="dropdown">
                        <ul>

                            <li>
                                <a href="#">Shop by Category 
                                <img src="/img/down-arrow.gif">
                                </a>
                                <ul>
                                     @foreach($catnav as $cat)
                                     <li>
                                     <a href="/store/category/{!! $cat->id !!}">
                                        {!! $cat->name !!}
                                     </a> 
                                     @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav>

                    <div id="search-form">
                        {!! Form::open(
                            array(
                            'action' => 'StoreController@search'
                            )) !!}

                        {!! Form::text('keyword', null,
                         array('placeholder' => 'Search by keyword', 'class' => 'search')) !!}
                         {!! Form::submit('Search', array('class' => 'search submit')) !!}
                         {!! Form::close() !!}
                    </div><!-- end search-form -->

                    <div id="user-menu">
                        @if(Auth::check())<!-- Check IF Login -->
                        <nav class="dropdown">
                            <ul>
                                <li>
                                {{-- <h1>here We Go</h1> --}}
                                {{-- {!! Auth::user()->firstname !!} --}}
                                    <a href="#">
                                        <img src="/img/user-icon.gif">{!! Auth::user()->firstname !!}
                                        {{-- <img src="/img/down-arrow.gif">{!! Auth::user()->lastname !!} --}}
                                    </a>
                                    <ul>
                                    <!-- Admin -->
                                        @if(Auth::user()->admin)
                                        <li><a href="categories">Manage Categories</a></li>
                                        <li><a href="products">Manage Products</a></li>
                                        @endif 
                                    {{-- End Admin --}}

                                        <!-- Logout / Signout -->
                                        <li><a href="cart" alt="Store Cart">Shopping Cart</a></li>
                                        
                                        <li><a href="signout" alt="Sign Out">Sign Out</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </nav><!-- End if User -->

                        @else <!-- IF not user -->
                        <nav id="signin" class="dropdown">
                            <ul>
                                <li>
                                    <a href="#">
                                    <img src="/img/user-icon.gif">

                                     Sign In
                                     <img src="/img/down-arrow.gif">
                                     </a>
                                    <ul>
                                    {!! link_to_route('users.index','Sign In') !!}
                                    {!! link_to_route('users.create','Sign Up') !!}
                                    {{-- <a href="users/signup">Slll</a> --}}
                                    </ul>
                                </li>
                            </ul>
                        </nav> <!-- End isnt User -->
                        @endif

                    </div><!-- end user-menu -->
                    <div id="view-cart">
                        <a href="http://localhost:8000/cart">

                        <img src="/img/blue-cart.gif">

                        View Cart</a>
                    </div><!-- end view-cart -->
                </section><!-- end action-bar -->
            </header>

            @yield('promo')
            
            @yield('search-keyword')

            <hr />

            <section id="main-content" class="clearfix">
                @if (Session::has('message'))
                    <p class="message">{!! Session::get('message') !!}</p>
                @endif
                
                @yield('content')
            </section><!-- end main-content -->

            <hr />
            @yield('pagination')
            
            <footer>
                <section id="contact">
                    <h3>For phone orders please call 1-800-000. You<br>can also email us at <a href="mailto:office@shop.com">office@shop.com</a></h3>
                </section><!-- end contact -->

                <hr />

                <section id="links">
                    <div id="my-account">
                        <h4>MY ACCOUNT</h4>
                        <ul>
                            <li><a href="users/signin">Sign In</a></li>
                            <li><a href="users/signout">Sign Up</a></li>
                            <li><a href="/store/cart">Shopping Cart</a></li>
                        </ul>
                    </div><!-- end my-account -->
                    <div id="info">
                        <h4>INFORMATION</h4>
                        <ul>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div><!-- end info -->
                    <div id="extras">
                        <h4>EXTRAS</h4>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li>

                            {{-- {!! HTML::link('/store/contact', 'Contact Us') !!} --}}

                            <a href="/contact"/>Contact Us
                            </li>
                        

                        </ul>
                    </div><!-- end extras -->
                </section><!-- end links -->

                <hr />

                <section class="clearfix">
                    <div id="copyright">
                        <div id="logo">
                            <a href="#"><span id="logo-accent">e</span>Commerce</a>
                        </div><!-- end logo -->
                        <p id="store-desc">This is a short description of the store.</p>
                        <p id="store-copy">&copy; 2013 eCommerce. Theme designed by Adi Purdila.</p>
                    </div><!-- end copyright -->
                    <div id="connect">
                        <h4>CONNECT WITH US</h4>
                        <ul>
                            <li class="twitter"><a href="#">Twitter</a></li>
                            <li class="fb"><a href="#">Facebook</a></li>
                        </ul>
                    </div><!-- end connect -->
                    <div id="payments">
                        <h4>SUPPORTED PAYMENT METHODS</h4>

<img src="/img/payment-methods.gif">

                    </div><!-- end payments -->
                </section>
            </footer>
        </div><!-- end wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

<script type="text/javascript" src="/js/plugins.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
{{-- 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
     --}}
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>