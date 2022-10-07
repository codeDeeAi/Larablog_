@props(['id', 'route', 'method' => 'GET', 'filters' => []])
<form id="{{ $id }}" class="flex gap-2 relative" method="{{ $method }}" action="{{ $route }}">
    @csrf
    @if (request()->has('search') || request()->has('filter'))
        <a href="{{ $route }}" class="my-auto text-xs underline">clear</a>
    @endif
    <input id="search" type="search" name="search" value="{{ request()->search ?? '' }}"
        class="block w-full px-4 py-2 my-auto text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
    <button type="button" onclick="togglePanel('{{ $id . '_filter_panel' }}', '{{ $id . '_filter_panel_name' }}')"
        class="px-5 py-2.5 text-sm font-medium text-white btn-primary rounded-md shadow my-auto">Filters</button>
    <button type="submit"
        class="px-5 py-2.5 text-sm font-medium text-white btn-primary rounded-md shadow my-auto">Search</button>
    <details id={{ $id . '_filter_panel' }} open
        class="overflow-hidden border border-gray-200 bg-gray-200 hidden rounded absolute w-48 right-0">
        <summary class="flex items-center justify-between px-5 py-3 bg-gray-100 lg:hidden">
            <span class="text-sm font-medium"> Filters </span>

            <button type="button"
                onclick="togglePanel('{{ $id . '_filter_panel' }}', '{{ $id . '_filter_panel_name' }}')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </summary>

        <form action="" class="border-t border-gray-200 lg:border-t-0">
            <fieldset>
                <div class="px-5 py-6 space-y-2">
                    @foreach ($filters as $label => $value)
                        <div class="flex items-center">
                            <input type="checkbox" name="filter[{{ $value }}]"
                                @if (isset(request()->filter) && array_key_exists($value, request()->filter)) checked @endif
                                class="w-5 h-5 border-gray-300 rounded" />

                            <label class="ml-3 text-sm font-medium capitalize"> {{ $label }} </label>
                        </div>
                    @endforeach
                </div>
            </fieldset>

            <div class="flex justify-between p-2 border-t border-gray-200">
                <a href="{{ $route }}" class="px-3 py-2 text-xs font-medium text-gray-600 underline rounded">
                    Reset All
                </a>

                <button type="submit" class="px-3 py-2 text-xs font-medium text-white bg-teal-600 rounded">
                    Apply Filters
                </button>
            </div>
        </form>
    </details>

</form>
