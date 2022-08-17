@props(['name', 'id', 'placeholder' => 'leroy@jenkins.com', 'label' => '', 'attributes' => []])
@if ($label)
    <label for="{{ $name }}" class="block text-sm">{{ $label }}</label>
@endif
<input type="email" name="email" id="email" placeholder="leroy@jenkins.com" value="{{ old($name) }}"
    class="{{ isset($attributes['class']) ? $attributes['class'] : 'w-full px-3 py-2 border rounded-md dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:dark:border-violet-400' }}">
@if ($errors->has($name))
    <span class="text-sm text-red-500"> {{ $errors->first($name) }}</span>
@endif
