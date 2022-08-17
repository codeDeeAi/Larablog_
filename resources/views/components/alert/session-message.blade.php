<!-- Success -->
@if (session()->has('success'))
    <div class="flex items-center gap-4 my-3 p-4 text-white bg-gray-900 rounded" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                clip-rule="evenodd" />
        </svg>

        <strong class="text-sm font-normal"> {{ session()->get('success') }} </strong>
    </div>
@endif

<!-- Warning -->
@if (session()->has('warning'))
    <div class="flex items-center gap-4 my-3 p-4 text-white bg-gray-900 rounded" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-500" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>

        <strong class="text-sm font-normal"> {{ session()->get('warning') }} </strong>
    </div>
@endif

<!-- Alert -->
@if (session()->has('error'))
    <div class="flex items-center gap-4 my-3 p-4 text-white bg-gray-900 rounded" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
        </svg>

        <strong class="text-sm font-normal"> {{ session()->get('error') }} </strong>
    </div>
@endif

<!-- Info -->
@if (session()->has('info'))
    <div class="flex items-center gap-4 my-3 p-4 text-white bg-gray-900 rounded" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-sky-500" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>

        <strong class="text-sm font-normal"> {{ session()->get('info') }} </strong>
    </div>
@endif
