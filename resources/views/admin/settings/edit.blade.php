@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

                <h1 class="my-5">تعديل البيانات الاساسية</h1>

                <form action="{{ route('settings.update', ['setting' => $setting->id]) }}" method="post" class='row'
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">الاسم</label><br>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $setting->name }}">
                            <br>
                            @error('name')
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
                            <label for="email">البريد الالكتروني</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="البريد الإلكتروني" value="{{ $setting->email }}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email">فيسبوك</label>
                            <input type="url" name="social" id="social" class="form-control"
                               value="{{ $setting->social }}">
                            @error('social')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">العنوان</label><br>
                            <input type="text" name="address" id="address" class="form-control"
                                value="{{ $setting->address }}">
                            <br>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="bio" class="form-label">نبذة</label><br>
                            <textarea id="bio" name="bio" class="form-textarea form-control">{{ $setting->bio }}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="about" class="form-label">عنا</label><br>
                        <textarea class="editor" id="editor" name="about">{{ $setting->about }}</textarea>
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <h2>العميد</h2>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="aname" class="form-label">الاسم</label><br>
                            <input type="text" name="aname" id="aname" class="form-control"
                                value="{{ $setting->aname }}">
                            <br>
                            @error('aname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="aphoto" class="form-label">الصورة</label><br>
                            <input type="file" name="aphoto" id="aphoto" class="form-control">
                            <br>
                            @error('aphoto')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="abio" class="form-label">السيرة الذاتية</label><br>
                            <textarea id="abio" name="abio" class="form-textarea form-control">{{ $setting->abio }}</textarea>
                            @error('abio')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="moh" class="form-label">المؤهلات العلمية</label><br>
                            <textarea id="moh" name="moh" class="form-textarea form-control">{{ $setting->moh }}</textarea>
                            @error('moh')
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

    @section('script')
        @include('layouts.index.scripts')
    @endsection

@endsection
