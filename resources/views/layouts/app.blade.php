<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Personal</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="/css/linearicons.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">				
    <link rel="stylesheet" href="/css/nice-select.css">							
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">				
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
<header id="header">
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="/"><img src="/img/logo.png" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">

			          <li><a href="/">Home</a></li>
			          <li><a href="/freelancers">Freelancers</a></li>
			          <li><a href="/about">About</a></li>
			          
			          
			          
                      @guest			          					          		          
                      <li><a href="{{ route('login') }}">Login</a></li>
                      @if (Route::has('register'))
                      <li><a href="{{ route('register') }}">Register</a></li> 
                      @endif
                      @else
                        <li><a href="/profile">Dashboard</a></li>
                        <li><a href="/inbox">Inbox</a></li>
                        <li><a href="/credit">Earn({{\Auth::user()->credit}})</a></li>
                      @endguest
                      @if(session('cart'))
                        <li><a href="/cart" id="cart">Cart({{count(session('cart'))}})</a></li>
                      @else
                        <li><a href="/cart" id="cart">Cart</a></li>
                      @endif
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->
          

			

			

			<div style="margin-top:100px;margin-bottom:50px;">
			@yield('content')
            </div>
			

			
			
		    <!-- Start brands Area -->
		    <section class="brands-area" style="margin-top:500px;">
		        <div class="container">
		            <div class="brand-wrap">
		                <div class="row align-items-center active-brand-carusel justify-content-start no-gutters">
		                    <div class="col single-brand">
		                        <a href="#"><img class="mx-auto" src="/img/l1.png" alt=""></a>
		                    </div>
		                    <div class="col single-brand">
		                        <a href="#"><img class="mx-auto" src="/img/l2.png" alt=""></a>
		                    </div>
		                    <div class="col single-brand">
		                        <a href="#"><img class="mx-auto" src="/img/l3.png" alt=""></a>
		                    </div>
		                    <div class="col single-brand">
		                        <a href="#"><img class="mx-auto" src="/img/l4.png" alt=""></a>
		                    </div>
		                    <div class="col single-brand">
		                        <a href="#"><img class="mx-auto" src="/img/l5.png" alt=""></a>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </section>
		    <!-- End brands Area -->			

            <!-- start footer Area -->
            <footer class="footer-area section-gap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h4>About Me</h4>
                                <p>
                                    We have tested a number of registry fix and clean utilities and present our top 3 list on our site for your convenience.
                                </p>
                                <p class="footer-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h4>Newsletter</h4>
                                <p>Stay updated with our latest trends</p>
								<div class="" id="mc_embed_signup">
									 <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
									  <div class="input-group">
									    <input type="text" class="form-control" name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address '" required="" type="email">
									    <div class="input-group-btn">
									      <button class="btn btn-default" type="submit">
									        <span class="lnr lnr-arrow-right"></span>
									      </button>    
									    </div>
									    	<div class="info"></div>  
									  </div>
									</form> 
								</div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                            <div class="single-footer-widget">
                                <h4>Follow Me</h4>
                                <p>Let us be social</p>
                                <div class="footer-social d-flex align-items-center">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End footer Area -->		
    </div>
    <script src="/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>			
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>			
    <script src="/js/easing.min.js"></script>			
    <script src="/js/hoverIntent.js"></script>
    <script src="/js/superfish.min.js"></script>	
    <script src="/js/jquery.ajaxchimp.min.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>	
    <script src="/js/jquery.tabs.min.js"></script>						
    <script src="/js/jquery.nice-select.min.js"></script>	
    <script src="/js/isotope.pkgd.min.js"></script>			
    <script src="/js/waypoints.min.js"></script>
    <script src="/js/jquery.counterup.min.js"></script>
    <script src="/js/simple-skillbar.js"></script>							
    <script src="/js/owl.carousel.min.js"></script>							
    <script src="/js/mail-script.js"></script>	
    <script src="/js/main.js"></script>	
</body>
</html>
