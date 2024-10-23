@props(['active'=>false, 'groups'=>[]])

@php
$path = \Str::before(Request::path(),'#');
$path = (\Str::startsWith($path,'/') ? '' : '/').$path;
$activelink = $active ? 'true': in_array($path, $groups) ;
$default = 'text-left md:hover:text-blue-700';
$classes = $default.($activelink ? ' text-blue-700' :'');
@endphp
<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>