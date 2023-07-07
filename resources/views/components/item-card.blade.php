<div class="grid grid-rows-[1fr_min-content] group relative  ">
    <div class=" h-64 justify-center flex">
        <img  class="h-full" src="{{asset('storage/'. ($item['images'][0]['path'] ?? null) )}}" alt="not found">
    </div>
    <div class="justify-center flex flex-col group-hover:bg-slate-200 py-2 h-full">
        <h1 class="justify-center flex text-xl">{{$item['brand']['brand_name']}}</h1>
        <h3  class="justify-center flex text-slate-600">{{$item['item_name']}}</h3>
        <h4 class="justify-center flex font-medium text-md" >{{$item['price']}} &#x20bd</h4>
    </div>
    <a href="/item/{{$item['id']}}" class="absolute h-full w-full cursor-pointer"></a>
</div>

