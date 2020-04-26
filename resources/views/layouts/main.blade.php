<html dir="{{Session()->get('direction')}}">
    <head>
        <title>Play Point</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet prefetch' href="/css/bootstrap.min.css">
        <link href="/library/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel='shortcut icon' type='image/x-icon' href="/images/favicon.ico" />
    </head>
    <body>
        <!--Topbar -->
        <div class="brand navbar-fixed-top play-brand">
            <div class="container">
                <div class="row">
                    @if(Session()->get('direction')=="ltr")
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <a href="/"><img src="/images/playpoint_logo.png" alt="" class="img-responsive"/></a>
                    </div>
                    <div class="col-xs-6 hidden-lg hidden-md hidden-sm">
                        <ul class="nav navbar-custom navbar-right">
                            @if (Session()->get('Bearer')=="")
                            <li><a href="#">{{__('Signup')}}</a></li>
                            <li class="spacer">/</li>
                            <li><a href="/{{app()->getLocale()}}/login">{{__('Login')}}</a></li>
                            @else
                            <li><a href="/{{app()->getLocale()}}/logout">{{__('Logout')}}</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-8 col-sm-8 hidden-xs">
                        <div class="search_area">
                            <form role="search" action="/{{app()->getLocale()}}/search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="{{__('Search..')}}" name="q" id="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-search" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="col-xs-6 hidden-lg hidden-md hidden-sm">
                        <ul class="nav navbar-custom navbar-right">
                            @if (Session()->get('Bearer')=="")
                            <li><a href="#">{{__('Signup')}}</a></li>
                            <li class="spacer">/</li>
                            <li><a href="/{{app()->getLocale()}}/login">{{__('Login')}}</a></li>
                            @else
                            <li><a href="/{{app()->getLocale()}}/logout">{{__('Logout')}}</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-8 col-sm-8 hidden-xs">
                        <div class="search_area">
                            <form role="search" action="/{{app()->getLocale()}}/search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="{{__('Search..')}}" name="q" id="q">
                                <div class="input-group-btn">
                                <button class="btn btn-search" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <a href="/{{app()->getLocale()}}"><img src="images/playpoint_logo.png" alt="" class="img-responsive"/></a>
                    </div>
                    @endif
                </div>
            </div>
        </div>

	<!--Navbar -->
	<nav class="navbar navbar-default navbar-fixed-top" id="navigation-bar">

	    <!-- End Container -->
	    <div class="container">

			<!-- Search -->
			<div class="search_area search_area_mobile hidden-lg hidden-md hidden-sm">
					<form role="search" action="/{{app()->getLocale()}}/search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="{{__('Search..')}}" name="q" id="q">
							<div class="input-group-btn">
								<button class="btn btn-search" type="submit"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</form>
				</div>

                <!-- Brand and Toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">{{__('Toggle navigation')}}</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- End Brand and Toggle -->

                <!-- Main Nav Elements for Toggling and Desktop Wrapper-->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <!-- Main Nav Elements for Toggling and Desktop -->
                    <ul class="nav navbar-nav navbar-<?php if(Session()->get('direction')=="ltr"){echo "left";}else{echo "right";}; ?>">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{__('Browse')}}<span class="fa fa-angle-down"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">{{__('Games')}}</a></li>
                                <!-- <li class="divider"></li>
                                <li><a href="#">Apps</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Video</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Wallpapers</a></li> -->
                            </ul>
                        </li>
                        <li class="line hidden-sm hidden-xs"></li>
                        <li><a href="/{{app()->getLocale()}}">{{__('Home')}}</a></li>
                        <!-- <li><a href="#">Top apps</a></li>
                        <li><a href="#">New releases</a></li> -->
                    </ul>
                    <ul class="nav navbar-custom navbar-<?php if(Session()->get('direction')=="ltr"){echo "right";}else{echo "left";}; ?> hidden-xs">
                    @if (Session()->get('Bearer')=="")
					<li><a href="#">{{__('Signup')}}</a></li>
					<li class="spacer">/</li>
					<li><a href="/{{app()->getLocale()}}/login">{{__('Login')}}</a></li>
                    @else
					<li><a href="/{{app()->getLocale()}}/logout">{{__('Logout')}}</a></li>
                    @endif
        		    </ul>



                </div>
                <!-- End Main Nav Elements Wrapper -->

            </div>
            <!-- End Container -->

        </nav>
        <!-- End Navbar -->
       @yield('content')
        <script src="/js/jquery-3.1.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>
        <script  src="/js/index.js"></script>
        <!-- Page Scripts -->
        @yield('scripts')
    </body>
</html>
