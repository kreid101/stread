<?php

namespace App\Http\Livewire;

use App\Models\Items;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;

class BrandSearch extends Component
{
    public $type='brand';
    public $items;
    public $price;
    public $gender;
    public $genders=[];
    public $min_price=0;
    public $max_price=0;
    public $cur_min=0;
    public $cur_max=0;
    public $result=[];
    public $categories;
    public $sizes;
    public $cat_query;
    public $cat_querys=[];
    public $size_query;
    public $size_querys=[];

    protected $queryString=[
        'price' => ['except'=>''],
        'gender'=>['except'=>''],
        'cat_query'=> ['except'=>'']
    ];
    protected $listeners = ['setCurrentMin','setCurrentMax'];

    public function convert($var)
    {
       $this->{$var}=implode(',',$this->{$var.'s'});

    }
    public function setCurrentMin($num)
    {
        $this->cur_min=$num;
        $this->price=$num.'-'.$this->cur_max;
    }
    public function setCurrentMax($num)
    {
        $this->cur_max=$num;
        $this->price=$this->cur_min.'-'.$num;
    }
    public function mount($brand)
    {
        $this->items=Items::join('brands','items.brand_id','brands.id')->select('items.*','brands.brand_name')->where('brand_name','=',$brand)->get()->toArray();
        $this->max_price=collect($this->items)->max('price');
        $this->min_price=collect($this->items)->min('price');
        $this->cur_min=empty(explode('-',$this->price)[0]) ===true ?  $this->min_price : explode('-',$this->price)[0] ;
        $this->cur_max= explode('-',$this->price)[1] ?? $this->max_price;
        $cat = collect($this->items)->map(function ( $item, int $key) {
            return $item['category'];
        });
        $sizes = collect($this->items)->map(function ( $item, int $key) {
            return $item['sizes'];
        });
        $this->categories=collect(array_merge(...$cat->all()))->unique('cat_name')->pluck('cat_name')->all();
        $this->sizes=collect(array_merge(...$sizes->all()))->unique('size')->pluck('size')->all();
    }
    public function result()
    {
        return collect($this->items)->when($this->price,function (Collection $collection){
            return $collection->whereBetween('price',[$this->cur_min,$this->cur_max]);
        })->when($this->gender,function (Collection $collection){
            return $collection->whereIn('gender',$this->genders);
        })->when($this->cat_query,function (Collection $collection){
            return $collection->filter(function ($item){
                return collect($item['category'])->whereIn('cat_name', $this->cat_querys)->isNotEmpty();
            });
        })->when($this->size_query,function (Collection $collection){
            return $collection->filter(function ($item){
                return collect($item['sizes'])->whereIn('size', $this->size_querys)->isNotEmpty();
            });
        });
    }
    public function render()
    {
        return view('livewire.brand-search')->layout('components.header');
    }
}
