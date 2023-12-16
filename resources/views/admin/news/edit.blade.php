@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row ">
            <div class="col-md-6">
                <h1 class="my-5">تعديل منشور</h1>
            </div>
            <form action="{{ route('news.update', ['news' => $data->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                <div class="mb-3">
                    <label for="title" class="form-label">العنوان</label><br>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $data->title }}"
                        required value="{{ $data->title }}"> <br>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="logo" class="form-label">الصورة</label><br>
                    <input type="file" name="logo" id="logo" class="form-control">
                    <br>
                    @error('logo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                    <div class="mb-3">
                        <label for="caption" class="form-label">نبذة</label><br>
                        <textarea class="form-control" name="caption" id="caption" rows="3" required>{{ $data->caption }}</textarea>
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
<div class="col-md-12">
                <div class="mb-3">
                    <label for="content" class="form-label">المحتوى</label><br>
                    <textarea class="editor" id="editor" name="content">{{ $data->content }}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
</div>
                <div class="mb-3">
                    <input type="submit" value="Create" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection


@section('script')
    @include('layouts.index.scripts')
@endsection
