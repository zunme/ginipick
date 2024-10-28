@props(['bodyclass' => '', 'headclass'=>''])
<div {{ $attributes->merge([
	'class'=>"relative overflow-x-auto shadow text-sm text-gray-800 dark:text-gray-400 border border-gray-300"
	]) }}>
    <table class="w-full text-left rtl:text-right">
		@if(isset($colgroup))
		<colgroup>
			{{ $colgroup }}
		</colgroup>
		@endif
		@if(isset($thead))
        <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 {{$headclass}}">
			{{ $thead }}
        </thead>
		@endif
        <tbody class="{{$bodyclass}}">
			 {{ $tbody }}
        </tbody>
    </table>
</div>
