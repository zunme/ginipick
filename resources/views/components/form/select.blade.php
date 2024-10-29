@props([
    'options'=>[],
    'option_value'=>'value',
    'option_label'=>'label',
])
<select 
    {{ $attributes->except(['class','options']) }}
    {{ $attributes->merge(['class' => 'daisy-select daisy-select-bordered w-full border-gray-400 focus:outline-0 focus:border-blue-400']) }}
    >
    {{$slot}}
    @foreach( $options as $opt)
        <option class="py-2" value="{{$opt[$option_value]}}">{{$opt[$option_label]}}</option>
    @endforeach
  </select>