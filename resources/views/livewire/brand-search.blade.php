<div class="grid grid-cols-2">
   <x-filter/>
    <div class="grid grid-cols-4 gap-4">
        @foreach($this->result() as $res)
            <x-item-card :item="$res"/>
        @endforeach
    </div>

</div>
