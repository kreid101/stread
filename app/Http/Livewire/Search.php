<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Items;

class Search extends Component
{
    public $search_input;

    public function results()
    {
        if($this->search_input != '')
        {
            return Items::search($this->search_input)->get();

        }
    }
    public function render()
    {
        return view('livewire.search');
    }
}
