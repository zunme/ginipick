@props(['active'=>false])

@php
$path = \Str::before(Request::path(),'#');
$path = (\Str::startsWith($path,'/') ? '' : '/').$path;
$target= isset($attributes['href']) ? $attributes['href'] : null;
$activelink = $active ? 'true':$path == $target ;
$default = 'block py-3 px-3  hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent border-b md:border-0 border-black';
$classes = $default.($activelink ? ' text-blue-700' :'');
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>