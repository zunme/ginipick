<tr 
	{{ $attributes->merge([
		'class'=> "odd:bg-white odd:dark:bg-gray-900 even:bg-gray-200 even:dark:bg-gray-800 hover:bg-blue-200 dark:border-gray-700"
	]) }}
	rowspan="{{ $attribute->rowspan ?? 1 }}"
	>
	{{ $slot }}
</tr>