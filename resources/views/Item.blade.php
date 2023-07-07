<x-header>
</x-header>
<div class="card-body flex flex-col bg-white py-2">
    <h3 class="card-title flex justify-center text-xl">{{$item->brand->brand_name}}</h3>
    <p class="flex justify-center text-black/50">{{$item->item_name}}</p>

</div>
<div class="flex flex-col">
    <x-image-viewer :images="$item->images"></x-image-viewer>

    <div class="mt-8">
        <livewire:item-info :item="$item" :cart="$cart"/>
    </div>
</div>

