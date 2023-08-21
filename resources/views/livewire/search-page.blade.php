<div class="grid grid-cols-2">
<x-filter></x-filter>
    <div>
        @foreach($this->filter() as $item)
          <x-item-card :item="$item"></x-item-card>
        @endforeach
    </div>

</div>
