@if(session('error'))
    <div class="bg-red-300 text-black mb-2 px-4">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div class="bg-red-500 text-black mb-2 px-4 py-1">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
