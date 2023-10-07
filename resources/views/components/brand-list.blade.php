<div class="px-10 gap-6 flex flex-col" @resize.window="calcAmount()"  x-data="brandList">
   <div class="flex">
       <div class="text-2xl">
           Популярные бренды
       </div>
       <div class="ml-auto">
          <span x-text="curr"></span>/<span x-text="total"></span>
       </div>

   </div>

<div class="grid grid-cols-10 gap-6">
    @foreach($brands as $brand)
        <div class="cursor-pointer">
            <img src="/storage/{{$brand->brand_logo}}" alt="">
        </div>
    @endforeach
</div>
</div>

<script>
    window.addEventListener('alpine:init',()=>{
        Alpine.data('brandList',()=>({
            init(){
               this.calcAmount()
            },
            curr:1,
            total:0,
            brandsAm:@js($brands),
              calcAmount(){
                if(window.outerWidth > 1200)
                {
                    this.total= Math.ceil(this.brandsAm.length/10)
                }
                else
                {
                    this.total= 12;
                }
            }
        }))
    })
</script>
