@props(['traits' => []])

<div>
    <div class="inline-flex rounded-md shadow-sm" role="group">
        <button type="button"
            class="inline-flex items-center p-2 text-sm font-medium bg-transparent disabled:bg-gray-100 disabled:hover:text-gray-900 rounded-l-lg border hover:bg-teal-600 hover:text-white"
            @if (isset($traits['show']) && is_array($traits['show'])) 
                @foreach ($traits['show'] as $key => $value)
                    {!! $key.'='.$value !!}
                @endforeach
            @endif>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <span class="sr-only">View</span>
        </button>
        <button type="button"
            class="inline-flex items-center p-2 text-sm font-medium bg-transparent disabled:bg-gray-100 disabled:hover:text-gray-900 border-t border-b hover:bg-sky-600 hover:text-white"
            @if (isset($traits['edit']) && is_array($traits['edit'])) 
                @foreach ($traits['edit'] as $key => $value)
                    {!! $key.'='.$value !!}
                @endforeach
            @endif>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
            <span class="sr-only">Edit</span>
        </button>
        <button type="button"
            class="inline-flex items-center p-2 text-sm font-medium bg-transparent disabled:bg-gray-100 disabled:hover:text-gray-900 rounded-r-md border hover:bg-red-600 hover:text-white"
            @if (isset($traits['delete']) && is_array($traits['delete'])) 
                @foreach ($traits['delete'] as $key => $value)
                    {!! $key.'='.$value !!}
                @endforeach
            @endif>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            <span class="sr-only">Delete</span>
        </button>
    </div>
</div>
