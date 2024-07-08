@extends('layouts.master')
@section('title')
    My Profile
@endsection

@section('content')
<div class="bg-gray-200 text-black shadow p-4 rounded mb-4">
    <h1 class="text-xl font-bold">My Profile</h1>
</div>

<div class="flex space-x-4">
    <div class="bg-gray-200 text-black shadow p-4 rounded w-2/3">
        <h2 class="text-lg font-bold mb-4">Profile Information</h2>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" class="mt-1 p-2 block w-full border rounded-md">
                </div>
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" class="mt-1 p-2 block w-full border rounded-md">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" class="mt-1 p-2 block w-full border rounded-md border-white" disabled>
                </div>
                <div class="col-span-2">
                    <label for="address_1" class="block text-sm font-medium text-gray-700">Address Line 1</label>
                    <input type="text" id="address_1" name="address_1" class="mt-1 p-2 block w-full border rounded-md" value="{{ $user->address_1 ? $user->address_1 : null }}">
                </div>
                <div class="col-span-2">
                    <label for="address_2" class="block text-sm font-medium text-gray-700">Address Line 2</label>
                    <input type="text" id="address_2" name="address_2" class="mt-1 p-2 block w-full border rounded-md" value="{{ $user->address_2 ? $user->address_2 : null }}">
                </div>
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" id="city" name="city" class="mt-1 p-2 block w-full border rounded-md" value="{{ $user->city ? $user->city : null }}">
                </div>
                <div>
                    <label for="state" class="block text-sm font-medium text-gray-700">State/Province</label>
                    <input type="text" id="state" name="state" class="mt-1 p-2 block w-full border rounded-md" value="{{ $user->state ? $user->state : null }}">
                </div>
                <div>
                    <label for="zip_code" class="block text-sm font-medium text-gray-700">Zip Code</label>
                    <input type="text" id="zip_code" name="zip_code" class="mt-1 p-2 block w-full border rounded-md" value="{{ $user->zip_code ? $user->zip_code : null }}">
                </div>
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                    <select id="country" name="country" class="mt-1 p-2 block w-full border rounded-md">
                        <option value="{{ $user->country ? $user->country : null }}" disabled selected>{{ $user->country ? $user->country : 'Select Country' }}</option>
                    </select>
                </div>
                <div class="col-span-2">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{ $user->phone }}" class="mt-1 p-2 block w-full border rounded-md">
                </div>
                <div class="col-span-2 flex items-center">
                    <input type="checkbox" id="newsletter" name="newsletter" class="mr-2">
                    <label for="newsletter" class="text-sm text-gray-700">I'd like to receive newsletter</label>
                </div>
            </div>
            <div class="mt-4 flex space-x-4">
                <button type="submit" class="bg-teal-900 text-white px-4 py-2 rounded">Update</button>
                <button type="reset" class="bg-gray-300 text-black px-4 py-2 rounded">Cancel</button>
            </div>
        </form>
    </div>

    <div class="bg-gray-200 text-black shadow p-4 rounded w-1/3">
        <h2 class="text-lg font-bold mb-4">Change Password</h2>
        <form action="{{ route('user.password-change') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                <input type="password" id="current_password" name="current_password" class="mt-1 p-2 block w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input type="password" id="new_password" name="new_password" class="mt-1 p-2 block w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="mt-1 p-2 block w-full border rounded-md">
            </div>
            <button type="submit" class=" w-full justify-center bg-teal-900 text-white px-4 py-2 rounded">Change Password</button>
        </form>
    </div>
</div>
@endsection

@section('custom-js')
<script>
    fetch('https://restcountries.com/v3.1/all')
      .then(response => response.json())
      .then(data => {
        data.sort((a, b) => a.name.common.localeCompare(b.name.common));
        const select = document.getElementById('country');
        data.forEach(country => {
          const option = document.createElement('option');
          option.value = country.name.common;
          option.innerHTML = `<img src="${country.flags.png}" alt="${country.name.common} flag" width="20" height="15" /> ${country.name.common}`;
          select.appendChild(option);
        });
      })
      .catch(error => {
        console.error('Error fetching country data:', error);
      });
  </script>
@endsection