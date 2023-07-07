<div x-data>
    <h2 class="text-xl">Фильтр</h2>
    <h3>Цена</h3>
    <div class="relative flex items-center bg-slate-400 w-40 h-1 rounded ">

        <div class="h-1 bg-green-400 absolute" :style="'width:'+ ($store.filter.maxX - $store.filter.minX)  + '%;'+ 'left:'+  ($store.filter.minX +1)+ '%;' + 'right:'+  ($store.filter.maxX - 100) + '%;'"></div>
        <div class=" absolute triangle bg-slate-200 -top-5 w-2 h-2 rotate-45 transition-opacity	" :style="'left:'+ ($store.filter.minX+1) + '%;'+ 'opacity:'+$store.filter.min_btn_opacity "></div>
        <div class="absolute bg-slate-200 w-min h-min -top-12 transition-opacity	p-1" :style="'left:'+ $store.filter.minX + '%;' + 'opacity:'+ $store.filter.min_btn_opacity" ><span x-text="$store.filter.current_min"></span></div>
        <div class=" absolute triangle bg-slate-200 -top-5 w-2 h-2 rotate-45 transition-opacity	" :style="'left:'+ ($store.filter.maxX+1) + '%;'+ 'opacity:'+$store.filter.max_btn_opacity "></div>
        <div class="absolute bg-slate-200 w-min h-min -top-12 transition-opacity	p-1" :style="'left:'+ $store.filter.maxX + '%;' + 'opacity:'+ $store.filter.max_btn_opacity" ><span x-text="$store.filter.current_max"></span></div>
        <div @mousedown="dragStart('min')" class="absolute w-4 h-4 bg-slate-200 rounded-xl cursor-pointer " :style="'left:'+ $store.filter.minX + '%'">
        </div>
        <div @mousedown="dragStart('max')" class="absolute w-4 h-4 bg-slate-200 rounded-xl cursor-pointer" :style="'left:'+ $store.filter.maxX + '%'">
        </div>
    </div>

    <div class="flex w-40 place-content-between "><span x-text="$store.filter.current_min"></span> <span x-text="$store.filter.current_max"></span></div>

    <div>
        <h2>Пол</h2>
        <div>
            <input wire:model="genders" wire:change="convert('gender')" type="checkbox" value="1">
            <label for="">Мужское</label>
        </div>
        <div>
            <input wire:model="genders" wire:change="convert('gender')"  value="2" type="checkbox">
            <label for="">Женское</label>
        </div>
       <div>
           <input  wire:model="genders"  wire:change="convert('gender')"  type="checkbox" value="3" type="checkbox">
           <label for="">Унисекс</label>
       </div>

    </div>
    <div>
    <div>
        @if(!$this->type=='brand')
        @foreach($this->allBrands as $brand)
            <input type="checkbox" value="{{$brand['brand_name']}}"  wire:model="brands"  wire:change="addBrand">
        @endforeach
            @endif
    </div>
        <div>
            <h2>Категории</h2>
            @foreach($this->categories as $key=>$value)
                <input type="checkbox" value="{{$value}}"  wire:change="convert('cat_query')" wire:model='cat_querys' >
                <label for="">{{$value}}</label>
            @endforeach
        </div>
        <div>
            <h2>Размеры</h2>
            @foreach($this->sizes as $key=>$value)
                <input type="checkbox" value="{{$value}}"  wire:change="convert('size_query')" wire:model='size_querys' >
                <label for="">{{$value}}</label>
            @endforeach
        </div>
    </div>

    <script>
        let downPos;
        let cur_btn;
        function dragStart(btn)
        {
            window.addEventListener('mousemove',moving);
            window.addEventListener('mouseup',stopDraging);
            cur_btn=btn;
            downPos=event.layerX
            Alpine.store('filter')[cur_btn+'_btn_opacity']=1
        }
        function moving()
        {
            if(cur_btn == 'max')
            {
                Alpine.store('filter').maxX = ((event.x - downPos) / 160) * 100 > 100 ? 100 : ((event.x - downPos) / 160) * 100 <= (Alpine.store('filter').minX + 10) ? (Alpine.store('filter').minX + 10) : ((event.x - downPos) / 160) * 100;
                Alpine.store('filter').current_max=calculatePercentageValue(Alpine.store('filter').maxX)
            }
            else if (cur_btn == 'min')
            {
                Alpine.store('filter').minX= ((event.x-downPos)/160)*100 < 0 ? 0 : ((event.x-downPos)/160)*100 >= (Alpine.store('filter').maxX - 10) ? (Alpine.store('filter').maxX-10) : ((event.x-downPos)/160)*100
                Alpine.store('filter').current_min=calculatePercentageValue(Alpine.store('filter').minX)
            }
        }
        function stopDraging()
        {
            window.removeEventListener('mousemove',moving);
            window.removeEventListener('mouseup',stopDraging);
            Alpine.store('filter')[cur_btn+'_btn_opacity']=0
            cur_btn == 'min' ? Livewire.emit('setCurrentMin',  Alpine.store('filter').current_min) :  Livewire.emit('setCurrentMax',  Alpine.store('filter').current_max)
        }
        function calculatePercentageValue(percent) {
            var max = Alpine.store('filter').maxPrice;
            var min = Alpine.store('filter').minPrice;
            var perc = percent/100;
            var value = ((max-min)*perc)+min;
            return Math.round(value/100)*100;
        }
        document.addEventListener('alpine:init',()=>{
            Alpine.store('filter').minPrice={{$this->min_price}}
            Alpine.store('filter').maxPrice={{$this->max_price}}
            Alpine.store('filter').current_min={{$this->cur_min}}
            Alpine.store('filter').current_max={{$this->cur_max}}
            Alpine.store('filter').minX=(({{$this->cur_min}}-{{$this->min_price}})/{{$this->max_price}})*100
            Alpine.store('filter').maxX=({{$this->cur_max}}/{{$this->max_price}})*100
        })

    </script>

</div>


