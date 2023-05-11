<?php

namespace App\Http\Livewire;

use App\Models\Items;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Redis;
use Livewire\Component;

class Cart extends Component
{

    protected $listeners = ['item_added' => 'add'];
    public $items=[];
    public $item_count = null;


    public function mount()
    {
        unserialize(Redis::get('cart_'.session()->getId())) ? $this->items=unserialize(Redis::get('cart_'.session()->getId())) : null;
        $this->item_count=count($this->items);

    }
    public function render()
    {
        return view('livewire.cart');
    }

    public function add($item)
    {
        $exist=$this->exist($item);
        if($exist !==false){
            $this->incr($exist);
        }
        else {
            $product = Items::find($item['pivot']['items_id'])->toArray();
            unset($product['sizes']);
            $product['size']= $item['size'];
            $product['quant']= 1;
            $this->items[] = $product;
            $this->updRedis();
            $this->emitTo('ItemInfo','asd',$this->items);
        }
    }
    protected function updRedis()
    {
        $exp=60*10000;
        Redis::setex('cart_' . session()->getId(),$exp, serialize($this->items));
        $this->item_count = count($this->items);
        $this->emit('upd_cart',$this->items);
    }
    protected function exist($size)
    {
      return array_search(true,array_map(function ($items) use ($size){
            return $items['size']==$size['size'] && $items['id']==$size['pivot']['items_id'] ;
        },$this->items));
    }
    function incr($id)
    {
     $this->items[$id]['quant']+=1;
     $this->updRedis();
    }

}
