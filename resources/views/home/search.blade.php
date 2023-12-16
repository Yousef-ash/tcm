@extends('layouts.index.page')

@section('title')
    نتائج البحث
@endsection

@section('content')
    <div class="edu-event-area event-area-1 section-gap-equal">
        <div class="container">
            @if (empty($results))
                <p class="text-center">لم يعثر على نتائج لبحثك</p>
                <li class="list-unstyled text-center"><a class="" href="{{ url()->previous() }}">عد للخلف</a></li>
            @else
                @foreach ($results as $result)
                    <div class="col-lg-9 order-lg-1 col-pr--35">
                        <div class="row g-5">
                            <div class="col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                <div class="edu-event-list event-list-2">
                                    <div class="inner">

                                        <div class="content">
                                            <ul class="event-meta">
                                                <li><i class="icon-27"></i>{{ $result->created_at->format('Y-m-d') }}</li>
                                                <span><i class="icon-33"></i>
                                                    {{ $result->created_at->format('h:i:s A') }}</span>
                                            </ul>
                                            <h4 class="title"><a href="{{$result->url}}">{{$result->title}}
                                            </h4>
                                            <div class="read-more-btn">
                                                <a class="edu-btn btn-medium btn-border" href="{{$result->url}}">
                                                    اقرأ المزيد
                                                     <i class="icon-west"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $results->appends('key', $key)->links() }}
            @endif
        </div>
    </div>




    </div>
    </div>
@endsection
