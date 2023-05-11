<x-header>
</x-header>
{{$item->item_name}}
<div class="flex">
    <x-image-viewer :images="$item->images"></x-image-viewer>

    <div>
        <livewire:item-info :item="$item" :cart="$cart"/>
    </div>
</div>

