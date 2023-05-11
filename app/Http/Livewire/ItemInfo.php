<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ItemInfo extends Component
{
    public $item;
    public $current;
    public $cart;

    public function choose($i)
    {
        $this->current=$i;
    }

    public function add()
    {
        $this->emitTo('cart','item_added', $this->current);
    }
    public function render()
    {
        return view('livewire.item-info');
    }
}
