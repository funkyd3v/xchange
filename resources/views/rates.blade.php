@extends('layouts.master')
@section('title')
    Exchange Rates
@endsection

@section('content')
<div class="max-w-7xl mx-auto mt-10 p-6 bg-gray-200 text-black shadow-md rounded-md">
    <h2 class="text-2xl text-center font-bold mb-6">Exchange Rates</h2>
    
    <!-- USD Section -->
    <div class="mb-6">
        @foreach ($rates as $rate)
        @php
            $currency = App\Models\Currency::where('id', $rate->currency_id)->first();
        @endphp
        <h3 class="text-xl font-semibold mt-4 bg-green-300 px-5 py-2">{{ $currency->name }}</h3>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Currency <i class="fas fa-paper-plane"></i>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Buy Rate <i class="fas fa-inbox"></i>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Sale Rate <i class="fas fa-exchange-alt"></i>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Reserve <i class="fas fa-coins"></i>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $currency->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $rate->buy_rate }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $rate->sale_rate }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $currency->amount }}
                    </td>
                </tr>
            </tbody>
        </table>
        @endforeach
    </div>
</div>

@endsection