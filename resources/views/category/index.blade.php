@extends('layouts.app')

@section('header')
    <header class="bg-white shadow">
        <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold leading-tight text-gray-900">Home</h1>
        </div>
    </header>
@endsection

@section('content')
    <div class="mx-auto w-full">
        <div>
            <h2 class="text-2xl font-medium">Tables category</h2>
            <div class="mt-4">
                <div class="pb-2">
                    <a href="{{ url('/category/create') }}">
                        <button type="button"
                            class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">Add
                            Category</button>
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
                                            genre
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($category as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                {{ $item->id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                {{ $item->genre }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                                <a href='{{ route('category.update', $item->id) }}'
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
                                                                <form action="{{ route('category.destroy', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button"
                                                                        class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2"
                                                                        onclick="toggleModal()"><i class="fas fa-times"></i>
                                                                        Cancel</button>
                                                                        <button type="submit"
                                                                        class="py-2 px-4 bg-red-500 text-white rounded hover:bg-red-700 mr-2"><i
                                                                            class="fa-solid fa-trash"></i> Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {!! $category->links() !!} --}}
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
