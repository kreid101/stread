    <div>
<div @click.outside="cart_modal=false" x-show="cart_modal"  class="hidden lg:flex absolute w-[450px] h-[500px] shadow-xl overflow-y-auto right-0 bg-white p-4 flex-col items-center">
            <div class="text-xl">Корзина</div>
            <div>{{$item_count}} Товар(а)</div>
            <div class="flex flex-col flex-1 overflow-auto">
                @foreach($this->items as $key=>$item)
                    <div class="p-2 flex items-center gap-2">
                        <div class="self-start w-16 h-16"><img src="/storage/{{$item['images'][0]['path']}}" alt=""></div>
                        <div class="flex flex-1 flex-col ">
                            <div class="flex justify-start text-xl"> {{$item['brand']['brand_name']}}</div>
                            <div class="flex justify-center">   {{$item['item_name']}}</div>
                            <div class="flex justify-center gap-4">
                                <div class="flex justify-center text-lg bg-black text-white w-8 h-8">{{$item['size']}}</div>
                                <div class="flex items-center gap-2">
                                    <button wire:click="decr({{$key}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                   <span class="text-xl"> {{$item['quant']}} </span>
                                    <button wire:click="incr({{$key}})"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg></button>
                                </div>

                            </div>
                        </div>

                        <div class="text-2xl">{{$item['price'] * $item['quant']}} ₽</div>
                    </div>
                @endforeach
        </div>
            <div >
                <a class="bg-black text-white text-xl bold py-2 px-4">Оформить заказ</a>
            </div>
    </div>
    <div  class="absolute w-screen h-screen top-0 bg-black/70 transition-all z-10 lg:hidden" :class="cart_modal ? 'right-0' : 'right-[-100vw]'">
        <div class="bg-white w-5/6 h-full ml-auto">
            <div class="flex p-4">
                <svg @click="cart_modal=false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <h4 class="text-lg mx-auto">Корзина</h4>
            </div>
                @foreach($this->items as $key=>$item)
                    <div class="p-2 flex items-center gap-2">
                        <div class="w-14 h-14"><img src="/storage/{{$item['images'][0]['path']}}" alt=""></div>
                        <div class="flex flex-1 flex-col ">
                            <div class="flex justify-center"> {{$item['brand']['brand_name']}}</div>
                            <div class="flex justify-center">   {{$item['item_name']}}</div>
                            <div class="flex justify-center">
                                <button wire:click="decr({{$key}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                                {{$item['quant']}}
                                <button wire:click="incr({{$key}})"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg></button>
                            </div>
                        </div>
                        <div class="flex justify-center text-lg bg-blue-100 w-8 h-8">{{$item['size']}}</div>
                        <div>{{$item['price'] * $item['quant']}}</div>
                    </div>
                @endforeach
            <div class="absolute bottom-4 justify-center ">Оформить</div>
        </div>
    </div>
    </div>
