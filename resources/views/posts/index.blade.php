@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        <div>
            <h2 class="text-2xl font-medium">Tables Posts</h2>
            <div class="mt-4">
                <div class="pb-2">
                    <a href="{{ url('/posts/create') }}">
                        <button type="button"
                            class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">Add
                            Posts</button>
                    </a>
                </div>
                @if (session('status'))
                    <div role="alert" class="p-1">
                        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                            Success
                        </div>
                        <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
                            <p>{{ session('status') }}</p>
                        </div>
                    </div>
                @endif
                <div class="flex flex-col">
                    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                        <div
                            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                            <table class="min-w-full">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                            style="text-align: start">
                                            id
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                            style="text-align: start">
                                            title
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                            style="text-align: start">
                                            status
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                            style="text-align: start">
                                            Author
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                            style="text-align: start">
                                            Date Submitted
                                        </th>
                                        <th class="px-6 py-3 w-64 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                            style="text-align: start">
                                            Posts image
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                    </tr>
                                </thead>
                                @foreach ($post as $item)
                                    <tbody class="bg-white">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                {{ $item->id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                {{ $item->title }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                {{ $item->status }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                {{ $item->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                {{ $item->created_at }}
                                            </td>
                                            <td class="whitespace-no-wrap border-b border-gray-200">
                                                <img class="w-30 h-auto rounded-lg" src="{{ $item->img }}"
                                                    alt="">
                                            </td>
                                            @if (Auth::user()->id == $item->user_id)
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                                    <a href='{{ route('posts.update', $item->id) }}'
                                                        class="text-yellow-600 hover:text-yellow-900">
                                                        <i class="fa-solid fa-pen"></i>
                                                        <span class="mx-1 ">Edit</span></a>
                                                    <button type="button"
                                                        class="p-2 bg-white text-red-600 hover:text-red-900 hover:border-gray-500"
                                                        onclick="toggleModal()">
                                                        <i class="fa-solid fa-trash"></i>
                                                        Delete</button>
                                                    {{-- Modal Delete --}}
                                                    <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden"
                                                        id="modal">
                                                        <div
                                                            class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                            <div class="fixed inset-0 transition-opacity">
                                                                <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                                                            </div>
                                                            <span
                                                                class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                                                            <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                                                                role="dialog" aria-modal="true"
                                                                aria-labelledby="modal-headline">
                                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                    <label>Do you want delete {{$item->id}} ?</label>
                                                                </div>
                                                                <div class="bg-gray-200 px-4 py-3 text-right">
                                                                    <form action="{{ route('posts.destroy', $item->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="button"
                                                                            class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2"
                                                                            onclick="toggleModal()"><i
                                                                                class="fas fa-times"></i>
                                                                            Cancel</button>
                                                                        <button type="submit"
                                                                            class="py-2 px-4 bg-red-500 text-white rounded hover:bg-red-700 mr-2"><i
                                                                                class="fa-solid fa-trash"></i>
                                                                            Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            @else
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                                    <a href='#'
                                                        class="text-yellow-300 hover:text-yellow-300"disabled>
                                                        <i class="fa-solid fa-pen"></i>
                                                        <span class="mx-1 ">Edit</span></a>
                                                    <button type="button"
                                                        class="p-2 bg-white text-red-300 hover:text-red-300 hover:border-gray-500"
                                                        disabled >
                                                        <i class="fa-solid fa-trash"></i>
                                                        Delete</button>
                                                </td>
                                            @endif

                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                            {{-- {{ !! {!! $post->links() !!} !!}} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- hiển thị modal --}}
        <script type="text/javascript">
            function toggleModal() {
                document.getElementById('modal').classList.toggle('hidden')
            }
        </script>
    @endsection
