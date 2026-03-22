<x-app-layout>
    <div class="py-5">
        <div class="flex flex-row gap-2 mb-2">
            <a href='{{ route('properties.create') }}'
                class='w-fit px-2 py-3 active:scale-95 transition text-sm text-white rounded-lg bg-slate-700'>Add
                Property</a>
        </div>
        <livewire:owner-properties :properties="$properties" />

    </div>
</x-app-layout>
