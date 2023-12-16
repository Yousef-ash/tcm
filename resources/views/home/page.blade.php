@extends('layouts.index.page')

@section('title')
    {{ $page->title }}
@endsection
@section('barc')
    <ul class="edu-breadcrumb">
        @php
            $word = '';
        @endphp
        @foreach (mb_str_split($page->url) as $char)
            @if ($char != '/')
                @php
                    if ($char == '-') {
                        $char = ' ';
                    }
                    $word = $word . $char;
                @endphp
            @else
                @if (!empty($word))
                    <li class="breadcrumb-item">{{ $word }}</li>
                    <li class="separator"><i class="icon-angle-left"></i></li>
                    @php
                        $word = '';
                    @endphp
                @endif
            @endif
        @endforeach

        @if (!empty($word))
            <li class="breadcrumb-item">{{ $word }}</li>
        @endif

    </ul>
@endsection
@section('test')
    {{ $page->title }}
@endsection
@section('pagecontent')


    <div class="edu-event-area event-area-1 section-gap-equal">
        <div class="container">
            <div class="row g-5">
                @if ($page->view == 1 && $page->show == 1)
                    @if (count($page->siblings()) )
                        <div class="col-md-4 order-lg-2">
                            <div class="course-sidebar-2">
                                <div class="edu-course-widget widget-category">
                                    <div class="inner">
                                        <div class="edu-course-widget widget-category">
                                            <div class="inner">
                                                <div class="privacy-policy purchase-guide">
                                                    <div class="text-block">
                                                        <h4 class="title">الصفحات المرتبطة</h4>
                                                        <div class="row">
                                                            <div>
                                                                <ul class="about_list_1">
                                                                    @foreach ($page->siblings() as $sib)
                                                                        @if ($sib->show == 1 )
                                                                            <li><a
                                                                                    href="{{ url($sib->url) }}">{{ $sib->title }}</a>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-8 order-lg-1 col-pr--35">
                        <div class="row g-5">
                            @if (count($page->children))
                                @foreach ($page->children()->latest()->paginate(5) as $child)
                                    @if ($child->show == 1)
                                        @php
                                            $style = ['color-primary-style', 'color-secondary-style', 'color-extra01-style', 'color-tertiary-style', 'color-extra02-style', 'color-extra03-style', 'color-extra04-style', 'color-extra05-style', 'color-extra06-style'];
                                            $randomStyle = Arr::random($style);
                                        @endphp
                                        <div class="col-lg-8 col-md-6" data-sal-delay="50" data-sal="slide-up"
                                            data-sal-duration="800">
                                            <div
                                                class="categorie-grid categorie-style-2 {{ $randomStyle }} edublink-svg-animate">
                                                <div class="content">
                                                    <a href="{{ url($child->url) }}">
                                                        <h5 class="title">{{ $child->title }}</h5>
                                                    </a> <br>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                               {{  $page->children()->latest()->paginate(5)->links()}}
                            @endif
                        </div>
                    </div>

                @else
                    @if (count($page->children) or count($page->siblings()) && $page->show == 1)
                        <div class="col-md-4 order-lg-2">
                            <div class="course-sidebar-2">
                                <div class="edu-course-widget widget-category">
                                    <div class="inner">
                                        <div class="privacy-policy">
                                            <div class="text-block">
                                                <h5 class="title">الصفحات المرتبطة</h5>
                                                {{-- <div class="row"> --}}
                                                <div>
                                                    <ul class="about_list_1">
                                                        @foreach ($page->siblings() as $sib)
                                                            @if ($sib->show == 1 && $page->parent->view == 0)
                                                                <li><a href="{{ url($sib->url) }}">{{ $sib->title }}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                        <hr>
                                                        @foreach ($page->children as $child)
                                                            @if ($child->show == 1)
                                                                <li><a
                                                                        href="{{ url($child->url) }}">{{ $child->title }}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                {{-- </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-8 order-lg-1 col-pr--35">
                        <div class="row g-5">
                            {!! $page->content !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
