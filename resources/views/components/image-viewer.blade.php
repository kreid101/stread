<div class="flex w-3/5 gap-4">
    <div class=" flex w-full  gap-4" x-data="image">
        <div class="w-20 h-min w-1/12" >
            <template class="grid grid-cols-1 w-20 " x-for="(image,i) in images">
                <img x-transition x-on:click="setImg(i)" :class="image.path == cur_link ? 'border-2 border-black' : ''" class="min-w-full h-20" :src="'../storage/'+ image.path" alt="error">
            </template>
        </div>
        <div class="flex flex-1">
            <button x-on:click="subIndex()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>

            </button>
            <img class="w-full max-w-lg" :src="'../storage/'+cur_link" alt="error">
            <button class="mr-10" x-on:click="addIndex()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>

    </div>


</div>

<script>
    document.addEventListener('alpine:init',()=>{
        Alpine.data('image',()=>({
                images:@json($images),
                index:0,
                show(){
                    console.log(this.images)
                },
            get cur_link(){
                    return this.images[this.index].path
                },
            addIndex(){
                    this.index >= this.images.length-1 ? this.index = 0 : this.index++;

            },
            subIndex(){
                this.index <= 0 ? this.index = this.images.length-1 : this.index--
            },
            setImg(link){
                    this.index=link
            }
        }))
    })
</script>

