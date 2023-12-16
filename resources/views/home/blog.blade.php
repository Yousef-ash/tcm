@extends('layouts.index.page')
@section('test')
    الاخبار
@endsection
@section('title')
    الاخبار
@endsection
@section('barc')
    <ul class="edu-breadcrumb">
        <li class="breadcrumb-item">الرئيسية</li>
        <li class="separator"><i class="icon-angle-left"></i></li>
        <li class="breadcrumb-item">الاخبار</li>
    </ul>
@endsection
@section('pagecontent')
    <section class="section-gap-equal">
        <div class="container">
            <div class="row g-5" id="masonry-gallery">
                <!-- Start Blog Grid  -->
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 col-12 masonry-item" data-sal-delay="100" data-sal="slide-up"
                        data-sal-duration="800">
                        <div class="edu-blog blog-style-5">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="{{ $post->url }}">
                                        @if (!empty($post->logo))
                                            <img src="{{ asset('storage/' . $post->logo) }}" alt="Blog Images">
                                        @else
                                            <img src="{{ asset('storage/' . $settings->logo) }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="content position-top">
                                    <div class="read-more-btn">
                                        <a class="btn-icon-round" href="{{$post->url}}"><i class="icon-west"></i></a>
                                    </div>
                                    {{-- <div class="category-wrap">
                                <a href="#" class="blog-category">عبر الانترنت</a>
                            </div> --}}
                                    <h5 class="title"><a href="{{ $post->url }}">{{ $post->title }}</a></h5>
                                    <ul class="blog-meta">
                                        <li><i class="icon-27"></i>{{ $post->created_at->format('Y-m-d h:i:s A') }}
                                    </ul>
                                    <p>{{ $post->caption }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{--  --}}
            </div>
        </div>
    </section>
@endsection
