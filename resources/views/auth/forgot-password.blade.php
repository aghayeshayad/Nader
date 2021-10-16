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

        <form method="POST" action="{{ route('password.phone') }}">
            @csrf

            <!-- Phone Number -->
            <div>
                <x-label for="phone" :value="__('شماره همراه')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('کد دریافتی را وارد کنید') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@endsection
