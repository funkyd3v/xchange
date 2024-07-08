@extends('layouts.master')
@section('title')
    Login
@endsection
@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="bg-gray-200 p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-sky-800">Log In</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="border border-gray-300 p-2 rounded w-full text-black">
            </div>
            <div class="mb-6">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="border border-gray-300 p-2 rounded w-full text-black">
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-800 text-white px-4 py-2 rounded w-full">Log In</button>
            </div>
            <div class="flex items-center">
                <!-- Remember Me -->
                <div class="flex-initial w-64">
                    <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div class="flex-none">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
        <p class="text-center text-gray-600 mt-4">Don't have an account? <a href="{{ route('register') }}" class="text-blue-800">Sign Up</a></p>
    </div>
</div>
@endsection

{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
