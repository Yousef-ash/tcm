@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="my-5">تعديل الصفحة</h1>
            </div>
            <form action="{{ route('admin.update', ['page' => $page->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">العنوان</label><br>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ $page->title }}">
                        <br>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">الرابط
                            <br> <small>يملئ تلقائياً</small>
                        </label><br>
                        <input type="text" name="url" id="url" class="form-control"
                            value="{{ $page->url }}"><br>
                        @error('url')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3 form-group">
                        <label class="form-label">ترتيب الصفحة</label><br>
                        <select name="orderPage" id="orderPage" class="form-select">
                            @if (!empty($pid))
                                <option selected value="{{ $pid }}">{{ $orderPages->first()->parent->title }}
                                </option>
                            @else
                                <option value=""></option>
                            @endif
                            @foreach ($orderPages as $pages)
                                @if ($page->id != $pages->id)
                                    <option value="{{ $pages->id }}"
                                        {{ $page->parent_id == $pages->id ? 'selected' : '' }}>
                                        {!! $pages->present()->paddedTitle !!}</option>
                                @endif
                            @endforeach
                        </select>

                        <div>
                            <label class="form-check-label my-3">
                                عرض
                                <input type="checkbox" name="show" id="show" value="1"
                                    {{ $page->show == 1 ? 'checked' : '' }} class="form-check-input">
                            </label>
                        </div>
                        <div>
                            <label class="form-check-label my-3">
                                جدول صفحات
                                <input type="checkbox" name="view" id="view" value="1"
                                    {{ $page->view == 1 ? 'checked' : '' }} class="form-check-input">
                            </label>
                        </div>
                        <div>
                            <label class="form-check-label my-3">
                                القائمة الرئيسية
                                <input type="checkbox" name="header" id="header" value="1"
                                    {{ $page->header == 1 ? 'checked' : '' }} class="form-check-input">
                            </label>
                        </div>
                        <div>
                            <label class="form-check-label my-3">
                                القائمة الثانوية
                                <input type="checkbox" name="hero" id="hero" value="1"
                                    {{ $page->hero == 1 ? 'checked' : '' }} class="form-check-input">
                            </label>
                        </div>
                        <div>
                            <label class="form-check-label my-3">
                                قسم
                                <input type="checkbox" name="section" id="section" value="1"
                                    {{ $page->section == 1 ? 'checked' : '' }} class="form-check-input">
                            </label>
                        </div>


                    </div>
                </div>
                <style>
                    .ck-editor__editable[role="textbox"] {
                        /* editing area */
                        min-height: 200px;
                    }

                    .ck-content .image {
                        /* block images */
                        max-width: 80%;
                        margin: 20px auto;
                    }
                </style>

                <div class="mb-3">
                    <label for="content" class="form-label">المحتوى</label><br>
                    <textarea class="editor" id="editor" name="content">{{ $page->content }}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="submit" value="تحديث" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
@section('script')
    @include('layouts.index.scripts')
@endsection
