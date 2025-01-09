<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-white text-gray-800">
    <div class="navbar fixed top-0 left-0 right-0 z-10 flex justify-between items-center p-5 bg-white w-full shadow-md">
        <img src="{{ asset('image/gambar.png') }}" alt="Logo" class="w-20 h-auto">


        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    @if (auth()->user()->hasRole('admin'))
                        <a class="text-white" href="{{ url('/post') }}">Admin Dashboard</a>
                    @endif
                    @if (auth()->user()->hasRole('user'))
                        <form class="text-black" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="text-black" style="color: black" href="route('logout')"
                                onclick="event.preventDefault();
                    this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    @endif
                @else
                    <a href="{{ route('login') }}"
                        class="bg-green-500 text-white py-2 px-6  rounded-lg font-semibold transition duration-300 hover:bg-green-600 ">LogIn
                    </a>

                @endauth
            </div>
        @endif
    </div>
</body>

</html>
