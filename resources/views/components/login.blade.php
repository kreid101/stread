<div class="absolute bg-white right-0 w-80 h-72">

    <form action="">
        <input type="text" placeholder="login">
        <input type="text" placeholder="password">
        <button>submit</button>
    </form>

    <script>
        window.addEventListener('alpine:init()',()=>{
            Alpine.data('login',({
                login(){
                    axios.post()
                }
            }))
        })
    </script>
</div>
