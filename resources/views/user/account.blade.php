@extends('layouts.master')
@section('title')
    Welcome to your account
@endsection 

@section('content')
<main class="container mx-auto p-4">
    <div class="bg-gray-200 text-black shadow p-4 rounded mb-4">
        <p>Welcome, {{ Auth::user()->first_name }}. You are currently signed in, so you can start to make exchanges!</p>
    </div>
    <div class="flex space-x-4">
        <div class="bg-gray-200 text-black shadow p-4 rounded w-1/3">
            <h2 class="text-lg font-bold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} Stats</h2>
            <div class="mt-4 space-y-2">
                <p>Exchanges: {{ $completeTransaction }}</p>
                <p>Testimonials: {{ $testimonial }}</p>
                <p>Referrals: {{ $referral }}</p>
            </div>
        </div>

        <div class="bg-gray-200 text-black shadow p-4 rounded w-2/3">
            <h2 class="text-lg font-bold">Identity Upload Troubleshooting</h2>
            <ul class="list-disc list-inside">
                <li>You have a webcam and Adobe Flash is enabled in your browser</li>
                <li>The document is not expired or considerably damaged</li>
                <li>The image is clear and all borders of the document are fully visible</li>
                <li>The image is bright and well lit</li>
                <li>There is no glare on the document</li>
            </ul>
        </div>
    </div>
    <div class="bg-gray-200 text-black shadow p-4 rounded mt-4">
        <h2 class="text-lg font-bold">Latest 10 Exchanges</h2>
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr>
                    <th class="border border-black px-4 py-2">Date</th>
                    <th class="border border-black px-4 py-2">Send</th>
                    <th class="border border-black px-4 py-2">Receive</th>
                    <th class="border border-black px-4 py-2">Send Amount</th>
                    <th class="border border-black px-4 py-2">Receive Amount</th>
                    <th class="border border-black px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                
                    @foreach ($transactions as $transaction)
                    <tr>
                        @if ($transaction !== null)
                            <td class="border border-black px-4 py-2 text-center">{{ \Carbon\Carbon::parse($transaction->created_at)->format('d-m-Y') }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                             @php
                                    $send = App\Models\Currency::where('id', $transaction->send_currency)->first();
                                @endphp
                                {{ $send->name }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                @php
                                    $receive = App\Models\Currency::where('id', $transaction->receive_currency)->first();
                                @endphp
                                {{ $receive->name }}</td>
                            <td class="border border-black px-4 py-2 text-center">{{ $transaction->send_currency_amount }}</td>
                            <td class="border border-black px-4 py-2 text-center">{{ $transaction->receive_currency_amount }}</td>
                            <td class="border border-black px-4 py-2 text-center">{{ $transaction->status == 0 ? 'Initiate' : ($transaction->status == 1 ? 'Pending' : 'Completed') }}</td>
                        @else
                            <td class="border border-black px-4 py-2 text-center" colspan="5">You do not have exchanges at this time.</td>
                        @endif
                    </tr>
                    @endforeach 
            </tbody>
        </table>
    </div>

    <div class="bg-gray-200 text-black shadow p-4 rounded mt-4">
        <h1 class="text-xl font-bold mb-4">Refer your friends</h1>
        <div class="flex items-center">
            <input type="text" id="refer" value="http://localhost:8000/ref={{ $user->refer_code }}" class="flex-1 p-2 border rounded-md" readonly>
            <button id="copyButton" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Copy to Clipboard</button>
        </div>
    </div>
</main>
@endsection

@section('custom-js')
   <script>
        document.addEventListener('DOMContentLoaded', function() {
            const copyButton = document.getElementById('copyButton');
            const referralInput = document.getElementById('refer');

            copyButton.addEventListener('click', function() {
                referralInput.select();
                referralInput.setSelectionRange(0, 99999);

                try {
                    const successful = document.execCommand('copy');
                    if (successful) {
                        copyButton.innerText = 'Copied!';
                    } else {
                        console.log('Failed to copy the referral link.');
                    }
                } catch (err) {
                    console.error('Error copying to clipboard: ', err);
                }
            });
        });
   </script>
@endsection