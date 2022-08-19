@props(['name', 'id', 'placeholder' => 'leroy@jenkins.com', 'label' => '', 'traits' => [], 'value' => ''])
@if ($label)
    <label for="{{ $name }}" class="block text-sm">{{ $label }}</label>
@endif
<div class=" @if ($errors->has($name)) border rounded-md border-red-500 @endif">
<input @foreach ($traits as $key => $value) {!! $key.'='.$value !!} @endforeach type="email" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}" value="{{ ($value) ? $value: old($name) }}"
    class="{{ isset($traits['class']) ? $traits['class'] : 'w-full px-3 py-2 border rounded-md dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:dark:border-violet-400' }}">
</div>
    @if ($errors->has($name))
    <span class="text-sm text-red-500"> {{ $errors->first($name) }}</span>
@endif
