<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Items;

class Search extends Component
{
    public $search_input;
    public function double()
    {
        if($this->search_input != null)
        {
            return $orders = Items::search($this->search_input)->get();
        }
        else
        {
            return $orders = Items::All()->random(1);
        }


    }
    public function render()
    {
        return view('livewire.search');
    }
}
