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

<body class="bg-gray-200 font-base p-4">
    <div id="app">
        <nav
            class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
            <div class="container flex flex-wrap justify-between items-center mx-auto">
                <a href="/" class="flex items-center">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">FlashFlow</span>
                </a>
                <div class="flex md:order-2">
                    @if (Route::has('login'))
                        @auth
                            <div class="dropdown inline-block relative">
                                <button class="text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
                                    <span class="mr-1">{{ Auth::user()->name }}</span>
                                    <svg class="fill-current h-4 w-8" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </button>
                                <ul class="dropdown-menu absolute bg-white hidden text-gray-700 pt-2 ">
                                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                        <li class=""><a
                                                class="rounded-t bg-white hover:bg-gray-400 py-2 px-5 block flex-nowrap"
                                                href="/home"></i>Dashboard</a></li>
                                    @endif
                                    <li class=""><a
                                            class="rounded-t bg-white hover:bg-gray-400 py-2 px-5 block flex-nowrap"
                                            href="{{ url('/users', Auth::user()->id) }}"><i
                                                class="fa-solid fa-user pr-1"></i>Profile</a></li>
                                    <li class=""><button
                                            class="rounded-t w-full bg-white hover:bg-gray-400 py-2 px-5 block flex-nowrap"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa-solid fa-arrow-right-from-bracket "></i>
                                            Logout
                                        </button></li>
                                    <li class=""><a
                                            class="rounded-t bg-white hover:bg-gray-400 py-2 px-5 block flex-nowrap"
                                            href="/send-mail"><i class="fa-solid fa-envelope pr-1"></i>Send Mail</a></li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                                in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
                <div class="hidden items-center w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <div class="pb-2 relative mx-auto text-gray-600">
                        <form action="{{ route('home.searchTitle') }}" method="post">
                            @csrf
                            <input
                                class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                type="search" name="search" placeholder="Search">
                            <button type="submit" class="absolute right-0 top-0 mt-3.5 mr-4">
                                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                    x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                    style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px"
                                    height="512px">
                                    <path
                                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="text-center border-t-2 border-t-gray-200">
                @include('includes.category_home')
            </div>
        </nav>

        <main>
            <!-- Replace with your content -->
            <div class=" bg-white">
                @yield('content')
            </div>
            <!-- /End replace -->
        </main>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    @include('layouts.footer')
</body>

</html>
