@props(['route', 'id', 'method' => 'GET', 'fields' => []])
<form action="{{ $route }}" method="{{ $method }}" id="{{ $id }}" class="hidden">
    @csrf
    @foreach ($fields as $item)
        @if (isset($item['name']) && isset($item['value']))
            <input type="hidden" name="{{ $item['name'] }}" value="{{ $item['value'] }}">
        @endif
    @endforeach
</form>
