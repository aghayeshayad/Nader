@extends('layouts.FrontEnd.master')
@section('style')
    @parent
@endSection
@section('content')
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Phone Number -->
            <div>
                <x-label for="phone" :value="__('شماره همراه')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('شماره همراه')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('رمز عبور')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center " style="direction: ltr!important;">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('مرا به خاطرت بسپار') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-content-between mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('رمز عبورت رو فراموش کردی؟') }}
                    </a>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('حساب داری؟') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('وارد شو') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@endsection
