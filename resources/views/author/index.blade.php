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
            <h2 class="text-2xl font-medium">Tables Author</h2>
            <div class="mt-4">
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
                                            Name
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                            style="text-align: start">
                                            Email
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                            style="text-align: start">
                                            Status
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                            style="text-align: start">
                                            Role
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($user as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        @if ($item->user_img != '')
                                                            <img alt="{{ $item->name }}"
                                                                src="{{ asset('storage/profile/' . $item->user_img) }}"
                                                                class="h-10 w-10 rounded-full" />
                                                        @else
                                                            <img alt="{{ $item->name }}"
                                                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                                class="h-10 w-10 rounded-full" />
                                                        @endif
                                                    </div>
                                                    <div class="mx-2">
                                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                                            {{ $item->name }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                {{ $item->email }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Active
                                                </span>
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 uppercase text-gray-500">
                                                {{ $item->role_name }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
