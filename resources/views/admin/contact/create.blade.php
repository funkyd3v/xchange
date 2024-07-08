@extends('admin.master')

@section('content')
<div class="bg-gray-200 p-6 rounded-lg shadow-lg w-full md:w-96">
    <h2 class="text-2xl text-center bg-green py-2">Add Contacts</h2>
    <p class="text-sm text-red font-italic text-center">Save only username or number. For example, for fb.com/yourpage, save 'yourpage'(without quote).</p> 
    <form method="POST" action="{{ route('admin.contacts.store') }}">
        @csrf
        <div class="mb-2 pl-5 py-2">
            <label for="whatsapp" class="block text-gray-700 font-bold mb-2">WhatsApp Number:</label>
            <div class="flex">
                <input type="text" id="whatsapp" name="whatsapp" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                <button type="submit" class="ml-2 bg-yellow px-3 py-2 rounded rounded-lg">Save</button>
            </div>
        </div>
    </form>
    <form method="POST" action="{{ route('admin.contacts.store') }}">
        @csrf
        <div class="mb-2 pl-5 py-2">
            <label for="telegram" class="block text-gray-700 font-bold mb-2">Telegram Username:</label>
            <div class="flex">
                <input type="text" id="telegram" name="telegram" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                <button type="submit" class="ml-2 bg-yellow px-3 py-2 rounded rounded-lg">Save</button>
            </div>
        </div>
    </form>
    <form method="POST" action="{{ route('admin.contacts.store') }}">
        @csrf
        <div class="mb-2 pl-5 py-2">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
            <div class="flex">
                <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                <button type="submit" class="ml-2 bg-yellow px-3 py-2 rounded rounded-lg">Save</button>
            </div>
        </div>
    </form>
    <form method="POST" action="{{ route('admin.contacts.store') }}">
        @csrf
        <div class="mb-2 pl-5 py-2">
            <label for="phone" class="block text-gray-700 font-bold mb-2">Phone:</label>
            <div class="flex">
                <input type="text" id="phone" name="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                <button type="submit" class="ml-2 bg-yellow px-3 py-2 rounded rounded-lg">Save</button>
            </div>
        </div>
    </form>
    <form method="POST" action="{{ route('admin.contacts.store') }}">
        @csrf
        <div class="mb-2 pl-5 py-2">
            <label for="facebook" class="block text-gray-700 font-bold mb-2">Facebook Page Handler:</label>
            <div class="flex">
                <input type="text" id="facebook" name="facebook" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                <button type="submit" class="ml-2 bg-yellow px-3 py-2 rounded rounded-lg">Save</button>
            </div>
        </div>
    </form>
    <form method="POST" action="{{ route('admin.contacts.store') }}">
        @csrf
        <div class="mb-2 pl-5 py-2">
            <label for="twitter" class="block text-gray-700 font-bold mb-2">X(Twitter) Handler:</label>
            <div class="flex">
                <input type="text" id="twitter" name="twitter" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                <button type="submit" class="ml-2 bg-yellow px-3 py-2 rounded rounded-lg">Save</button>
            </div>
        </div>
    </form>
    <form method="POST" action="{{ route('admin.contacts.store') }}">
        @csrf
        <div class="mb-2 pl-5 py-2">
            <label for="skype" class="block text-gray-700 font-bold mb-2">Skype Username:</label>
            <div class="flex">
                <input type="text" id="skype" name="skype" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                <button type="submit" class="ml-2 bg-yellow px-3 py-2 rounded rounded-lg">Save</button>
            </div>
        </div>
    </form>
    <form method="POST" action="{{ route('admin.contacts.store') }}">
        @csrf
        <div class="mb-2 pl-5 py-2">
            <label for="youtube" class="block text-gray-700 font-bold mb-2">Youtube Handler:</label>
            <div class="flex">
                <input type="text" id="youtube" name="youtube" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                <button type="submit" class="ml-2 bg-yellow px-3 py-2 rounded rounded-lg">Save</button>
            </div>
        </div>
    </form>
</div>

@endsection