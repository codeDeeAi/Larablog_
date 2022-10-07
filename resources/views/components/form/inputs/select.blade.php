@props(['name', 'id', 'placeholder' => 'leroy@jenkins.com', 'label' => '', 'traits' => [], 'value' => '', 'options' => [], 'isBool' => false])
@if ($label)
    <label for="{{ $name }}" class="block text-sm">{{ $label }}</label>
@endif
<div class="@if ($errors->has($name)) border rounded-md border-red-500 @endif">
    <select @foreach ($traits as $key => $value) {!! $key . '=' . $value !!} @endforeach type="text"
        id="{{ $id }}"
        @if (isset($traits['multiple'])) name="{{ $name . '[]' }}"
        @else
        name="{{ $name }}" @endif
        class="{{ isset($traits['class']) ? $traits['class'] : 'w-full px-3 py-2 border rounded-md dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:dark:border-violet-400' }}">
        @if ($isBool)
            @foreach ($options as $key => $value)
                <option
                    @if ($value) value="{{ 1 }}"
                @else
                    value="{{ 0 }}" @endif>
                    {{ $key }}</option>
            @endforeach
        @else
            @foreach ($options as $key => $value)
                <option
                    @if (isset($traits['multiple']) && is_array(old($name))) @if (in_array($value, old($name)))
                        selected @endif
                @else @if (old($name) == $value) selected @endif @endif
                    value="{{ $value }}">{{ $key }}</option>
            @endforeach
        @endif
    </select>
</div>
@if ($errors->has($name))
    <span class="text-sm text-red-500"> {{ $errors->first($name) }}</span>
@endif
