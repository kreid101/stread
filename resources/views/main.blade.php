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

<div x-data="scrolling"  x-init="() => {
  window.addEventListener('resize', () => {
    let item_count=document.getElementById('newItems').children.length
    scrollpos = Math.ceil(item_count/relat());
  });}">
    <div>Новые поступления</div>
    <button x-on:click="scrl()">left</button>
    <button x-on:click="scrr()">right</button>
    <div>
        <span x-text="startpos"></span> <span>/</span> <span x-text="scrollpos"></span>
    </div>
    <button x-on:click="info()">info</button>
    <div id="newItems" class="flex gap-4 overflow-scroll scroll-smooth	 ">
        <div class="min-w-[20%] bg-gray-200">one</div>
        <div class="min-w-[20%]  bg-gray-200">two</div>
        <div class="min-w-[20%] bg-gray-200">three</div>
        <div class="min-w-[20%] bg-gray-200">four</div>
        <div class="min-w-[20%] bg-gray-200">five</div>
        <div class="min-w-[20%] bg-gray-200">six</div>
        <div class="min-w-[20%] bg-gray-200">seven</div>
        <div class="min-w-[20%] bg-gray-200">eigth</div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        let item_count=document.getElementById('newItems').children.length
        Alpine.data('scrolling', () => ({

            scrollpos:Math.ceil(item_count/relat()),
            startpos:1,
            scrr:function (){
                let elem=document.getElementById('newItems')
                elem.scrollLeft+=screen.width
                this.startpos >= this.scrollpos ? this.startpos=this.scrollpos : this.startpos++
            },
            scrl:function (){
                let elem=document.getElementById('newItems')
                elem.scrollLeft-=screen.width
                this.startpos <= 1 ? this.startpos=1: this.startpos--
            }

        }))
    })
    function relat(){
        let w=document.getElementById('newItems').children.length
      if(screen.width <=1024 )
      {
          return 2
      }
      if(screen.width <=1280)
      {
          return 3
      }
      if(screen.width <= 1500)
      {
            return  4;
      }
      if(screen.width <= 2560)
      {
          return 5;
      }
    }
</script>



