@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-5">تعديل معلومات المستخدم</h1>

        <form action="{{ route('user.update', ['user' => $user->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">اسم المستخدم</label><br>
                <input type="text" name="name" id="name" class="form-control" placeholder="الاسم"
                    value="{{ $user->name }}"> <br>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">البريد الالكتروني</label><br>
                <input type="text" name="email" id="email" class="form-control" placeholder="Email"
                    value="{{ $user->email }}"><br>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label>الصلاحيات</label>
                @foreach ($roles as $role)
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="roles[]" value="{{$role->id}}"
                            {{ $user->hasRole($role->name)? 'checked' : '' }}
                        >
                        {{$role->name}}
                    </label>
                </div>
                @endforeach
            </div>

            <div class="mb-3">
                <input type="submit" value="Create" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
