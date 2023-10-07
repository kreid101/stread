<x-header>

</x-header>

<div x-data class="grid grid-cols-1 lg:grid-cols-4 mx-12 gap-4">
    @foreach($hits as $h)
    <x-item-card :item="$h"></x-item-card>
    @endforeach
</div>

<x-brand-list></x-brand-list>
<x-new-items></x-new-items>
