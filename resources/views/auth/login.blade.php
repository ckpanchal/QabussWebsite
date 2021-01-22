@extends('Front.layout.app')

@section('content')
<div class="container">
    <div class="body-sectio-listing row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body login-frm">   
                    <!-- <div class="login100-form-title" style="background-image: url(image/login.png);">
                        <span class="login100-form-title-1">
                        Sign In
                        </span>
                    </div> -->
                    <form method="POST" action="{{ route('login') }}" style="padding: 50px 10px;">
                        @csrf

                        <div class="form-group clearfix">
                            <label style="left: 0px; margin: 0px;" for="email" class="txt1 col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" placeholder="Enter EmailId" class="input100  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label  style="left: 0px; margin: 0px;" for="password" class="txt1 col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="input100  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="password" class="txt1 col-md-4 col-form-label text-md-right"></label>


                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <label for="password" class="txt1 col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                        <div class="register-class">
                        <a class="" href="{{ route('register') }}">
                        Create your Account <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
