<x-admin.layout>
    <section class="flex flex-col gap-y-4 py-4 text-sm text-gray-900 px-4 md:px-2">
    @if (isset($header))
        <header class="fi-header flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="fi-header-heading text-xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-2xl">
                    {{$header}}
                </h1>
            </div>
        </header>
    @endif
        {{$slot}}
    </section>
</x-admin.layout>