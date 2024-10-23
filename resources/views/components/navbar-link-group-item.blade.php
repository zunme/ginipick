@php
$target= isset($attributes['href']) ? $attributes['href'] : null;
@endphp
<a {{ $attributes->merge(['class' => 'hover:bg-gray-100 block px-2 rounded']) }}
    :class="[ window.location.pathname + window.location.hash == '{{$target}}' ? 'text-blue-500':'']"
    >
    {{ $slot }}
</a>