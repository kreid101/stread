<?php

namespace App\Http\Livewire;

use App\Models\Brands;
use App\Models\Items;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Livewire\Component;

class SearchPage extends Component
{
    public $search = '';
    public $query='';
    public $brand= '';
    public $brands=[];
    public $allBrands;
    public $gender='';
    public $genders=[];
    public $result=[];
    public $min_price=0;
    public $max_price=0;
    public $cur_min=0;
    public $cur_max=0;
    public $type;

    protected $listeners = ['setCurrentMin','setCurrentMax'];


    protected $queryString = [

        'search' => ['except' => ''],
        'brand' => ['except' => ''],
        'gender'=>['except'=>''],
        'query'=>['except'=>'']
    ];

    public function setCurrentMin($num)
    {
        $this->cur_min=$num;
    }
    public function setCurrentMax($num)
    {
        $this->cur_max=$num;
    }
    public function convert()
    {
        $this->gender=implode(',',$this->genders);
    }
    public function addBrand()
    {
        $this->brand=implode(',',$this->brands);
    }
    public function mount(Request $request,$brand)
    {

        $this->type=explode('/',$request->getRequestUri())[1];
        $this->filter();
        $this->max_price=$this->cur_max=collect($this->result)->max('price');
        $this->min_price=$this->cur_min=collect($this->result)->min('price');
        $this->allBrands=Brands::all()->toArray();
        $this->brand !=null ? $this->brands[]=$this->brand : null;
    }
    public function filter()
    {
        if($this->query)
        {
            $this->result= $this->result= Items::search($this->query)->get()->toArray();
            return collect($this->result)->whereBetween('price',[$this->cur_min,$this->cur_max])->when($this->gender,function (Collection $collection){
                return $collection->whereIn('gender',$this->genders);
            })->when($this->brand,function (Collection $collection){
                return $collection->whereIn('brand_name',$this->brands);
            });
        }
        else
        {
            $this->result = Items::with(['brand' => function ($query) {
                $query->where('brand_name','=', 'gucci');
            }])
                ->get()
                ->toArray();
            return $this->result;
        }

    }
    public function render()
    {
        return view('livewire.search-page')->layout('components.header');
    }
}
