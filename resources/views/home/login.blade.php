
    @extends('layouts.index.page')
@section('title')
    حسابي
@endsection
@section('pagecontent')
    <section class="account-page-area section-gap-equal">
        <div class="container position-relative">
            <div class="row g-5 justify-content-center">
                <div class="col-lg-5">
                    <div class="login-form-box">
                        <h3 class="title">تسجيل الدخول</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">البريد الالكتروني*</label>
                                <input type="email" name="email" id="email" placeholder="البريد الإلكتروني" value="{{ old('email')}}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">كلمة المرور*</label>
                                <input type="password" name="password" id="password" placeholder="كلمة المرور">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                {{-- <span class="password-show"><i class="icon-76"></i></span> --}}
                            </div>
                            <div class="form-group chekbox-area">
                                <div class="edu-form-check">
                                    <input type="checkbox" id="remember-me">
                                    <label for="remember-me">تذكرنى</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="edu-btn btn-medium">تسجيل الدخول <i
                                        class="icon-west"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <ul class="shape-group">
                <li class="shape-1 scene"><img data-depth="2" src="{{ asset('theme/assets/images/about/shape-07.png') }}"
                        alt="Shape"></li>
                <li class="shape-2 scene"><img data-depth="-2" src="{{ asset('theme/assets/images/about/shape-13.png') }}"
                        alt="Shape"></li>
                <li class="shape-3 scene"><img data-depth="2"
                        src="{{ asset('theme/assets/images/counterup/shape-02.png') }}" alt="Shape"></li>
            </ul>
        </div>
    </section>
@endsection

