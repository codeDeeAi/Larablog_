<div id="admin_layout_sidebar" class="flex flex-col justify-between h-screen bg-white border-r hidden">
    <div class="px-4 py-6">
        <span class="flex w-32 h-10 bg-gray-200 rounded-lg text-xl font-bold"><span class="m-auto">Larablog</span></span>

        <nav class="flex flex-col mt-6 space-y-1">
            {{-- Dashboard --}}
            <a href="{{ route('dashboard.admin') }}" class="flex items-center px-4 py-2 rounded-lg
            {{ (get_menu_active_state(['dashboard.admin'])) ? 'bg-gray-100 text-gray-700 hover:bg-gray-100' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' }}
            ">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

                <span class="ml-3 text-sm font-medium"> Dashboard </span>
            </a>
            {{-- Dashboard Ends --}}

            <details class="group">
                <summary
                    class="flex items-center px-4 py-2 text-gray-500 rounded-lg cursor-pointer hover:bg-gray-100 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>

                    <span class="ml-3 text-sm font-medium"> Blogs </span>

                    <span class="ml-auto transition duration-300 shrink-0 group-open:-rotate-180">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </summary>

                <nav class="mt-1.5 ml-8 flex flex-col">
                    <a href=""
                        class="flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>

                        <span class="ml-3 text-sm font-medium"> Banned Users </span>
                    </a>

                    <a href=""
                        class="flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>

                        <span class="ml-3 text-sm font-medium"> Calendar </span>
                    </a>
                </nav>
            </details>

            {{-- Categories --}}
            <a href="{{ route('category.index') }}"
                class="flex items-center px-4 py-2 rounded-lg 
                {{ (get_menu_active_state(['category.index', 'category.create', 'category.edit'])) ? 'bg-gray-100 text-gray-700 hover:bg-gray-100' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' }}
                ">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>

                <span class="ml-3 text-sm font-medium"> Categories </span>
            </a>
            {{-- Categories End --}}

            {{-- Tags --}}
            <a href="{{ route('tag.index') }}"
                class="flex items-center px-4 py-2 rounded-lg  
                    {{ (get_menu_active_state(['tag.index', 'tag.create', 'tag.edit'])) ? 'bg-gray-100 text-gray-700 hover:bg-gray-100' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' }}
                ">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>

                <span class="ml-3 text-sm font-medium"> Tags </span>
            </a>
            {{-- Tags Ends --}}

            {{-- Users --}}
            <a href="{{ route('users.index') }}"
                class="flex items-center px-4 py-2 rounded-lg  
                    {{ (get_menu_active_state(['users.index', 'user.admin.create'])) ? 'bg-gray-100 text-gray-700 hover:bg-gray-100' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' }}
                ">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                  </svg>

                <span class="ml-3 text-sm font-medium"> Users </span>
            </a>
            {{-- Users Ends --}}

            <details class="group">
                <summary
                    class="flex items-center px-4 py-2 text-gray-500 rounded-lg cursor-pointer hover:bg-gray-100 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>

                    <span class="ml-3 text-sm font-medium"> Account </span>

                    <span class="ml-auto transition duration-300 shrink-0 group-open:-rotate-180">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </summary>

                <nav class="mt-1.5 ml-8 flex flex-col">
                    <a href=""
                        class="flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                        </svg>

                        <span class="ml-3 text-sm font-medium"> Details </span>
                    </a>

                    <a href=""
                        class="flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>

                        <span class="ml-3 text-sm font-medium"> Security </span>
                    </a>

                    <form action="/logout">
                        <button type="submit"
                            class="flex items-center w-full px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>

                            <span class="ml-3 text-sm font-medium"> Logout </span>
                        </button>
                    </form>
                </nav>
            </details>
        </nav>
    </div>

    {{-- Profile --}}
    <div class="sticky inset-x-0 bottom-0 border-t border-gray-100 overflow-x-auto">
        <a href="javascript:void(0)" class="flex items-center p-4 bg-white hover:bg-gray-50 shrink-0">
            <div class="rounded-full bg-gray-200 h-8 w-8 p-1 uppercase flex justify-center">
                <span class="m-auto font-bold">{{generate_user_initials(auth()->user()->first_name, auth()->user()->last_name)}}</span>
            </div>

            <div class="ml-1.5">
                <p class="text-xs">
                    <strong class="block font-medium ">{{ auth()->user()->first_name.' '.auth()->user()->last_name }}</strong>

                    <span class="truncate"> {{ auth()->user()->email }} </span>
                </p>
            </div>
        </a>
    </div>
    {{-- Profile Ends --}}
</div>
