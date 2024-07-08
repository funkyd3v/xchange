<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('custom-css')

</head>
<body class="bg-gray-300 text-white bg-cover opacity-95">

    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Main Content -->
    <div class="container mx-auto mt-5 mb-3">
        @include('components.flash-message')
        @include('components.error-message')
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-black py-10 mt-10">
        @yield('custom-js')
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="font-bold text-lg mb-2">Usefull Links</h3>
                <ul>
                    <li><a href="#" class="hover:text-gray-300">Reviews</a></li>
                    <li><a href="#" class="hover:text-gray-300">News</a></li>
                    <li><a href="#" class="hover:text-gray-300">Help</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-2">Help & Support</h3>
                <ul>
                    <li><a href="#" class="hover:text-gray-300">About Us</a></li>
                    <li><a href="#" class="hover:text-gray-300">Terms & Conditions</a></li>
                    <li><a href="#" class="hover:text-gray-300">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-gray-300">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-2">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-gray-300">Facebook</a>
                    <a href="#" class="hover:text-gray-300">YouTube</a>
                </div>
                <div class="mt-4">
                    <p>Working Time: 8 AM - 12:30 AM</p>
                    <p><a href="tel:+8801737853400" class="hover:text-gray-300">+8801000000400 (WhatsApp)</a></p>
                    <p><a href="mailto:support@xchangernet.com" class="hover:text-gray-300">support@xchangmoney.com</a></p>
                </div>
            </div>
        </div>
        <div class="text-center mt-10">
            <p>© 2024 XChangMoney | All Rights Reserved</p>
        </div>
    </footer>
</body>
</html>
