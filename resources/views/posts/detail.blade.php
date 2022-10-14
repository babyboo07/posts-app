@extends('layouts.user')
@section('content')
    @foreach ($post as $item)
        <div class="container max-w-7xl mx-auto" >
            <div class="px-5 pt-40">
                <div class="">
                    <p class="text-xl uppercase">{{ $item->genre }}</p>
                    <p class="text-3xl">{{ $item->title }}</p>
                </div>
                <div class="flex p-2">
                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/profile/' . $item->user_img) }}">
                    <p class="p-1">
                        {{ $item->name }} <span>{{ $item->created_at }}</span>
                    </p>
                </div>
                <div class="text-lg p-4 px-12 text-justify">
                    {!! $item->body !!}
                </div>
                <div class="border-t border-gray-300 w-full -mx-2 mt-2"></div>
                <!-- comment form -->
                @if (Auth::check())
                    <div class="flex border rounded items-center justify-center shadow-lg mt-5 mb-4 max-w-2xl ">
                        <form class="w-full max-w-2xl bg-white rounded-lg px-4 pt-2" method="POST"
                            action="{{ route('comment.store') }}">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <h2 class="px-2 pt-3 pb-2 text-gray-800 text-lg"><i
                                        class="fa-regular fa-comment pr-1"></i>Comment
                                </h2>
                                <div class="w-full md:w-full px-3 mb-2 mt-2">

                                    <textarea
                                        class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-normal placeholder-gray-700 focus:outline-none focus:bg-white"
                                        name="comments" placeholder='What do you think about this issue? ' required></textarea>
                                </div>
                                <div class="w-full md:w-full flex items-start  px-3">
                                    <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                                        <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <p class="text-xs md:text-sm pt-px">Some HTML is okay.</p>
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="posts_id" value="{{ $item->id }}">
                                    </div>
                                    <div class="-mr-1">
                                        <input type='submit'
                                            class="bg-white text-gray-700 font-normal py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                                            value='Post Comment'>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
                @include('comment.detail')
            </div>
    @endforeach
@endsection
