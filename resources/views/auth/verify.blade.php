@extends('layouts.app')

@section('content')
<div class="container-fluid bg-gradient">
    <div class="row justify-content-center w-50">
        <div class="w-100">
            <div class="card shadow-lg border-0 rounded-5 animate__animated animate__fadeInUp"
                style="background: #ffffff; border-radius: 15px;">
                <div class="card-header text-center bg-warning text-white" style="border-radius: 15px 15px 0 0;">
                    <h4 class="fw-bold">{{ __('Verify Your Email Address') }}</h4>
                </div>

                <div class="card-body" style="background-color: #f7f7f7;">
                    @if (session('resent'))
                    <div class="alert alert-success animate__animated animate__fadeIn animate__delay-1s" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif

                    <p class="animate__animated animate__fadeIn animate__delay-2s">{{ __('Before proceeding, please
                        check your email for a verification link.') }}</p>
                    <p class="animate__animated animate__fadeIn animate__delay-3s">{{ __('If you did not receive the
                        email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline"
                            style="font-size: 16px; color: #007bff;">
                            {{ __('click here to request another') }}
                        </button>.
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection