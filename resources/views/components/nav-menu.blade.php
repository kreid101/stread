<div  class="flex items-center ml-8">
    <ul class="flex gap-2 h-full items-center">
        <li class="transition-all" :class="$store.headerDropdown.mens ? 'bg-stone-200' : ''" @mouseenter="$store.headerDropdown.mens=true" @mouseleave="$store.headerDropdown.mens=false">
            <a class="w-full h-full flex items-center px-4" href="">Мужское</a>
            <div class="absolute bg-red-200 w-full left-0 top-20 h-20 z-10" x-data x-show="$store.headerDropdown.mens" >
                <x-mens-dropdown-menu></x-mens-dropdown-menu>
            </div>
        </li>
        <li class="transition-all" :class="$store.headerDropdown.womans ? 'bg-stone-200' : ''" @mouseenter="$store.headerDropdown.womans=true" @mouseleave="$store.headerDropdown.womans=false">
            <a href="" class="w-full h-full flex items-center px-4">Женское</a>
            <div class="absolute bg-red-200 w-full left-0 top-20 h-20 z-10" x-data x-show="$store.headerDropdown.womans">
                <x-womans-dropdown-menu></x-womans-dropdown-menu>
            </div>
        </li>
        <li class="transition-all" :class="$store.headerDropdown.brands ? 'bg-stone-200' : ''" @mouseover="$store.headerDropdown.brands=true" @mouseleave="$store.headerDropdown.brands=false">
            <a class="w-full h-full flex items-center px-4" href="">Бренды</a>
            <div  class="absolute bg-white w-full left-0 top-20 h-80 z-10 " x-data x-show="$store.headerDropdown.brands" >
                <x-brands-dropdown-menu></x-brands-dropdown-menu>
            </div>
        </li>
        <li class="transition-all" :class="$store.headerDropdown.brands ? 'bg-stone-200' : ''" @mouseover="$store.headerDropdown.brands=true" @mouseleave="$store.headerDropdown.brands=false">
            <a class="w-full h-full flex items-center px-4" href="">Блог</a>
        </li>
    </ul>
</div>
