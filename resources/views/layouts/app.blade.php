<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mini Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="../../css.css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/website') }}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{ asset('public/website') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/website') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('public/website') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('public/website') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('public/website') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('public/website') }}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('public/website') }}/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="{{ asset('public/website') }}/css/aos.css">
    <link rel="stylesheet" href="{{ asset('public/website') }}/css/style.css">
</head>

<body>
    <div class="site-wrap">
        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <header class="site-navbar" role="banner">
            <div class="container-fluid">
                <div class="row align-items-center">

                    <div class="col-12 search-form-wrap js-search-form">
                        <form method="get" action="#">
                            <input type="text" id="s" class="form-control" placeholder="Search...">
                            <button class="search-btn" type="submit"><span class="icon-search"></span></button>
                        </form>
                    </div>

                    <div class="col-4 site-logo">
                        <a href="{{ route('index') }}" class="text-black h2 mb-0">M <span
                                class="text-danger">-Educate</span></a>
                    </div>

                    <div class="col-8 text-right">
                        <nav class="site-navigation" role="navigation">
                            <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                                @foreach ($category as $cat)
                                    <li>
                                        <a href="{{ route('view.category', $cat->slug) }}">{{ $cat->name }}</a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="{{ route('contact.index') }}">Contact us</a>
                                </li>
                                @guest
                                    @if (Route::has('register') && Route::has('login'))
                                        <li><a class="nav-link"
                                                href="{{ route('register') }}">{{ __('Register/Login') }}</a></li>
                                    @endif
                                @else
                                    <li>
                                        <i class="fas fa-user"></i><a class="nav-link"
                                            href="{{ route('register') }}">{{ Auth::user()->name }}</a>
                                    </li>
                                @endguest
                                <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span
                                            class="icon-search"></span></a></li>

                            </ul>
                        </nav>
                        <a href="#"
                            class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span
                                class="icon-menu h3"></span></a>
                    </div>
                </div>
            </div>
        </header>
        <!--start:content-->
        @yield('content')
        <!--end:content-->
        <!--start:Footer-->
        @include('footer')
        <!--end:Footer-->
    </div>
    <script src="{{ asset('public/website') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('public/website') }}/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{ asset('public/website') }}/js/jquery-ui.js"></script>
    <script src="{{ asset('public/website') }}/js/popper.min.js"></script>
    <script src="{{ asset('public/website') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/website') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('public/website') }}/js/jquery.stellar.min.js"></script>
    <script src="{{ asset('public/website') }}/js/jquery.countdown.min.js"></script>
    <script src="{{ asset('public/website') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('public/website') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('public/website') }}/js/aos.js"></script>

    <script src="{{ asset('public/website') }}/js/main.js"></script>
    @yield('script')
    @yield('contact')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="../../gtag/js.js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

</body>

</html>
