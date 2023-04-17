import Alpine from "alpinejs";
window.Alpine = Alpine

Alpine.store('headerDropdown', {
    brands: false,
    mens: false,
    womans: false,
    showmenu(el) {
       console.log('asdf')

    }
})

Alpine.start()
