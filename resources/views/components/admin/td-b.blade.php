<td 
	{{ $attributes->merge([
		'class'=>"px-2 py-1 whitespace-nowrap dark:text-blue-100  border-b border-r last:border-r-0 border-gray-400"
	]) }}
	colspan="{{ $attribute->colspan ?? 1 }}"
	>
	{{ $slot }}
</td>