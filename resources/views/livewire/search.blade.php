<div class="bg-white absolute top-20 left-0 h-min w-full z-10 items-center flex flex-col overflow-auto"  @click.outside="search=false">
    <div class="w-4/6 py-4">
        <input class=" w-full bg-gray-100 h-8 px-4" wire:model.debounce.300ms="search_input" placeholder="Поиск">
    </div>
<div class="grid grid-cols-4 gap-2 mx-10" >
    @if($this->results())
    @foreach($this->results() as $r)
            <div >
                <x-item-card :item="$r"></x-item-card>
            </div>
    @endforeach
    @endif
</div>

</div>
