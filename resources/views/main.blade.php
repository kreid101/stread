<x-header>

</x-header>

<div x-data class="grid grid-cols-1 lg:grid-cols-4 mx-12 gap-4">
    @foreach($hits as $h)
        <div @click="window.location.href = 'item/{{$h->id}}'"  class="card bg-base-100 shadow-xl cursor-pointer p-2">
            <figure><img src="storage/{{$h->images[0]->path ?? null}}" alt="Shoes" /></figure>
            <div class="card-body flex flex-col">
                <h3 class="card-title flex justify-center text-xl">{{$h->brand->brand_name}}</h3>
                <p class="flex justify-center text-black/50">{{$h->item_name}}</p>
                <h2 class="text-2xl justify-center flex mt-4">{{number_format($h->price,0,' ',' ')}} &#x20bd</h2>
            </div>
        </div>
    @endforeach
</div>
