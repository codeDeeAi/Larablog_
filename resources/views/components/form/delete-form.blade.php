@props(['route', 'id', 'method' => 'DELETE', 'fields' => []])
<form action="{{ $route }}" method="POST" id="{{ $id }}" class="hidden">
    <input type="hidden" name="_method" value="{{ $method }}">
    @csrf
    @foreach ($fields as $item)
        @if (isset($item['name']) && isset($item['value']))
            <input type="hidden" name="{{ $item['name'] }}" value="{{ $item['value'] }}">
        @endif
    @endforeach
</form>
