<nav class="bg-black py-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-2xl font-bold"><a href="{{ route('home') }}">XChangeMoney</a></div>
        <div class="flex space-x-4">
            @if (Auth::user())
            <a href="{{ route('user.exchange') }}" class="hover:text-gray-300">Exchange</a>  
            @endif
            <a href="{{ route('user.rates') }}" class="hover:text-gray-300">Rates</a>
            <a href="{{ route('user.testimonials') }}" class="hover:text-gray-300">Testimonials</a>
            <a href="{{ route('contact') }}" class="hover:text-gray-300">Contact Us</a>
        </div>
        @if (Auth::user())
           Welcome {{ Auth::user()->last_name }}
           <div class="relative">
                <button class="bg-gray-100 text-black px-4 py-2 rounded" id="accountBtn">My Account</button>
                <div class="absolute right-0 mt-2 w-48 bg-gray-100 border rounded shadow-lg hidden" id="dropDown">
                <a href="{{ route('user.account') }}" class="block px-4 py-2 text-black hover:bg-gray-200">Account</a>
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-black hover:bg-gray-200">Edit Profile</a>
                <a href="#" class="block px-4 py-2 text-black hover:bg-gray-200" id="logoutLink">Logout</a>
                </div>
                <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @else
        <div class="flex space-x-2">
            <a href="{{ route('register') }}" class="bg-green-400 text-black px-4 py-2 rounded">Sign Up</a>
            <a href="{{ route('login') }}" class="bg-green-400 text-black px-4 py-2 rounded">Log In</a>
        </div>
        @endif
    </div>
</nav>

<script>
    function toggleDropdown(event) {
        var dropdown = document.getElementById('dropDown');
        dropdown.classList.toggle('hidden');
    }

    function hideDropdown(event) {
        var dropdown = document.getElementById('dropDown');
        var button = document.getElementById('accountBtn');
        if (!dropdown.contains(event.target) && !button.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    }

    document.getElementById('accountBtn').addEventListener('click', function(event) {
        event.stopPropagation();
        toggleDropdown(event);
    });

    document.addEventListener('click', function(event) {
        hideDropdown(event);
    });

    document.getElementById('logoutLink').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logoutForm').submit(); 
    });
</script>