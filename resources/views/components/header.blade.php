<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="border border-white p-4">
        <div class="container mx-auto flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <img src="{{ asset('image/gambar.png') }}" alt="Narmada Botanic Garden Logo" class="h-28 mr-6 ">
                <span class="text-white-600 font-bold text-lg">Pesona</span>
                <span class="text-whita-600 font-light text-lg">Karang Anyar</span>
            </div>

            <nav>
                <ul class="flex gap-8">
                    <!-- Beranda -->
                    <li>
                        <a href="{{ route('dashboard') }}" class="text-green-500 hover:text-green-600 text-xl">
                            Beranda
                        </a>
                    </li>
                   
                    <!-php - Booking -->
                    <li>
                        <a href="{{ route('booking.form') }}" class="text-gray-700 hover:text-blue-600 text-xl">
                            Booking
                        </a>
                    </li>
                    <!-- About Us -->
                    <li>
                        <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 text-xl">
                            About Us
                        </a>
                    </li>
                    <!-- Profile Dropdown -->
                    <li class="relative">
                        <!-- Button Dropdown -->
                        <button id="dropdownButton" onclick="toggleDropdown()"
                            class="text-gray-700 hover:text-blue-600 text-xl focus:outline-none">
                            Profile
                        </button>

                        <!-- Dropdown Menu -->
                        <ul id="dropdownMenu"
                            class="absolute hidden bg-white border border-gray-300 rounded shadow-md mt-2 w-37">
                            <li>
                                <a href="/profile"
                                    class="block px-4 py-2 text-gray-600 hover:bg-green-300 hover:text-white transition">
                                    Profile
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="block">
                                    @csrf
                                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="block px-4 py-2 text-gray-600 hover:bg-green-300 hover:text-white transition">
                                        Logout
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>


                </ul>
            </nav>
        </div>
        <!-- JavaScript -->
        <script>
            function toggleDropdown() {
                const menu = document.getElementById('dropdownMenu');
                menu.classList.toggle('hidden');
            }

            // Optional: Close the dropdown when clicking outside
            document.addEventListener('click', function(event) {
                const dropdownButton = document.getElementById('dropdownButton');
                const dropdownMenu = document.getElementById('dropdownMenu');

                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        </script>
    </header>
</body>

</html>
