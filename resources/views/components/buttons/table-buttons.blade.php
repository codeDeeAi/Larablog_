@props(['traits' => []])
<div class="flex gap-2 py-3">
    @foreach ($traits as $key => $trait)
        <a class="{{ (isset($trait['class'])) ? $trait['class'] : 'px-5 py-2.5 text-sm font-medium text-white btn-primary rounded-md shadow'}}" 
        href="{{ $trait['route'] ?? 'javascript:void(0)' }}">
            {{ $trait['name'] ?? 'Create' }}
        </a>
    @endforeach
</div>
