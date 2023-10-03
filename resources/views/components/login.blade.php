<div x-data="login" class="absolute bg-white w-[450px] h-[500px] overflow-hidden right-0 " >
    <div class="flex flex-col" x-show="$store.user.user">
        <div class="flex">
                <div>Дрбро пожаловать,</div>
                <div x-text="$store.user.user ? $store.user.user.name : ''"></div>
                <span>!</span>
        </div>
        <button class="border-2">Личный кабинет</button>
        <button class="border-2" @click="logout">logout</button>
    </div>
    <div x-show="!$store.user.user">
    <div class="flex justify-self-center mx-auto justify-center mt-4" >
        <button :class="cur_page == 'login' ? 'bg-gray-200' : ''" class="border-2 rounded p-2 " @click="$refs.log.scroll({left: 0,behavior: 'smooth',});cur_page='login'">Вход</button>
        <button :class="cur_page == 'register' ? 'bg-gray-200' : ''" class="border-2 rounded p-2" @click="$refs.log.scroll({left: $refs.log.clientWidth,behavior: 'smooth',});cur_page='register'">Регистрация</button>
    </div>
    <div class="absolute overflow-auto no-scrollbar scrollbar-hide w-full" x-ref="log">
        <div class="grid grid-flow-col auto-cols-[100%]">
            <div class="mt-4 ">
                <form class="flex flex-col gap-4 items-center"  @submit.prevent="log">
                    <input type="email" required class="border-2  w-2/3 rounded h-10 p-2" type="text" placeholder="Логин" x-model="log_email">
                    <input type="password" required class="border-2  w-2/3 rounded h-10 p-2" type="text" placeholder="Пароль" x-model="log_pass">
                    <button class="text-white bg-black rounded py-2 px-6 hover:bg-white hover:text-black hover:border-2 border-black">Войти</button>
                </form>
            </div>
            <div>
                <form class="flex flex-col" @submit.prevent="reg">
                    <input type="text" placeholder="name" x-model="reg_name">
                    <input type="text" placeholder="email" x-model="reg_email">
                    <input type="password" placeholder="password" x-model="reg_password">
                    <input type="password" placeholder="password confirmation" x-model="reg_password_confirmation">
                    <button>submit</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script>
        window.addEventListener('alpine:init',()=>{
            Alpine.data('login',()=>({
                cur_page:'login',
                reg_name:'',
                reg_email:'',
                reg_password:'',
                reg_password_confirmation:'',
                log_email:'',
                log_pass:'',
                reg(){
                    axios.post('/register',{'name':this.reg_name,'email':this.reg_email,'password':this.reg_password,'password_confirmation':this.reg_password_confirmation}).then((res)=>{
                        console.log(res)
                    })
                },
                log(){
                    axios.post('/login',{'email':this.log_email,'password':this.log_pass}).then((res)=>{
                        this.$store.user.user=res.data.user;
                    })
                },
                logout(){
                    axios.post('/logout').then((res)=>{
                        this.$store.user={}
                    })
                }
            }))
        })

    </script>
</div>
