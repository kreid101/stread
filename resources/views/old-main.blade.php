<x-header>

</x-header>

<div class="w-full px-10 flex items-center justify-center">
    <div>
       <div class="text-5xl leading-normal font-bold px-20"> <span class="text-cyan-500">Обувь</span>  от мировых брендов по выгодным ценам.</div>
        <div>Мы предлагаем широкий выбор обуви от мировых брендов - как оригинальные модели, так и высококачественные реплики.</div>
    </div>
    <x-elipse-animation></x-elipse-animation>
</div>
<div class="relative px-10 flex">
    <svg class="ml-[30%]" width="187" height="220" viewBox="0 0 187 194" fill="none" xmlns="http://www.w3.org/2000/svg">

        <path id="line" stroke-dasharray="10,5" stroke="#000" stroke-width="5" d="M0.999993 0.500003C10.5 53 56.1422 74.7452 62 76.5C67.8578 78.2548 95.5 89.5 114 89.5C114 89.5 132 90 141 87C150 84 167.807 76.5 183.227 51.7597C185.257 48.5023 186.033 45.4339 185.889 42.5852C185.745 39.7292 184.672 36.9761 182.812 34.3705C179.065 29.1206 168.628 24.7472 160.441 21.557C152.284 18.3784 142.975 16.585 134.5 16.6434C125.98 16.7021 117.476 22.4794 117.476 22.4794C117.476 22.4794 111.648 29.397 110.888 33.5015C110.121 37.6474 110.637 42.3457 112.16 47.6462C114.943 57.3295 120.62 68.513 127.5 81.4288C142.509 109.903 163.287 152.328 157.484 193.36 " stroke="black"/>

        <path  stroke-width="5" d="m145,190  L 158 204 L 170 190  " stroke="black"/>
    </svg>
</div>

<div x-data>
    <div class="mx-4">
        <div>Новые поступления</div>
        <button x-on:click="$refs.newItems.scrollLeft-=document.body.clientWidth"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
            </svg>
        </button>
        <button x-on:click="$refs.newItems.scrollLeft+=document.body.clientWidth"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
            </svg>
        </button>
    </div>

    <div x-ref="newItems" class="grid grid-flow-col auto-cols-[20%]  gap-4 overflow-x-hidden px-4 scroll-smooth mb-8">
        @foreach($hits as $hit)
        <x-item-card :item="$hit"></x-item-card>
        @endforeach
    </div>
</div>

<div class="grid grid-flow-col gap-12 auto-cols-min bg-teal-100 justify-center py-2">
    <div class="flex items-center">
        <div class="bg-cyan-500 rounded p-2 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
            </svg>
        </div>
        <h3 class="text-black text-lg p-2 leading-5">Доставка из Европы</h3>
    </div>
    <div class="flex items-center">
        <div class="bg-cyan-500 rounded p-2 flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
            </svg>
        </div>
        <h3 class="text-black text-lg p-2 leading-6">Поддержка 24/7</h3>
    </div>
    <div  class="flex items-center">
        <div class="bg-cyan-500 rounded p-2 flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
            </svg>
        </div>
        <h3 class="text-black text-lg p-2 leading-6">Безопасные платежи</h3>
    </div>
</div>
<script>
</script>



