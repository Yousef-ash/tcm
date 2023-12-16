@extends('layouts.index.indexheader')

@section('title')
    {{ $settings->name }}
@endsection
@section('content')
    <div class="hero-banner hero-style-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content">
                        <h1 class="title" data-sal-delay="100" data-sal="slide-up" data-sal-duration="1000">
                            {{ $settings->name }}
                            <br> <br> <br>
                        </h1>
                        <p data-sal-delay="200" data-sal="slide-up" data-sal-duration="1000">تأسست الكلية التقنية
                            الإدارية /
                            بغداد عام 1999 كإحدى مؤسسات التعليم العالي لتواكب التطورات العلمية والتكنولوجية والتوجهات
                            الحديثة في العلوم وجوانبها التطبيقية واستيعاب التطورات الحاصلة في بيئة الأعمال وحقولها الإدارية
                            والتنظيمية كافة</p>
                        <ul class="shape-group">
                            <li class="shape-1 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                                <img data-depth="2" src="theme/assets/images/about/shape-13.png" alt="Shape">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-thumbnail">
                        <div class="thumbnail" data-sal-delay="500" data-sal="slide-right" data-sal-duration="1000">
                            <img src="theme/assets/images/banner/girl-1.webp" alt="Girl Image">
                        </div>
                        <ul class="shape-group">
                            <li class="shape-1" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                                <img data-depth="1.5" src="theme/assets/images/about/shape-15.png" alt="Shape">
                            </li>
                            <li class="shape-2 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                                <img data-depth="-1.5" src="theme/assets/images/about/shape-16.png" alt="Shape">
                            </li>
                            <li class="shape-3 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                                <img data-depth="3" src="theme/assets/images/about/shape-17.png" alt="Shape">
                            </li>
                            <li class="shape-4" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                                <img data-depth="-1" src="theme/assets/images/counterup/shape-02.png" alt="Shape">
                            </li>
                            <li class="shape-5 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                                <img data-depth="1.5" src="theme/assets/images/about/shape-13.png" alt="Shape">
                            </li>
                            <li class="shape-6 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                                <img data-depth="-2" src="theme/assets/images/about/shape-18.png" alt="Shape">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-7">
            <img src="theme/assets/images/about/h-1-shape-01.png" alt="Shape">
        </div>
    </div>

    {{-- Hero End  --}}
    {{-- Links Start --}}

    <div class="features-area-2">
        <div class="container">
            <div class="features-grid-wrap">
                @foreach ($heros as $hero)
                    <div class="features-box features-style-2 edublink-svg-animate">
                        {{-- <div class="icon">
                        <img class="svgInject" src="assets/images/animated-svg-icons/online-class.svg" alt="animated icon">
                    </div> --}}
                        <div class="content">
                            <a href="{{ $hero->url }}" target="_blank">
                                <h5 class="title"> {{ $hero->title }} </h5>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @foreach ($sections as $section)
        <div class="edu-categorie-area categorie-area-2 edu-section-gap">

            <div class="container">
                </ul>
                <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <h2 class="title">{{ $section->title }}</h2>
                    <span class="shape-line"><i class="icon-19"></i></span>

                </div>

                <div class="row g-5">
                    @foreach ($section->children as $child)
                        @php
                            $randomStyle = Arr::random($style);
                        @endphp
                        <div class="col-lg-4 col-md-6" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                            <div class="categorie-grid categorie-style-2 {{ $randomStyle }} edublink-svg-animate">
                                {{-- <div class="icon">
                        <i class="icon-9"></i>
                    </div> --}}
                                <div class="content">
                                    <a href="{{ $child->url }}">
                                        <h5 class="title">{{ $child->title }}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endforeach

    <div class="edu-campus-area gap-lg-top-equal mb--90">
        <div class="container edublink-animated-shape">
            <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                <h2 class="title">عميد الكلية</h2>
                <span class="shape-line"><i class="icon-19"></i></span>
            </div>
            <div class="row g-5">
                <div class="col-xl-7" data-sal-delay="50" data-sal="slide-left" data-sal-duration="800">
                    <div class="campus-image-gallery">
                        <div class="campus-thumbnail">
                            <div class="thumbnail">
                                <img src="{{ asset('storage/' . $settings->aphoto) }}" alt="صورة العميد">
                            </div>
                        </div>
                        <ul class="shape-group">
                            <li class="shape-1 scene">
                                <span data-depth=".8"></span>
                            </li>
                            <li class="shape-2 scene">
                                <img data-depth="1.5" src="theme/assets/images/about/shape-21.png" alt="Shape">
                            </li>
                            <li class="shape-3 scene">
                                <img data-depth="-1.5" src="theme/assets/images/about/shape-13.png" alt="Shape">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5" data-sal-delay="50" data-sal="slide-right" data-sal-duration="800">
                    <div class="campus-content">
                        <div class="inner">
                            <div class="section-title section-left">
                                <span class="pre-title">عميد الكلية</span>
                                <h2 class="title">{{ $settings->aname }}</h2>
                                <span class="shape-line"><i class="icon-19"></i></span>
                            </div>
                            <div class="features-list">
                                <div class="features-box color-secondary-style">
                                    <div class="icon">
                                        <i class="icon-36"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">السيرة الذاتية</h5>
                                        <p>
                                            {!! $settings->abio !!}
                                            <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="features-box color-extra05-style">
                                    <div class="icon">
                                        {{-- <img class="svgInject" src="theme/assets/images/animated-svg-icons/scholarship-facility.svg" alt="animated icon"> --}}
                                        <i class="icon-34"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">المؤهلات العلمية</h5>
                                        <p>
                                            {!! $settings->moh !!}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <ul class="shape-group">
                                <li class="shape-4 scene">
                                    <span data-depth=".8"></span>
                                </li>
                                <li class="shape-5 scene">
                                    <span data-depth="2"></span>
                                </li>
                                <li class="shape-6 scene">
                                    <img data-depth="-2" src="theme/assets/images/about/shape-25.png" alt="Shape">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Departments End --}}
    {{-- Email Badge Start --}}
    <br>
    <br>
    <br>
    <!-- End Campus Area  -->
    <div class="counterup-area-2 my-5">
        <div class="container">
            <div class="row g-5 justify-content-center">
                <div class="col-lg-8">
                    <div class="counterup-box-wrap">
                        <div class="counterup-box counterup-box-1">
                            <div class="edu-counterup counterup-style-2">
                                <h2 class="counter-item count-number primary-color">
                                    <span>4,000</span>
                                </h2>
                                <h6 class="title">عدد الطلبة الحالي</h6>
                            </div>
                            <div class="edu-counterup counterup-style-2">
                                <h2 class="counter-item count-number secondary-color">
                                    <span>20,000</span><span>+</span>
                                </h2>
                                <h6 class="title">الخريجين</h6>
                            </div>
                        </div>
                        <div class="counterup-box counterup-box-2">
                            <div class="edu-counterup counterup-style-2">
                                <h2 class="counter-item count-number extra02-color">
                                    <span>500</span>
                                </h2>
                                <h6 class="title">المقبولين هذا العام</h6>
                            </div>
                            <div class="edu-counterup counterup-style-2">
                                <h2 class="counter-item count-number extra05-color">
                                    <span>100</span><span>+</span>
                                </h2>
                                <h6 class="title">المقبولين في الدراسات العليا</h6>
                            </div>
                        </div>
                        <ul class="shape-group">
                            <li class="shape-1 scene">
                                <img data-depth="-2" src="theme/assets/images/about/shape-13.png" alt="Shape">
                            </li>
                            <li class="shape-2">
                                <img class="rotateit" src="theme/assets/images/counterup/shape-02.png" alt="Shape">
                            </li>
                            <li class="shape-3 scene">
                                <img data-depth="1" src="theme/assets/images/counterup/shape-04.png" alt="Shape">
                            </li>
                            <li class="shape-4 scene">
                                <img data-depth="-1" src="theme/assets/images/counterup/shape-05.png" alt="Shape">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="home-one-cta-two cta-area-1 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 ">
                    <div class="home-one-cta edu-cta-box bg-image">
                        <div class="inner">
                            <div class="content text-md-end">
                                <span class="subtitle"> ابقى على تواصل معنا عبر البريد:</span>
                                <h3 class="title"><a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                                </h3>
                            </div>
                        </div>
                        <ul class="shape-group">
                            <li class="shape-01 scene">
                                <img data-depth="2" src="theme/assets/images/cta/shape-06.png" alt="shape">
                            </li>
                            <li class="shape-02 scene">
                                <img data-depth="-2" src="theme/assets/images/cta/shape-07.png" alt="shape">
                            </li>
                            <li class="shape-03 scene">
                                <img data-depth="-3" src="theme/assets/images/cta/shape-04.png" alt="shape">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="edu-blog-area blog-area-1 edu-section-gap">
        <div class="container">
            <div class="section-title section-center" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <span class="pre-title">أحدث المقالات</span>
                <h2 class="title">اخر الاخبار</h2>
                <span class="shape-line"><i class="icon-19"></i></span>
            </div>

            <div class="row g-5">
                <!-- Start Blog Grid  -->

                @foreach ($posts_3 as $post)
                    <div class="col-lg-4 col-md-6 col-12" data-sal-delay="100" data-sal="slide-up"
                        data-sal-duration="800">
                        <div class="edu-blog blog-style-1">
                            <div class="inner">
                                <div class="thumbnail">


                                    <a href="{{ $post->url }}">
                                        @if (!empty($post->logo))
                                            <img src="{{ asset('storage/' . $post->logo) }}" alt="Blog Images">
                                            @else
                                            <img  src="{{ asset('storage/' . $settings->logo) }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="content position-top">
                                    <div class="read-more-btn">
                                        <a class="btn-icon-round" href="{{ $post->url }}"><i
                                                class="icon-west"></i></a>
                                    </div>
                                    <h5 class="title"><a href="{{ $post->url }}">{{ $post->title }}</a>
                                    </h5>
                                    <ul class="blog-meta">
                                        <li><i class="icon-27"></i>{{ $post->created_at->format('Y-m-d h:i:s A') }}

                                    </ul>
                                    <p>{{ $post->caption }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('blog') }}" class="edu-btn btn-large col-md-2"> مشاهدة الكل <i
                        class="icon-west"></i></a>

            </div>
            <ul class="shape-group">
                <li class="shape-1 scene">
                    <img data-depth="-1.4" src="theme/assets/images/about/shape-02.png" alt="Shape">
                </li>
                <li class="shape-2 scene">
                    <span data-depth="2.5"></span>
                </li>
                <li class="shape-3 scene">
                    <img data-depth="-2.3" src="theme/assets/images/counterup/shape-05.png" alt="Shape">
                </li>
            </ul>
        </div>
    </div>

@endsection
