<x-header>
</x-header>
<div class="card-body flex flex-col bg-white py-2 lg:hidden">
    <h3 class="card-title flex justify-center text-xl">{{$item->brand->brand_name}}</h3>
    <p class="flex justify-center text-black/50">{{$item->item_name}}</p>
</div>
<div class="flex flex-col lg:flex-row ">
    <x-image-viewer :images="$item->images"></x-image-viewer>

    <div class="mt-8 bg-white w-[320px]">
        <div class="card-body  flex-col py-2 hidden lg:flex">
            <h3 class="card-title flex justify-center text-xl">{{$item->brand->brand_name}}</h3>
            <p class="flex justify-center text-black/50">{{$item->item_name}}</p>
        </div>
        <livewire:item-info :item="$item" :cart="$cart"/>
    </div>
</div>

