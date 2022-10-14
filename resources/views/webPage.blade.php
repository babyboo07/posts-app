@extends('layouts.user')
@section('content')
    <div class="conatiner mx-auto p-28">
        <div class="flex container mx-auto">
            <div class="flex max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
                <div class="flex flex-col md:flex-row md:max-w-4xl rounded-lg bg-white ">
                    @foreach ($top as $item)
                        <img class=" w-full h-96 md:h-auto object-cover md:w-1/2 rounded-t-lg md:rounded-none md:rounded-l-lg"
                            src="{{ $item->img }}" alt="" />
                        <div class="p-6 flex flex-col justify-start">
                            <a class="text-blue-700 text-xl font-medium mb-2">{{ $item->genre }}</a>
                            <a href="{{ url('/posts/detail', $item->id) }}">
                                <p
                                    class="text-gray-700 truncate font-bold text-base mb-4 hover:text-gray-900 hover:underline">
                                    {{ $item->title }}
                                </p>
                            </a>
                            <p class="text-gray-600 text-xs">{{ $item->created_at }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="flex justify-center mx-auto p-5 sm:p-10 md:p-16">
                <ul class="bg-white rounded-lg w-96 text-gray-900">
                    @foreach ($topList as $item)
                        <li class="px-6 py-2 border-b border-gray-200 w-full rounded-t-lg flex">
                            <img class=" bg-cover h-11 w-14" src="{{ $item->img }}" alt="">
                            <a class=" pl-2 font-normal truncate hover:text-gray-900 hover:font-bold hover:underline"
                                href="{{ url('/posts/detail', $item->id) }}">
                                {{ $item->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="pb-2 p-5 sm:p-10 md:p-16 container mx-auto">
            <div class="border-t border-gray-300 w-full -mx-2 mt-2"></div>
            {{-- Category world --}}
            <div class="p-3">
                <span class="uppercase font-bold">WORLD</span>
            </div>
            <div class="flex">
                @foreach ($topWorld as $item)
                    <div class="pt-1 pl-3">
                        <div
                            class="max-w-sm h-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <a href="{{ url('/posts/detail', $item->id) }}">
                                <img class="rounded-t-lg h-48 w-full bg-cover" src="{{ $item->img }}" alt="topworld">
                            </a>
                            <div class="p-5">
                                <div class="">
                                    <a href="{{ url('/posts/detail', $item->id) }}">
                                        <h5
                                            class="mb-2 text-lg overflow-ellipsis tracking-tight hover:underline text-gray-900 dark:text-white">
                                            {{ $item->title }}</h5>
                                    </a>
                                </div>
                                <div class="">
                                    <a href="{{ url('/posts/detail', $item->id) }}"
                                        class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Read more
                                        <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="border-t border-gray-300 w-full -mx-2 mt-2"></div>
            {{-- Category health --}}
            <div>
                <div class="p-3">
                    <span class="uppercase font-bold">HEALTH</span>
                </div>
                <div class="flex">
                    @foreach ($topHealth as $item)
                        <div class="pt-1 pl-3">
                            <div
                                class="max-w-sm h-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                <a href="{{ url('/posts/detail', $item->id) }}">
                                    <img class="rounded-t-lg h-48 w-full bg-cover" src="{{ $item->img }}"
                                        alt="topworld">
                                </a>
                                <div class="p-5">
                                    <div class="">
                                        <a href="{{ url('/posts/detail', $item->id) }}">
                                            <h5
                                                class="mb-2 text-lg overflow-ellipsis hover:underline tracking-tight text-gray-900 dark:text-white">
                                                {{ $item->title }}</h5>
                                        </a>
                                    </div>
                                    <div class="">
                                        <a href="{{ url('/posts/detail', $item->id) }}"
                                            class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Read more
                                            <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="border-t border-gray-300 w-full -mx-2 mt-2"></div>
            @include('component.post')
        </div>
    @endsection
