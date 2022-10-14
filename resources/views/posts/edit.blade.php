@extends('layouts.app')
@section('content')
    <div class="container mx-auto w-1/2">
        <div class="border-solid border-2  rounded-lg border-gray-300 bg-white">
            <div class="p-1">
                <h2 class="py-3 border-b border-gray-200  leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Edit Post</h2>
                <form method="POST" class="p-4" action="{{ route('posts.update', $post->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block">
                            <span class="text-gray-700">Title</span>
                            <input type="text" name="title"
                                class="block w-full border-solid border-2 border-indigo-600 p-1 mt-1 rounded-md placeholder:text-gray-300"
                                placeholder="Title" value="{{ $post->title }}" />
                        </label>
                        @error('title')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block">
                            <span class="text-gray-700">Body</span>
                            <textarea type="text" name="body" id="body"
                                class="block w-full border-solid border-2 border-indigo-600 p-1 mt-1 rounded-md placeholder:text-gray-300"
                                placeholder="Body" value={!! $post->body !!}></textarea>
                        </label>
                        @error('body')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block">
                            <span class="text-gray-700">Catgory</span>
                            <select id="cate_id" name="cate_id"
                                class="block w-full border-solid border-2 border-indigo-600 p-1 mt-1 rounded-md">
                                <option value="">---Select---</option>
                                @foreach ($category as $item)
                                    <option class="capitalize" value="{{ $item->id }}">{{ $item->genre }}</option>
                                @endforeach
                            </select>
                            @error('cate_id')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </label>
                    </div>
                    <input class="hidden" name="status" id='status' value={{ $post->status }} />
                    <input class="hidden" name="user_id" id='user_id' value={{ $post->user_id }} />
                    <button type="submit" class="text-white bg-blue-600  rounded text-sm px-4 py-2 m-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#body').summernote({
                height: 300,
                onMediaDelete: function($target, editor, $editable) {
                    alert($target.context.dataset.filename);
                    $target.remove();
                }
            });
        });
    </script>
@endsection
