<!DOCTYPE html>
<html class="no-js" dir="rtl" lang="zxx">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @yield('title')
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/theme/assets/images/favicon.png') }}">
    <!-- CSS
  ============================================ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/vendor/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/vendor/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/vendor/magnifypopup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/vendor/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/vendor/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/vendor/animation.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/vendor/jqueru-ui-min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/vendor/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/vendor/tipped.min.css') }}">
    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="{{ asset('theme/assets/css/app.css') }}">
</head>

<body class="sticky-header active-dark-mode">

    <div id="edublink-preloader">
        <div class="loading-spinner">
            <div class="preloader-spin-1"></div>
            <div class="preloader-spin-2"></div>
        </div>
        <div class="preloader-close-btn-wraper">
            <span class="btn btn-primary preloader-close-btn">
                Cancel Preloader</span>
        </div>
    </div>


    <header class="edu-header header-style-1 header-fullwidth">
        <div class="header-top-bar">
            <div class="container-fluid">
                <div class="header-top">

                    <div class="header-top-right">
                        <ul class="header-info">

                            @if (Auth::user())
                                @if (Auth::user()->hasAnyRole(['admin', 'super']))
                                    <li><a href="{{ route('admin.index') }}">لوحة التحكم</a></li>
                                @endif
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="#" class="submit-link"
                                            onclick="event.preventDefault(); document.forms[0].submit();">تسجيل
                                            الخروج</a>
                                    </form>
                                </li>
                            @else
                                <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                            @endif
                            <li><a href="mailto:daa0203@mtu.edu.iq" class="contact">الايميل<i
                                        class="icon-envelope"></i></a>
                            </li>
                            <li class="social-icon">

                                <a href="{{ $settings->social }}" target="_blank">فيسبوك <i
                                        class="icon-facebook"></i></a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="edu-sticky-placeholder"></div>
        <div class="header-mainmenu">
            <div class="container-fluid">
                <div class="header-navbar">
                    <div class="header-brand">
                        <div class="logo">
                            <a href="{{ route('main') }}">
                                <img class="logo-light" style="width: 80px; height: 80px;"
                                    src="{{ asset('storage/' . $settings->logo) }}" alt="Corporate Logo">
                                <img class="logo-dark" style="width: 80px; height: 80px;"
                                    src="{{ asset('storage/' . $settings->logo) }}" alt="Corporate Logo">
                            </a>
                        </div>
                        <h3 class="mobile-menu-bar d-block d-xl-none mb-0">
                            {{ $settings->name }}
                        </h3>
                    </div>
                    <div class="header-mainnav">
                        <style>
                            .mainmenu-nav .mainmenu>li>a {
                                font-size: 15px
                            }
                        </style>
                        <nav class="mainmenu-nav">
                            <ul class="mainmenu" style="font-family: 'Cairo', sans-serif;">
                                <li><a href="{{ route('main') }}">الصفحة الرئيسية</a></li>
                                <li><a href="{{ route('about') }}">عن الكلية</a></li>
                                <li><a href="{{ route('blog') }}">الاخبار</a></li>
                                @foreach ($pages as $page)
                                    @if ($page->show == 1)
                                        @if ($page->children->count() > 0 && $page->view == 0)
                                            <li class="has-droupdown"><a>{{ $page->title }}</a>
                                                <ul class="submenu mega-sub-menu-01">
                                                    @foreach ($page->children as $item)
                                                        @if ($item->show == 1)
                                                            <li><a
                                                                    href="{{ url($item->url) }}">{{ $item->title }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @elseif ($page->parent == null)
                                            <li><a href="{{ url($page->url) }}">{{ $page->title }}</a></li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </nav>

                    </div>
                    <div class="header-right">
                        <ul class="header-action">
                            <li class="search-bar">
                                <div class="input-group">
                                    <form action="{{ route('search') }}" method="get">
                                        <div style="display: flex">
                                        <input type="text" name="key" id="key" class="form-control"
                                            placeholder="البحث">
                                        <button type="submit" class="search-btn"><i class="icon-2"></i></button></div>
                                    </form>

                                </div>
                            </li>
                            <li class="icon search-icon">
                                <a href="javascript:void(0)" class="search-trigger"
                                    style="height: 25px; line-height: 0px;">
                                    <i class="icon-2"></i>
                                </a>
                            </li>
                            <li class="mobile-menu-bar d-block d-xl-none">
                                <button class="hamberger-button">
                                    <i class="icon-54"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="popup-mobile-menu">
            <div class="inner">
                <div class="header-top">
                    <div class="logo">
                        <a href="{{ route('main') }}">
                            <img class="logo-light" src="{{ asset('storage/' . $settings->logo) }}"
                                alt="Corporate Logo">
                            <img class="logo-dark" src="{{ asset('storage/' . $settings->logo) }}"
                                alt="Corporate Logo">
                        </a>
                    </div>
                    <div class="close-menu">
                        <button class="close-button">
                            <i class="icon-73"></i>
                        </button>
                    </div>
                </div>


                <ul class="mainmenu">
                    <li><a href="{{ route('main') }}">الصفحة الرئيسية</a></li>
                    <li><a href="{{ route('about') }}">عن الكلية</a></li>
                    <li><a href="{{ route('blog') }}">الاخبار</a></li>
                    @foreach ($pages as $page)
                        @if ($page->view == 1)
                            @if ($page->children->count() > 0 && $page->view == 0)
                                <li class="has-droupdown"><a>{{ $page->title }}</a>
                                    <ul class="submenu mega-sub-menu-01">
                                        @foreach ($page->children as $item)
                                            @if ($item->show == 1)
                                                <li><a href="{{ url($item->url) }}">{{ $item->title }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @elseif ($page->parent == null)
                                <li><a href="{{ url($page->url) }}">{{ $page->title }}</a></li>
                            @endif
                        @endif
                    @endforeach
                </ul>

            </div>
        </div>
        <div class="edu-search-popup">
            <div class="content-wrap" style="min-height: 400px">
                <div class="site-logo">
                    <img class="logo-light" style="width: 80px; height:80px;"
                        src="{{ asset('storage/' . $settings->logo) }}" alt="Corporate Logo">
                    <img class="logo-dark" style="width:80px; height: 80px;"
                        src="{{ asset('storage/' . $settings->logo) }}" alt="Corporate Logo">
                </div>
                <div class="close-button">
                    <button class="close-trigger"><i class="icon-73"></i></button>
                </div>
                <div class="inner">
                    <form action="{{ route('search') }}" class="search-form" method="get">
                        <button class="submit-button"><i class="icon-2"></i></button>
                        <input type="text" class="edublink-search-popup-field" name="key"
                            placeholder="ابحث هنا...">

                    </form>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="edu-footer footer-dark bg-image footer-style-2">
        <div class="footer-top footer-top-2">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="edu-footer-widget">
                            <div class="logo">
                                <a href="index.html">
                                    <img class="logo-light" width="80" height="80"
                                        src="{{ asset('storage/' . $settings->logo) }}" alt="Corporate Logo">
                                </a>
                            </div>
                            <p class="description"></p>
                            <div class="widget-information">
                                <ul class="information-list">
                                    <li><span> العنوان : </span> {{ $settings->address }} </li>
                                    <li><span> البريد الالكتروني : </span><a href="mailto:{{ $settings->email }}">
                                            {{ $settings->email }} </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="edu-footer-widget explore-widget">
                            <h4 class="widget-title">الروابط</h4>
                            <div class="inner">
                                <ul class="footer-link link-hover">
                                    <li><a href="{{ route('main') }}">الصفحة الرئيسية</a></li>
                                    <li><a href="{{ route('about') }}">عن الكلية</a></li>
                                    @foreach ($pages as $page)
                                        @if ($page->parent == null && $page->show == 1)
                                            <li><a href="{{ url($page->url) }}">{{ $page->title }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="edu-footer-widget quick-link-widget">
                            <h4 class="widget-title">خدمات</h4>
                            <div class="inner">
                                <ul class="footer-link link-hover">
                                    <li><a href="https://www.ivsl.org/" target="_blank">المكتبة العراقية
                                            الافتراضية</a></li>
                                    <li><a href="https://profile.mtu.edu.iq/" target="_blank">بوابة الطالب</a></li>
                                    <li><a href="{{ route('blog') }}">مقالات إخبارية</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="edu-footer-widget">
                            <h4 class="widget-title">جهات الاتصال</h4>
                            <div class="inner">
                                <p class="description">أدخل عنوان بريدك الإلكتروني للتسجيل في الاشتراك في النشرة
                                    الإخبارية
                                </p>
                                <div class="input-group footer-subscription-form">
                                    <input type="email" class="form-control" placeholder="بريدك الالكتروني">
                                    <button class="edu-btn btn-medium" type="button"> الإشتراك <i
                                            class="icon-west"></i></button>
                                </div>
                                <ul class="social-share icon-transparent">
                                    <li><a href="{{ $settings->social }}" target="_blank" class="color-fb">فيسبوك<i
                                                class="icon-facebook"></i></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner text-center">
                            صمم بواسطة <a href="https://github.com/Yousef-ash" target="_blank"> يوسف نهاد </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- JS
  ============================================ -->
    <div class="rn-progress-parent">
        <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Modernizer JS -->
    <script src="{{ asset('theme/assets/js/vendor/modernizr.min.js') }}"></script>
    <!-- Jquery Js -->
    <script src="{{ asset('theme/assets/js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/sal.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/backtotop.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/magnifypopup.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/odometer.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/isotop.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/imageloaded.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/lightbox.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/paralax.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/paralax-scroll.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/svg-inject.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/vivus.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/tipped.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/vendor/isInViewport.jquery.min.js') }}"></script>

    <!-- Site Scripts -->
    <script src="{{ asset('theme/assets/js/app.js') }}"></script>
</body>

</html>
