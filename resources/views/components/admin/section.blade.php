<section 
    {{ $attributes->merge(['class' => 'fi-section rounded-xl bg-white shadow-sm p-4 ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10']) }}
    >
    {{$slot}}
</section>