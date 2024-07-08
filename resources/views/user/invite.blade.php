@extends('layouts.master')

@section('title')
    Invite your friends
@endsection

@section('content')
<div>
    <div class="bg-teal-900 shadow p-2 rounded mb-2">
        <div class="flex space-x-4">
            <button class="px-4 py-2 rounded bg-gray-800">Start Exchange</button>
            <button class="px-4 py-2 rounded bg-gray-800">My Exchanges</button>
            <button class="px-4 py-2 rounded bg-gray-800">Payment History</button>
            <button class="px-4 py-2 rounded bg-gray-800">My Referrals</button>
            <button class="px-4 py-2 rounded bg-gray-800">My Reviews</button>
            <button class="px-4 py-2 rounded bg-gray-800">Withdraw Money</button>
            <button class="px-4 py-2 rounded bg-gray-800">Edit Profile</button>
            <button class="px-4 py-2 rounded bg-gray-800">Logout</button>
        </div>
    </div>

    <div class="bg-white text-black shadow p-4 rounded mb-4">
        <h1 class="text-xl font-bold mb-4">Refer a Friend</h1>
        <div class="flex items-center">
            <input type="text" value="http://localhost:8000/?ref=17806" class="flex-1 p-2 border rounded-md" readonly>
            <button class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Copy to Clipboard</button>
        </div>
    </div>

    <div class="bg-white text-black shadow p-4 rounded mb-4">
        <h2 class="text-lg font-bold mb-4">My Referrals</h2>
        <p>You have not received any referrals at this time.</p>
    </div>

    <div class="bg-white text-black shadow p-4 rounded mb-4">
        <h2 class="text-lg font-bold mb-4">Referrals Exchanges</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">Date</th>
                        <th class="px-4 py-2 border">Reference ID</th>
                        <th class="px-4 py-2 border">Amount Send</th>
                        <th class="px-4 py-2 border">Amount Receive</th>
                        <th class="px-4 py-2 border">Your Commission</th>
                        <th class="px-4 py-2 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" class="text-center p-4">No exchanges made by your referrals at this time.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection