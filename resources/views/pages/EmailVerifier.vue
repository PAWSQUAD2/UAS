<template>
    
    <div class="full-height row p-x-10 pad-t-60px" >
		<div class="container border-radius-5px mar-t-20px pad-b-40px" style="background-color: #0000003b;">
            <div v-if="loading" class="loader"></div> 
            <div v-else-if="!res.status">
                <div class="border-radius-5px mar-t-20px p-2" style="background-color: #00000078;">
                    <p class="color-lightTheme" style="text-align:center; margin:auto auto;">Masukkan Token Anda</p>
                </div>
                <div class="border-radius-5px mar-t-20px" style="background-color: #0000002b;"></div>
                <hr>
                <p class="color-lightTheme">Token Anda: {{ $route.query.token }}</p>
                <input type="text" placeholder="Token" v-model="token">
                <input class="full-width" type="submit" @click="verify(token)" value="Verifikasi" name="verifikasi">
                <hr>
            </div>
            <div v-else-if="res.status=='202'">
                <div class="border-radius-5px mar-t-20px p-2" style="background-color: #26b72b78;">
                    <p class="color-lightTheme" style="text-align:center; margin:auto auto;">Anda telah berhasil mendaftar mohon lakukan aktivasi email atau Anda tidak dapat login.</p>
                </div>
                <div class="border-radius-5px mar-t-20px" style="background-color: #0000002b;"></div>
                <hr>
                <h3 class="color-lightTheme">Selamat : {{ res.email }} !!</h3>
                <p class="color-lightTheme">Anda telah berhasil melakukan aktivasi email, Anda baru bisa login jika Anda telah diterima oleh admin.</p>
                <p class="color-lightTheme">Klik <a href="/member">Disini</a> untuk kembali ke halaman login.</p>
                <hr>
            </div>
            <div v-else-if="res.status=='404'">
                <div class="border-radius-5px mar-t-20px p-2" style="background-color: #ff000078;">
                    <p class="color-lightTheme" style="text-align:center; margin:auto auto;">ERROR--WRONG TOKEN!</p>
                </div>
                <div class="border-radius-5px mar-t-20px" style="background-color: #0000002b;"></div>
                <hr>
                <h3 class="color-lightTheme">WRONG TOKEN!!</h3>
                <p class="color-lightTheme">Token Anda tidak valid atau kadaluarsa.</p>
                <p class="color-lightTheme">Klik <a href="daftar.php">Disini</a> untuk kembali ke halaman daftar.</p>
                <hr>
            </div>
        </div>
    </div>
</template>

<script>
const axios = require('axios');
export default {
    data(){
        return {
            res:{},
            loading:false,
            token : "",
        }
    },
    methods:{
        verify(token){
            axios.put('user/verify/'+ token)
            .then((res)=>{
                this.res = res.data;
                this.loading = false;
            })
            .catch((res)=>{
                this.res = {status:'404'}
                this.loading = false;
            });

        }
    },
    beforeMount(){
        if(this.$route.query.token){
            this.loading=true;
            this.verify(this.$route.query.token);
        }
        
    }
}
</script>


<style scoped>
.full-height{
    margin-bottom: 60px;
}
.loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
    margin: auto auto;
    margin-top: 50px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
