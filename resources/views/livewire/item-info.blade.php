<div x-data="size_choose">
    <div class="flex justify-center flex-col">
        <h4 class="text-lg mx-auto mb-2">Размеры</h4>
        <div class="justify-center flex border-b mx-4 gap-2">
            @foreach($item->sizes as $size)
                <button class="rounded p-2" :class="$el.id == active_btn ? 'bg-black text-white' : 'bg-zinc-300'" :id="$id('size_btn')"  x-on:click="makeActive({{$size}},$el.id)">{{$size->size}} | {{$size->region}}</button>
            @endforeach
        </div>
    </div>

    <div class="flex justify-center mt-4 flex-col">
        <template x-if="curr_size == null">
            <div class="text-red-600 flex justify-center">Выберите размер</div>
        </template>
        <button :disabled="curr_size == null || CheckInCart"  class="bg-black text-white  rounded w-full py-2  text-2xl" x-on:click="sendToServer" x-text="CheckInCart()  ? 'Добавленно' : 'В корзину'"></button>
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
                        if(this.curr_size != null && Alpine.store('cart').cart_items!= null )
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
                Alpine.store('cart').cart_items=Object.values(items)
                console.log(Object.values(items))

            })
        </script>
</div>



