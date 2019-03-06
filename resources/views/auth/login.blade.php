@extends('layouts.login')
@section('content')

    <div class="login-content">
        <div class="login-logo">
            <h3>
                <a href="/questions" class="text-white">
                {{--<img class="align-content" src="backend/images/logo.png" alt="">--}}
                Pride
                </a></h3>
            {{--<h5 class="text-uppercase text-center">{{ __('Login') }}</h5>--}}
        </div>
        <div class="login-form">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email address</label>
                    <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> {{ __('Remember Me') }}
                    </label>
                    <label class="pull-right">
                        @if (Route::has('password.request'))
                            <a class="text-muted hover-primary fs-13" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </label>

                </div>
                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">{{ __('Login') }}</button>
                <div class="social-login-content">
                    <div class="social-button">
                        <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>
                            <a href="{{ url('/login/facebook') }}" class="btn btn-facebook">Sign in with facebook</a></button>
                        <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>
                            <a href="{{ url('/login/twitter') }}" class="btn btn-facebook">Sign in with twitter</a>
                               </button>
                    </div>
                </div>
                <div class="register-link m-t-15 text-center">
                    <p>Don't have account ? <a href="{{ route('register') }}"> Sign Up Here</a></p>
                </div>
            </form>
        </div>
    </div>


@endsection
