@extends('layouts.master')
@section('title')
    Forgot Password
@endsection

@section('content')
<div class="w-full max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Forgot Password</h2>
    <p class="text-center text-gray-600 mb-6">Enter your email address to reset your password</p>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-4">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email Address</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" placeholder="Email" required autofocus>
            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
        </div>
        <div class="mb-6">
            <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Reset Password
            </button>
        </div>
    </form>
    <div class="text-center">
        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('login') }}">
            Remembered your password? Sign In
        </a>
    </div>
</div>    
@endsection
