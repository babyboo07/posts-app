<aside class="w-full md:w-64 bg-gray-800 md:min-h-screen" x-data="{ isOpen: false }">
    <div class="flex items-center justify-between bg-gray-900 p-4 h-16">
        <a href="/" class="flex items-center">
            <svg class="w-6" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M32.6883 0.335913C32.3407 -0.0248702 31.7929 -0.104067 31.3596 0.142322L19.2249 6.96861L20.3117 1.53926C20.4063 1.06188 20.1797 0.582302 19.7529 0.353512C19.3261 0.126923 18.7981 0.199519 18.455 0.544904L2.96986 16.03C2.94127 16.052 2.91487 16.0762 2.89067 16.1026C1.02735 17.9945 0 20.4804 0 23.1005C0 28.5584 4.4416 33 9.89955 33C12.5218 33 15.0077 31.9727 16.8974 30.1115C16.926 30.0829 16.9502 30.0543 16.9766 30.0235L30.1232 16.8792C30.4532 16.5492 30.539 16.0454 30.3366 15.6252C30.1364 15.205 29.6876 14.9674 29.2235 15.0092L24.4409 15.5394L32.8379 1.67125C33.0975 1.24227 33.0381 0.694497 32.6883 0.335913ZM9.89955 29.7002C6.25431 29.7002 3.29985 26.7457 3.29985 23.1005C3.29985 19.4552 6.25431 16.5008 9.89955 16.5008C13.5448 16.5008 16.4992 19.4552 16.4992 23.1005C16.4992 26.7457 13.5448 29.7002 9.89955 29.7002Z"
                    fill="#667EEA" />
            </svg>

            <span class="text-gray-300 text-xl font-semibold mx-2">
                Post management</span>
        </a>
        <div class="flex md:hidden">
            <button type="button" onclick="isOpen = !isOpen"
                class="text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-500">
                <svg class="fill-current w-8" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
    <div class="px-2 py-6 md:block" :class="isOpen ? 'block' : 'hidden'">
        @if (Auth::user()->role_id == '1' || Auth::user()->role_id == '2')
            <ul>
                <li class="px-2 py-3 bg-gray-900 rounded">
                    <a href="/home" class="flex items-center">
                        <i class="fa-sharp fa-solid fa-house text-gray-300"></i>
                        <span class="mx-2 text-gray-300">Dashboard</span>
                    </a>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                    <a href="/posts" class="flex items-center">
                        <i class="fa-solid fa-blog text-gray-300"></i>
                        <span class="mx-2 text-gray-300">Posts</span>
                    </a>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                    <a href="/author" class="flex items-center">
                        <i class="fa-solid fa-user-secret text-gray-300"></i>
                        <span class="mx-2 text-gray-300">Author</span>
                    </a>
                </li>
                @if (Auth::user()->role_id == '1')
                    <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                        <a href="#" class="flex items-center">
                            <i class="fa-solid fa-clipboard-list text-gray-300"></i>
                            <span class="mx-2 text-gray-300">Censorship</span>
                        </a>
                    </li>
                    <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                        <a href="/category" class="flex items-center">
                            <i class="fa-solid fa-tags text-gray-300"></i>
                            <span class="mx-2 text-gray-300">Category</span>
                        </a>
                    </li>
                    <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                        <a href="/comment" class="flex items-center">
                            <i class="fa-regular fa-comment text-gray-300"></i>
                            <span class="mx-2 text-gray-300">Commnet</span>
                        </a>
                    </li>
                @endif
            </ul>
        @endif
        <div class="border-t border-gray-700 -mx-2 mt-2"></div>
        <ul class="mt-6 ">
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <i class="fa-solid fa-user text-gray-300"></i>
                <a href="{{ url('/users', Auth::user()->id) }}" class="mx-2 text-gray-300">Account Settings</a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <button class="text-gray-300"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-arrow-right-from-bracket text-gray-300"></i>
                    Logout
                </button>
            </li>
        </ul>
    </div>
</aside>
