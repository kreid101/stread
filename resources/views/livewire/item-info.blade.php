<div x-data="size_choose">
    @foreach($item->sizes as $size)
        <button :class="$el.id == active_btn ? 'bg-red-200' : ''" :id="$id('size_btn')"  x-on:click="makeActive({{$size}},$el.id)">{{$size->size}}</button>
    @endforeach
    <div>
        <button :disabled="curr_size == null || CheckInCart"  class="bg-green-300 p-2 rounded disabled:opacity-75" x-on:click="sendToServer" x-text="CheckInCart()  ? 'Добавленно' : 'В корзину'"></button>
    </div>

        <script>
            window.addEventListener('alpine:init',()=>{

                Alpine.data('size_choose',()=>({
                    curr_size: null,
                    active_btn:null,
                    makeActive:function (item,id)
                    {
                        this.curr_size=item
                        this.CheckInCart()
                        this.active_btn=id
                    },
                    sendToServer:function ()
                    {
                        Livewire.emitTo('cart','item_added',this.curr_size)
                    },
                    CheckInCart: function ()
                    {
                        if(this.curr_size != null && Alpine.store('cart').cart_items!= null)
                        {
                            return  Alpine.store('cart').cart_items.map((item)=>{ return this.curr_size.size == item.size && this.curr_size.pivot.items_id == item.id }).includes(true)
                        }
                        else
                        {
                            return false
                        }
                    },

            }))
                Alpine.store('cart').cart_items=@js($cart);
            })
            Livewire.on('upd_cart',items=>{
                Alpine.store('cart').cart_items=items
            })
        </script>
</div>



