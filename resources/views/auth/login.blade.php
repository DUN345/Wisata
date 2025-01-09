<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beranda</title>
    <!-- Link ke file Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class=" bg-gray-100 font-sans">

    <div class="max-w-md mx-auto mt-12 p-6 border border-gray-300 rounded-lg bg-white shadow-lg">
        <h2 class="text-center text-2xl font-semibold text-gray-700 mb-6">Log In</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input id="email" type="email" name="email" required
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400" />
                @error('email')
                    <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400" />
                @error('password')
                    <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-right mt-2">
                <a href="#" class="text-sm text-green-500 hover:text-green-700">Lupa password?</a>
            </div>

            <button type="submit"
                class="w-full mt-4 bg-green-500 text-white py-2 rounded-md font-semibold hover:bg-green-600 transition duration-300">
                Login
            </button>

        </form>

        @if (Route::has('register'))
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-gray-800">
                    Belum punya akun?
                </a>
                <a href="{{ url('/') }}"
                    class="text-sm text-gray-600 font-medium bg-gray-100 py-1 px-4 rounded-md hover:bg-gray-200 transition duration-300">
                    Back
                </a>
            </div>
        @endif
    </div>

</body>

</html>
