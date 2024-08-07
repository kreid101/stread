<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ItemInfo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public ?object $item=null,public $cart=null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.item-info');
    }
}
