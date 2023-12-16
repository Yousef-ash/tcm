@extends('layouts.index.indexheader')
@section('title')
    عن الكلية
@endsection
@section('content')
    {{-- Breadcrump start --}}
    <div class="edu-breadcrumb-area breadcrumb-style-5">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="edu-breadcrumb">
                    <li class="breadcrumb-item">الرئيسية</li>
                    <li class="separator"><i class="icon-angle-left"></i></li>
                    <li class="breadcrumb-item">عن الكلية</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="edu-section-gap edu-about-area about-style-8">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-10">
                   {!!  $settings->about  !!}
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
