@extends('layouts.index.page')
@section('test')
    الكلية التقنية الادارية
@endsection
@section('title')
    {{ $news->title }}
@endsection

@section('pagecontent')
<div class="edu-event-area event-area-1 section-gap-equal">
    <div class="container">
        <div class="row g-5">
{!! $news->content !!}
        </div>
    </div></div>
@endsection
