<div class="flex w-2/3 gap-4 " >

    <div class="flex flex-col flex-1 lg:flex-row" x-data="image">
        <div class="flex flex justify-start gap-1 lg:flex-col mr-4">
            <template x-for="(image,ix) in images">
                <div @click="index=ix" >
                    <img :class="image.path == cur_link ? '' : 'brightness-50'" class="h-24" :src="'/storage/'+image.path" alt="">
                </div>
            </template>
        </div>
        <div class="flex flex-1">
            <img class="w-full max-w-4xl " :src="'../storage/'+cur_link" alt="error">
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

