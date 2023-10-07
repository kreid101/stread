<?php

namespace App\View\Components;

use App\Models\Items;
use Illuminate\View\Component;

class NewItems extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $items;
    public function __construct()
    {
        $this->items=Items::all()->take(20);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.new-items');
    }
}
