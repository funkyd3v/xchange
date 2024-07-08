@extends('layouts.master')
@section('title')
    XChange
@endsection

@section('content')
    <!-- Start Exchange Section -->
    <div class="bg-white text-black rounded-lg p-8 flex-1">
        <h2 class="text-center text-2xl font-bold mb-4">Exchange in Minutes Between</h2>
        <div class="flex justify-center">
            <div class="flex flex-col items-center">
                <label for="send" class="mb-2 font-semibold">SEND</label>
                <select id="send" class="border rounded p-2">
                    <option>Perfect Money USD</option>
                </select>
            </div>
            <div class="mx-8 my-auto">
                <button class="bg-blue-600 text-white px-8 py-2 rounded">Exchange</button>
            </div>
            <div class="flex flex-col items-center">
                <label for="receive" class="mb-2 font-semibold">RECEIVE</label>
                <select id="receive" class="border rounded p-2">
                    <option>Select</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="bg-white text-black rounded-lg p-8 flex-1">
        <h2 class="text-center text-2xl font-bold mb-4">Testimonials</h2>
        <div class="flex justify-center">
            <div class="text-center">
                <div class="flex justify-center">
                    <div class="bg-blue-600 text-white px-4 py-2 rounded-full">Ayon</div>
                </div>
                <div class="mt-2 text-yellow-500">
                    <span class="font-bold">5</span> ★★★★★
                </div>
                <p class="mt-2">Good</p>
                <p class="text-gray-600">Payeer USD - N- Personal BDT</p>
            </div>
        </div>
    </div>
@endsection