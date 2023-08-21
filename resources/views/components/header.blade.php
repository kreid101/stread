<html>
<head>
    <title>{{ $title ?? 'Stread' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-stone-100">
<div x-data="header" class="h-20 flex relative md:px-10 items-center" >
        <x-app-logo></x-app-logo>
    <!--<div  class="flex items-center ml-8">
        <ul class="flex gap-2 h-full items-center">
            <li class="transition-all" :class="$store.headerDropdown.brands ? 'bg-stone-200' : ''" @mouseover="$store.headerDropdown.brands=true" @mouseleave="$store.headerDropdown.brands=false">
                <a class="w-full h-full flex items-center px-4" href="">Бренды</a>
                <div  class="absolute bg-white w-full left-0 top-20 h-80 z-10 " x-data x-show="$store.headerDropdown.brands" >
                    <x-brands-dropdown-menu></x-brands-dropdown-menu>
                </div>
            </li>
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
        </ul>
    </div>-->
    <div class="flex ml-auto gap-4 items-center">
        <div class="cursor-pointer hover:bg-gray-200" :class="search ? 'bg-gray-200' : ''" >
            <a class="block p-2" x-on:click="search= !search">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </a>
            <div x-show="search" >
                <livewire:search />
            </div>
        </div>
        <div class="cursor-pointer hover:bg-gray-200 p-2" :class="cart_modal ? 'bg-gray-200' : ''" @click="cart_modal=true">
            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                <div x-show="$store.cart.cart_items" class="-bottom-2 -right-2 text-white absolute text-center w-6 h-6  bg-gray-500 rounded-xl z-10" x-text="$store.cart.cart_items ? $store.cart.cart_items.length : ''  ">
                </div>
            </div>
            <div x-show="cart_modal">
                <livewire:cart  x-show="cart_modal" />
            </div>
        </div>
        <div class="cursor-pointer hover:bg-gray-200 p-2 relative">
            <a @click="auth=true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
            </a>
            <div x-show="auth">
                <x-login></x-login>
            </div>

        </div>

    </div>
</div>

{{ $slot }}
@livewireScripts

<script>
    window.addEventListener('alpine:init',()=>{
        Alpine.data('header',()=>({
            search:false,
            cart_modal:false,
            auth: false
        }))

    })

</script>
</body>
</html>
