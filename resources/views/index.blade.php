@extends('layouts.master')
@section('title')
    Exchange Your Money
@endsection
@section('custom-css')
<style>
    .bg-cover {
        background-image: url({{ asset('index-page.jpg') }});
        background-size: cover;
        background-position: center;
    }
    .carousel {
        display: flex;
        overflow: hidden;
        position: relative;
        width: 100%;
        max-width: 600px;
        margin: auto;
    }
    .carousel-item {
        flex: 0 0 100%;
        transition: transform 0.5s ease-in-out;
    }
</style>
@endsection

@section('content')
<div class="mx-4">
    <div class=" text-white py-20 px-10 text-center">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold mb-4">Welcome to XChangeMoney</h1>
            <p class="text-lg mb-6">Where every transaction is a gateway to opportunity. Whether you're traveling, investing, or doing business, we offer competitive rates, fast service, and a seamless experience.</p>
            <p class="text-lg mb-6">Trust in our expertise and let us help you make the most of your money, no matter where in the world you need it.</p>
            <p class="text-lg font-semibold">Discover the power of exchange and unlock a world of possibilities with us today!</p>
        </div>
    </div>
</div>

<main class="max-w-7xl mx-auto p-4">
    
    {{-- <div class="bg-white text-black p-6 rounded shadow mt-4">
        <div class="text-center">
            <h1 class="text-3xl font-bold">Start Exchange</h1>
            <div class="mt-4">
                <label for="send" class="block text-sm font-medium text-gray-700">SEND</label>
                <select id="send" class="mt-1 block w-full border-gray-300 rounded-md">
                    <option>Perfect Money USD</option>
                </select>
            </div>
            <div class="mt-4">
                <label for="receive" class="block text-sm font-medium text-gray-700">RECEIVE</label>
                <select id="receive" class="mt-1 block w-full border-gray-300 rounded-md">
                    <option>Select</option>
                </select>
            </div>
            <button class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Exchange</button>
        </div>
    </div> --}}
    <section class="mt-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-gray-100 text-black p-6 rounded shadow">
                <h2 class="text-xl font-bold mb-4">Why Choose Us?</h2>
                <ul class="list-disc pl-5">
                    <li>Instant Transactions</li>
                    <li>Diverse Currency Options</li>
                    <li>Secure and Reliable</li>
                    <li>24/7 Service</li>
                </ul>
            </div>
            <div class="bg-gray-100 text-black p-6 rounded shadow col-span-2">
                <h2 class="text-xl font-bold mb-4">Dollar Buy Sell</h2>
                <p>Dollar Buy Sell BD</p>
                <p>Perfect Money to USDT</p>
                <p>Webmoney to USDT</p>
                <p>Trusted Dollar Buy Sell Site</p>
            </div>
        </div>
    </section>
    <section class="mt-8">
        <h2 class="text-2xl font-bold mb-4">Our Reserves</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($currencies as $currency)
            <div class="bg-gray-100 text-black p-4 rounded shadow">
                <p class="bg-green-500 px-2 py-1 text-center">{{ $currency->name }}</p>
                <p class="bg-yellow-400 mt-2 px-2 py-1 text-center">{{ $currency->amount }} {{ $currency->dollar === 1 ? 'USD' : 'BDT' }}</p>
            </div>
            @endforeach
        </div>
    </section>
    <section class="mt-8">
        <h2 class="text-2xl font-bold mb-4">Latest Exchanges</h2>
        <table class="min-w-full bg-gray-100 text-black rounded shadow">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300">Direction</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300">Amount</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300">Date</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                @php
                    $sendCurrency = App\Models\Currency::find($transaction->send_currency);
                    $receiveCurrency = App\Models\Currency::find($transaction->receive_currency);
                @endphp
                <tr>
                    <td class="px-6 py-2 border-b border-gray-300">{{ $sendCurrency->name }} to {{ $receiveCurrency->name }}</td>
                    <td class="px-6 py-2 border-b border-gray-300">{{ $transaction->receive_currency_amount }} {{ $receiveCurrency->dollar === 1 ? 'USD' : 'BDT' }}</td>
                    <td class="px-6 py-2 border-b border-gray-300">
                        @php
                            $timestamp = $transaction->updated_at;
                            $time = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $timestamp);
                        @endphp
                        {{ $time->diffForHumans() }}
                    </td>
                    <td class="px-4 text-center border-b border-gray-300">{{ $transaction->status == 2 ? 'Completed' : 'Opps!' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</main>
@endsection