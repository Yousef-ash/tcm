<?php
$pages = App\Models\Page::where('show', 1)
    ->where('header', 1)
    ->get();
$settings = App\Models\Setting::first();

?>

@extends('layouts.index.indexheader')
@section('content')
    <!--=====================================-->
    <!--=        404 Area Start            =-->
    <!--=====================================-->
    <section class="section-gap-equal error-page-area">
        <div class="container">
            <div class="edu-error">
                <div class="thumbnail">
                    <img src="{{ asset('theme/assets/images/others/404.png') }}" alt="404 Error">
                    <ul class="shape-group">
                        <li class="shape-1 scene">
                            <img data-depth="2" src="{{ asset('theme/assets/images/about/shape-25.png') }}" alt="Shape">

                        </li>
                        <li class="shape-2 scene">
                            <img data-depth="-2" src="{{ asset('theme/assets/images/about/shape-15.png') }}" alt="Shape">
                        </li>
                        <li class="shape-3 scene">
                            <img data-depth="2" src="{{ asset('theme/assets/images/about/shape-13.png') }}" alt="Shape">
                        </li>
                        <li class="shape-4 scene">
                            <img data-depth="-2" src="{{ asset('theme/assets/images/counterup/shape-02.png') }}"
                                alt="Shape">
                        </li>
                    </ul>
                </div>
                <div class="content">
                    <h2 class="title"> الصفحة غير موجودة - 404</h2>
                    <h4 class="subtitle">الصفحة التي تبحث عنها غير موجودة</h4>
                    <a href="{{ route('main') }}" class="edu-btn"> العودة إلى الصفحة الرئيسية <i class="icon-west"></i></a>
                </div>
            </div>
        </div>
        <ul class="shape-group">
            <li class="shape-1">
                <img src="{{ asset('theme/assets/images/others/map-shape-2.png') }}" alt="Shape">
            </li>
        </ul>
    </section>
@endsection
