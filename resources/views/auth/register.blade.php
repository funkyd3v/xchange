@extends('layouts.master')
@section('title')
   Signup | XchangeMoney
@endsection
@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-gray-200 text-black p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-sky-800">Sign Up</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    <label for="first_name" class="block text-gray-700">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="border border-gray-300 p-2 rounded w-full" required>
                </div>
                <div class="mb-4">
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    <label for="last_name" class="block text-gray-700">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="border border-gray-300 p-2 rounded w-full" required>
                </div>
                <div class="mb-4">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="border border-gray-300 p-2 rounded w-full" required>
                </div>
                <div class="mb-4">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="border border-gray-300 p-2 rounded w-full" required autocomplete="new-password">
                </div>
                <div class="mb-4">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="border border-gray-300 p-2 rounded w-full" required autocomplete="new-password">
                </div>
                <div class="mb-4">
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    <label for="phone" class="block text-gray-700">Phone</label>
                    <input type="text" id="phone" name="phone" class="border border-gray-300 p-2 rounded w-full" required>
                </div>
                @if(isset($promo_code))
                <div class="mb-4">
                    <label for="promo_code" class="block text-gray-700">Promo Code</label>
                    <input type="text" id="promo_code" name="promo_code"
                        class="w-full bg-gray-300 rounded-md mt-1 px-4 py-2 focus:outline-none focus:border-blue-500"
                        value="{{ $promo_code }}">
                </div>
                @endif
                <div class="text-center">
                    <button type="submit" class="bg-blue-800 text-white px-4 py-2 rounded w-full">Sign Up</button>
                </div>
            </form>
            <p class="text-center text-gray-600 mt-4">Already have an account? <a href="{{ route('login') }}" class="text-blue-800">Log In</a></p>
        </div>
    
    </div>
@endsection


{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
