<div class="flex-1" x-data="size_choose">
    @foreach($item->sizes as $size)

        <button :class="$el.id == size.id ? 'bg-red-200' : ''" :id="$id('size-btn')" x-on:click="choose({{$size}})" x-ref="size_btn">{{$size->size}} </button>
    @endforeach
    <div >
        <button x-on:click="addCart">add to cart</button>
    </div>

        <template x-for="i in $store.cart.cart_items">
        <div x-text="i.size"></div>
        </template>
</div>

<script>
window.addEventListener('alpine:init',()=>{
    Alpine.data('size_choose',()=>({
        size: {},
        arr:function (){
            console.log('changed')
        },
        in_cart:false,
        changer:function (){
            this.in_cart=true
        },
        init(){
            this.cart=Alpine.store('cart').upd(@js($cart));
            this.$watch('$store.cart.cart_items',this.arr)
        },

        choose:function (size){
            this.size.id=this.$event.target.id
            this.size.item=size
        },
        addCart:function (){
            Livewire.emit('item_added',JSON.stringify(this.size))

        }

    }))
})
    Livewire.on('asd',(i)=>{
        Alpine.store('cart').upd(i)
    })

</script>
