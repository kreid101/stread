import Alpine from "alpinejs";

window.Alpine = Alpine

Alpine.store('user',{
    user:{}
})
Alpine.store('headerDropdown', {
    brands: false,
    mens: false,
    womans: false,
})
Alpine.store('cart',{
    cart_items:null,
    upd:function (arr){
        this.cart_items=arr
    }
})
Alpine.store('filter',{
    minX:0,
    maxX:100,
    minPrice:0,
    maxPrice:0,
    current_min:0,
    current_max:0,
    min_btn_opacity:0,
    max_btn_opacity:0

})

Alpine.start()
