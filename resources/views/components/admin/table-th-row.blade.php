<th scope="row" 
	{{ $attributes->merge([
		'class'=>"px-2 py-1 whitespace-nowrap dark:text-blue-100"
	]) }}
	colspan="{{ $attribute->colspan ?? 1 }}"
	>
	{{ $slot }}
</th>