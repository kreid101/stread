<div class="grid grid-cols-4">
@foreach($items as $item)
    <x-item-card :item="$item"></x-item-card>
@endforeach
</div>
