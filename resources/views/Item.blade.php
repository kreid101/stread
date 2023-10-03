<x-header>
</x-header>
<div class="card-body flex flex-col bg-white py-2 lg:hidden">
    <h3 class="card-title flex justify-center text-xl">{{$item->brand->brand_name}}</h3>
    <p class="flex justify-center text-black/50">{{$item->item_name}}</p>
</div>
<div class="flex flex-col lg:flex-row mt-8 mx-10 gap-4">
    <x-image-viewer :images="$item->images"></x-image-viewer>
    <div class="bg-white flex flex-col flex-1 p-8 max-w-xl h-min ">
        <livewire:item-info :item="$item" :cart="$cart"/>
    </div>
</div>

<div x-data="{active_tab:'item-menu-desc'}">
<div  class="flex text-xl gap-4 ">
    <div :class="active_tab==$el.id ? 'border-b-4 border-black' : ''" id="item-menu-desc" @click="active_tab=$el.id" class="cursor-pointer">Описание</div>
    <div :class="active_tab==$el.id ? 'border-b-4 border-black' : ''" id="item-menu-stable" @click="active_tab=$el.id"  class="cursor-pointer">Таблица размеров</div>
    <div :class="active_tab==$el.id ? 'border-b-4 border-black' : ''" id="item-menu-ship" @click="active_tab=$el.id" class="cursor-pointer" >Доставка и Оплата</div>
    <div :class="active_tab==$el.id ? 'border-b-4 border-black' : ''" id="item-menu-rev" @click="active_tab=$el.id" class="cursor-pointer">Отзывы</div>
    <div :class="active_tab==$el.id ? 'border-b-4 border-black' : ''" id="item-menu-ret" @click="active_tab=$el.id" class="cursor-pointer">Возврат</div>
</div>
    <div>
        <x-item-menu.description :desc="$item->about->about_desc"></x-item-menu.description>
        <x-item-menu.sizes ></x-item-menu.sizes>
        <x-item-menu.shipment ></x-item-menu.shipment>
        <x-item-menu.return></x-item-menu.return>
        <x-item-menu.reviews></x-item-menu.reviews>
    </div>
</div>
