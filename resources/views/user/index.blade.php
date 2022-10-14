@extends('layouts.app')
@section('content')
    <div class="font-sans leading-tight min-h-screen bg-grey-lighter p-8">
        <div class="mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
            <div class="bg-cover h-44 bg-repeat-x bg-center"
                style="background-image: url('https://images.unsplash.com/photo-1522093537031-3ee69e6b1746?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a634781c01d2dd529412c2d1e2224ec0&auto=format&fit=crop&w=2098&q=80');">
            </div>
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="border-b px-4 pb-4">
                    <div class="text-center sm:text-left sm:flex mb-4">
                        @if ($user->user_img != '')
                            <img alt="{{ $user->name }}" src="{{ asset('storage/profile/' . $user->user_img) }}"
                                class="h-32 w-32 rounded-full border-4 border-white -mt-16 mr-4" />
                        @else
                            <img alt="{{ $user->name }}" src="https://randomuser.me/api/portraits/women/21.jpg"
                                class="h-32 w-32 rounded-full border-4 border-white -mt-16 mr-4" />
                        @endif
                        <div class="py-2">
                            <h3 class="font-semibold text-2xl mb-1 uppercase">{{ $user->name }}</h3>
                            <div class="inline-flex text-grey-dark sm:flex items-center">
                                <i class="fa-regular fa-envelope pr-1"></i>
                                {{ $user->email }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-4 container mx-auto w-1/2">
                    <label class="block p-2 space-x-4 ">
                        <span>Username:</span>
                        <input type="text" type="text" name="name"
                            class="border-solid w-80 border  border-rose-300 focus:outline-none focus:border-sky-500 focus:ring-sky-500 p-1 mt-1 rounded-md placeholder:text-gray-300"
                            placeholder="Username" value="{{ $user->name }}" />
                        @error('name')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </label>
                    <label class="block p-2 space-x-12">
                        <span>Email:</span>
                        <input type="email" type="email" name="email"
                            class="border-solid w-80 border border-rose-300 focus:outline-none focus:border-sky-500 focus:ring-sky-500 p-1 mt-1 rounded-md placeholder:text-gray-300"
                            placeholder="Email" value="{{ $user->email }}" />
                        @error('email')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </label>
                    <label class="block p-2 space-x-14">
                        <span>Role:</span>
                        <select id="role_id" v-model='state' name="role_id" class="select w-80 max-w-xs border-solid border border-rose-300 focus:outline-none focus:border-sky-500 focus:ring-sky-500 p-1 mt-1 rounded-md placeholder:text-gray-300">
                            <option value="3">User</option>
                            <option value="2">Author</option>
                        </select>
                    </label>
                    <label class="block p-2 space-x-10">
                        <span>Avata:</span>
                        <input type="file" class="p-1 mt-1" name="user_img" id="user_img" accept="image/*" />
                        @error('user_img')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </label>
                    <button type="submit"
                        class="text-white float-right bg-blue-600  rounded text-sm px-4 py-2 m-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
