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


        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('رمز عبور جدید')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('تایید') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@endsection
