<div class="cursor-pointer hover:bg-gray-200 p-2 overflow-hidden " @click.outside="cart_modal=false"  >
    <div x-on:click="cart_modal=!cart_modal" class="relative">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0" stroke="currentColor" class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
    </svg>
    </a>
    <div x-show="$wire.item_count" class="-bottom-2 -right-2 text-white absolute text-center w-6 h-6  bg-gray-500 rounded-xl z-10">
        {{$item_count}}
    </div>
    </div>
    <div @click.self="cart_modal=false"  class="absolute w-screen h-screen top-0 bg-black/70 transition-all z-10" :class="cart_modal ? 'right-0' : 'right-[-100vw]'">
        <div class="bg-white w-5/6 h-full ml-auto">
            <div class="flex p-4">
                <svg @click="cart_modal=false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>

                <h4 class="text-lg mx-auto">Корзина</h4>
            </div>

        </div>
    </div>
</div>
