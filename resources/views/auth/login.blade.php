@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ url('login/google') }}">
                                <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
 

        <div class="auth-main">
            <div class="auth_div vivify fadeIn">
                <div class="auth_brand">
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('/assets/images/frontend/logo-min.svg') }}"
                            width="50" class="d-inline-block align-top mr-2"
                            alt="login-logo">{{ config('app.name', 'Laravel') }}</a>
                </div>
                <div class="card">
                    <div class="header">
                        <p class="lead">{{ __('Login to your account') }}</p>
                    </div>
                    <div class="body">

                        <button class="btn btn-signin-social"><i class="fa fa-google google-color"></i> 
                            <a href="{{ url('login/google') }}">Sign in with Google</a>
                            </button>
                        <div class="separator-linethrough"><span>OR</span></div>

                        <form class="form-auth-small" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group c_form_group">
                                {{-- <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label> --}}
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Enter Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group c_form_group">
                                {{-- <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password" placeholder="Enter Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group clearfix">
                                <label class="fancy-checkbox element-left">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <span> {{ __('Remember Me') }}</span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-dark btn-lg btn-block"> {{ __('LOGIN') }}</button>
                            <div class="bottom">
                                @if (Route::has('password.request'))
                                    <span class="helper-text m-b-10"><i class="fa fa-lock"></i>
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </span>
                                    <span>Don't have an account? <a href="{{ route('register') }}">Register</a></span>
                                @endif
                                {{-- <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="page-forgot-password.html">Forgot password?</a></span> --}}

                            </div>
                            {{-- <hr>

                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ url('login/google') }}">
                                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
                                </a>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="animate_lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div> --}}
        </div>

 
@endsection
