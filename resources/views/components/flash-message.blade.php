@if(session('success'))
    <div class="bg-gray-300 text-black">
        {{ session('success') }}
    </div>
@endif
