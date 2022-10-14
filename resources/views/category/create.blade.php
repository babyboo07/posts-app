@extends('layouts.app')

@section('content')
    <div class="container mx-auto w-1/2">
        <div class="border-solid border-2  rounded-lg border-gray-300 bg-white">
            <div class="p-1">
                <h2 class="py-3 border-b border-gray-200  leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Create Category</h2>
                <form method="POST" action="{{route('category.store')}}">
                    @csrf
                    <div class="mb-6">
                        <label class="block">
                            <span class="text-gray-700">Genre</span>
                            <input type="text" name="genre"
                                class="block w-full border-solid border-2 border-indigo-600 p-1 mt-1 rounded-md placeholder:text-gray-300"
                                placeholder="Genre" value="{{ old('genre') }}" />
                        </label>
                        @error('genre')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="text-white bg-blue-600  rounded text-sm px-4 py-2 m-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
