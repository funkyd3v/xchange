@extends('layouts.master')
@section('title')
Give your valuable ratings!
@endsection

@section('content')
<div class="max-w-md mx-auto">
    <div class="mt-3 text-black">
        <h3 class="text-2xl font-bold text-center">Give your valuable ratings!</h3>
    </div>
    <form action="{{ route('user.store.testimonial') }}" method="post">
        @csrf
        <div class="text-black mt-6">
            <div class="mb-3">
                <label for="rating" class="block text-gray-700 text-sm font-bold mb-1">Rating:</label>
                <select name="rating" id="rating" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1">1 Star</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="review" class="block text-gray-700 text-sm font-bold mb-1">Review:</label>
            <textarea name="review" id="review" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit Review</button>
        </div>
    </form>
</div>
@endsection