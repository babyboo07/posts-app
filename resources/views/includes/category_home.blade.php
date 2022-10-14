<div class="mt-3 h-14 -mx-3  overflow-y-auto whitespace-no-wrap scroll-hidden bg-sky-800">
    <a href="/">
        <button class="text-lg px-3 py-4  rounded-lg capitalize leading-5 text-white mx-3 md:my-0"
            value=""><i class="fa-solid fa-house-chimney"></i></button>
    </a>
    @foreach ($category as $item)
        @if ($active == $item->id)
            <a href="{{ route('home.search', $item->id) }}">
                <button class="text-lg px-3 py-5 font-bold bg-blue-500 rounded-lg capitalize leading-5 text-white mx-3 md:my-0"
                    value="{{ $item->id }}">{{ $item->genre }}</button>
            </a>
        @else
            <a href="{{ route('home.search', $item->id) }}">
                <button class="text-lg capitalize text-white leading-5 hover:underline mx-3 md:my-0"
                    value="{{ $item->id }}">{{ $item->genre }}</button>
            </a>
        @endif
    @endforeach
</div>
