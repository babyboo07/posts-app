<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gray-200 min-h-screen font-base">
    <div id="app">

        <div class="flex flex-col md:flex-row">

            @include('includes.sidebar')

            <div class="w-full md:flex-1">
                <nav class="hidden md:flex justify-between items-center bg-white p-4 shadow-md h-16">
                    <div>
                        <input class="px-4 py-2 bg-gray-200 border border-gray-300 rounded focus:outline-none"
                            type="text" placeholder="Search.." />
                    </div>
                    <div>
                        <button class="mx-2 text-gray-700 focus:outline-none"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-arrow-right-from-bracket text-gray-800"></i>
                        </button>
                    </div>
                </nav>
                <main>
                    <!-- Replace with your content -->
                    <div class="px-8 py-6">
                        @yield('content')
                    </div>
                    <!-- /End replace -->
                </main>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</body>

</html>
