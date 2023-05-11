<html>
<head>
    <title>{{ $title ?? 'Stread' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-stone-100">
<div class="h-20 flex relative px-10">
<x-app-logo></x-app-logo>
    <div x-data class="flex items-center ml-8">
        <ul class="flex gap-2 h-full items-center">
            <li class="transition-all" :class="$store.headerDropdown.brands ? 'bg-stone-200' : ''" @mouseover="$store.headerDropdown.brands=true" @mouseleave="$store.headerDropdown.brands=false">
                <a class="w-full h-full flex items-center px-4" href="">Бренды</a>
                <div  class="absolute bg-red-200 w-full left-0 top-20 h-20 z-10" x-data x-show="$store.headerDropdown.brands" >
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
    </div>
    <div class="flex ml-auto gap-4 items-center">
        <div>
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </a>

        </div>

        <livewire:cart/>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0" stroke="currentColor" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
        </svg>
    </div>
</div>


<slot/>
@livewireScripts
</body>
</html>
