@props(['name', 'id', 'placeholder' => '*****', 'attributes' => []])
<div class="relative @if ($errors->has($name)) border border-red-500 rounded-lg @endif">
    <input type="password" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}"
        @foreach ($attributes as $key => $value) {{-- $key="{{ $value }}" --}} @endforeach
        class="{{ isset($attributes['class']) ? $attributes['class'] : 'w-full px-3 py-2 border rounded-md dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:dark:border-violet-400' }}">
    <button type="button" id="password_button" onclick="togglePasswordVisibility('{{ $id }}')"
        class="absolute inset-y-0 inline-flex items-center right-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
    </button>
</div>

@if ($errors->has($name))
<span class="text-sm text-red-500"> {{ $errors->first($name) }}</span>
@endif
