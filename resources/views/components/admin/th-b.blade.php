<th 
	{{ $attributes->merge([
		'class'=>"px-2 py-1 bg-gray-50 whitespace-nowrap dark:text-blue-100 border-b border-r last:border-r-0 border-gray-500 text-center"
	]) }}
	colspan="{{ $attribute->colspan ?? 1 }}"
	>
	{{ $slot }}
</th>