<div class="px-12 py-5" x-data="brands" class="" >
    <template x-for="br in brand">
        <a :href="'/brand/'+ br.brand_name" class="block text-lg w-min" x-text="br.brand_name"></a>
    </template>
</div>


<script>
    window.addEventListener('alpine:init',()=>{
        Alpine.data('brands',()=>({
            brand:axios.get('/get_brands').then((res)=>{
                return res.data
            })
        }))
    })
</script>
