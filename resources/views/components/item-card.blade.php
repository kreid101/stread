<a href="item/{{$item->id}}">
<div class="min-w-[20%] bg-gray-200">
    <h3>{{$item->item_name}}</h3>
    <h1>{{$item->brand->brand_name}}</h1>
    <img  class="h-20" src="{{asset('storage/'. ($item->images->first()->path ?? null) )}}" alt="not found">
    <h4>price: {{$item->price}} &#x20bd</h4>
</div>
</a>
