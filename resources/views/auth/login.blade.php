@extends('layouts.app')

@section('content')
<div class="container-fluid bg-gradient">
    <div class="row justify-content-center w-50">
        <div class="w-100">
            <div class="card shadow-lg border-0 rounded-5 animate__animated animate__fadeInRight" style="background: #ffffff; border-radius: 15px;">
                <div class="card-header text-center bg-primary text-white" style="border-radius: 15px 15px 0 0;">
                    <h4 class="fw-bold">{{ __('Login to Your Dashboard') }}</h4>
                </div>

                <div class="card-body" style="background-color: #f7f7f7;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3 animate__animated animate__fadeIn animate__delay-1s">
                            <label for="email" class="form-label" style="font-weight: bold; color: #333;">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="border-radius: 10px;">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        <div class="mb-3 animate__animated animate__fadeIn animate__delay-2s">
                            <label for="password" class="form-label" style="font-weight: bold; color: #333;">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="border-radius: 10px;">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check animate__animated animate__fadeIn animate__delay-3s">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="border-radius: 5px;">
                            <label class="form-check-label" for="remember" style="font-size: 14px; color: #555;">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="d-flex justify-content-between animate__animated animate__fadeIn animate__delay-4s">
                            <button type="submit" class="btn btn-primary" style="background-color: #007bff; border-radius: 50px; padding: 10px 20px; font-size: 16px; transition: all 0.3s ease;">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="font-size: 14px; text-decoration: none; color: #007bff;">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
