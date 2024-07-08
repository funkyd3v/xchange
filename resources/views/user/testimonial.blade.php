@extends('layouts.master')
@section('title')
    What our customers say
@endsection

@section('content')
<div class="max-w-4xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-extrabold text-black text-center">What Our Customers Say</h2>
    <div class="mt-6 grid grid-cols-3 gap-4">
        {{-- @if ({{ $testimonials}})
            
        @else
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="flex items-center">
                <img class="h-16 w-16 rounded-full" src="https://via.placeholder.com/64" alt="User Image">
                <div class="ml-4">
                    <p class="text-lg font-medium text-gray-900">John Doe</p>
                    <p class="text-sm text-gray-600">CEO, Company</p>
                </div>
            </div>
            <blockquote class="mt-6 text-gray-600">
                <p class="text-base leading-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et arcu velit. Nulla facilisi. Cras volutpat ex orci, id vehicula metus ultrices sit amet.</p>
            </blockquote>
        </div>
        @endif --}}
        @foreach ($testimonials as $testimonial)
          <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="flex items-center">
                <img class="h-16 w-16 rounded-full" src="https://via.placeholder.com/64" alt="User Image">
                <div class="ml-4">
                    <p class="text-lg font-medium text-gray-900">{{ $testimonial->user->first_name }} {{ $testimonial->user->last_name }}</p>
                    <p class="text-sm flex">
                        @for ($i = 0; $i < 5; $i++)
                            @if ($i < $testimonial->rating)
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.392 3.5L6.5 12.5 2 8l5.608-.75L10 2l2.392 5.25L18 8l-4.5 4.5 1.892 5.5z"/>
                                </svg>
                            @else
                                <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.392 3.5L6.5 12.5 2 8l5.608-.75L10 2l2.392 5.25L18 8l-4.5 4.5 1.892 5.5z"/>
                                </svg>
                            @endif
                        @endfor
                    </p>
                </div>
            </div>
            <blockquote class="mt-6 text-gray-600">
                <p class="text-base leading-7">{{ $testimonial->review }}</p>
            </blockquote>
        </div> 
          @endforeach
    </div>
</div>

@endsection