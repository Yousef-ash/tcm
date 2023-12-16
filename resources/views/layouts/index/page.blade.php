@extends('layouts.index.indexheader')
@section('title')
@yield('test')
@endsection
@section('content')

<div class="edu-breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">@yield('title')</h1>
            </div>
        </div>
    </div>
    <ul class="shape-group">
        <li class="shape-1">
            <span></span>
        </li>
        <li class="shape-2 scene"><img data-depth="2" src="{{ asset('theme/assets/images/about/shape-13.png') }}"
                alt="shape"></li>
        <li class="shape-3 scene"><img data-depth="-2" src="{{ asset('theme/assets/images/about/shape-15.png') }}"
                alt="shape"></li>
        <li class="shape-4">
            <span></span>
        </li>
        <li class="shape-5 scene"><img data-depth="2" src="{{ asset('theme/assets/images/about/shape-07.png') }}"
                alt="shape"></li>
    </ul>
</div>

@yield('pagecontent')

@endsection

