<div class="pt-28">
    @foreach ($post as $item)
        <div class="bg-white">
            <div class="container py-5 mx-auto">
                <div class="mt-6 lg:-mx-6 lg:flex lg:items-center">
                    <img class="object-cover w-1/2 lg:mx-6 lg:w-1/4 rounded-xl h-72 lg:h-52"
                        src="{{ $item->img }}"alt="">

                    <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                        <p class="text-sm text-blue-500 uppercase">{{ $item->genre }}</p>

                        <a href="{{ url('/posts/detail', $item->id) }}"
                            class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline  md:text-3xl">
                            {{ $item->title }}
                        </a>

                        <button type="button"
                            class="text-white mt-2 bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            <a href="{{ url('/posts/detail', $item->id) }}" class="underline">Read
                                more</a></button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
