@props(['name', 'placeholder' => 'Write your blog post here ...', 'label' => '', 'traits' => [], 'value'=>''])
@if ($label)
    <label for="{{ $name }}" class="block text-sm">{{ $label }}</label>
@endif
<div class="@if ($errors->has($name)) border rounded-md border-red-500 @endif">
    <textarea @foreach ($traits as $key => $value) {!! $key . '=' . $value !!} @endforeach
        name="{{ $name }}" id="tinymce_text_box" placeholder="{{ $placeholder }}"
        class="{{ isset($traits['class']) ? $traits['class'] : 'w-full p-2 border rounded-md dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:dark:border-violet-400 placeholder:italic' }}">
        {{ ($value) ? $value: old($name) }}
    </textarea>
</div>
@if ($errors->has($name))
    <span class="text-sm text-red-500"> {{ $errors->first($name) }}</span>
@endif
