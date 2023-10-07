<div @click="window.location.href = 'item/{{$item->id}}'"  class="card bg-base-100 shadow-xl cursor-pointer p-2">
    <figure><img src="storage/{{$item->images[0]->path ?? null}}" alt="Shoes" /></figure>
    <div class="card-body flex flex-col">
        <h3 class="card-title flex justify-center text-xl">{{$item->brand->brand_name}}</h3>
        <p class="flex justify-center text-black/50">{{$item->item_name}}</p>
        <h2 class="text-2xl justify-center flex mt-4">{{number_format($item->price,0,' ',' ')}} &#x20bd</h2>
    </div>
</div>

