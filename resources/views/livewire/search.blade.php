<div>
    <input class="border-2 border-black" wire:model="search_input">
    @foreach($this->double() as $item)
    {{$item->item_name}}
    @endforeach
</div>
