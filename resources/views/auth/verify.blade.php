@extends('layouts.app')

@section('content')
<h1>Verificación De Email</h1>
<div class="container mx-auto mt-20 text-center">
        <div class="text-2xl my-5">{{ __('Verify Your Email Address') }}</div>

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
        <p class="mt-3">{{ __('If you did not receive the email') }}</p>

        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class=" mt-10 max-w-sm bg-green-500 w-full hover:bg-green-700 text-gray-100 
            p-3 focus:outline-none focus:shadow-outline uppercase font-bold">{{ __('click here to request another') }}</button>
        </form>
</div>
@endsection
