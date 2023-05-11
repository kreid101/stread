import Alpine from "alpinejs";

window.Alpine = Alpine

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

Alpine.start()
