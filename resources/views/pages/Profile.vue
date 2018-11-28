<template>
    <div class="container-fluid no-v-pad" >

        <div class="row p-x-10 pad-t-60px">
            <div class="container profile-container mar-t-20px">
                <div class="absolute-ppbg" style="overflow:hidden;">
                    <img class="sampul" src="images/sampul.jpg" alt="pp">
                </div>
                <div class="row">
                    <div class="col-xl-12 no-padding">
                        <div class="col-xl-12 no-padding">
                            <div class="profile-header-container p-x-5 pad-t-60px">
                                <div class="row pad-b-40px">
                                    <div class="col-md-auto photo-profile mb-5" >
                                        <img v-bind:src="user.photoUrl?user.photoUrl:'images/pp.png'" alt="pp" id="my-pp">
                                    </div>
                                    <div class="col profile-data" >
                                        <form @submit.prevent="save">    
                                            <div v-if="!edit">
                                                <div class="speech-icon">Hello</div>
                                                <div class="row  mar-t-20px">
                                                    <label class="col-md-auto color-darkTheme h1 weight-300">I am <span class="bold-600">{{ user.name }}</span></label>
                                                    <input class="fa fa-wrench" type="submit" value="Edit" style="margin-left: 200px" @click="edit=true" v-if="user.id === $auth.user().id">
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-auto color-darkTheme weight-300">As : {{ user.role }}</label><br>
                                                </div>
                                                <hr style="height:2px;border:none;background-color:rgb(82, 82, 82);">
                                                <div class="row">
                                                    <label class="col-md-auto color-darkTheme ">E-MAIL</label> <label class="col-md-auto color-secondTheme weight-300">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;: {{ user.email }}</label>
                                                </div><br>
                                                
                                                <div class="row" >
                                                    <label class="col-md-auto color-darkTheme ">PROGRAM STUDI  </label><label class="col-md-auto color-secondTheme weight-300">: {{ user.prody }}</label>
                                                </div><br>
                                            
                                                <div class="row" >
                                                    <label class="col-md-auto color-darkTheme ">NPM </label><label class="col-md-auto color-secondTheme weight-300">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;: {{ user.npm }}</label>
                                                </div><br>
                                        
                                                <div class="row" >
                                                    <label class="col-md-auto color-darkTheme ">TELEPON </label><label class="col-md-auto color-secondTheme weight-300">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;: {{ user.phone }}</label>
                                                </div><br>
                                        
                                                <div class="row" >
                                                    <label class="col-md-auto color-darkTheme ">TEMPAT LAHIR</label><label class="col-md-auto color-secondTheme weight-300">&ensp;&ensp;: {{ user.bornPlace }}</label>
                                                </div><br>
                                        
                                                <div class="row" >
                                                    <label class="col-md-auto color-darkTheme ">TANGGAL LAHIR</label><label class="col-md-auto color-secondTheme weight-300">&ensp;: {{ user.birthDay.substring(0,10) }}</label>
                                                </div><br>
                                            </div>
                                            <div v-else>
                                                <div class="row  mar-t-20px">
                                                    <label class="col-md-auto color-darkTheme h1 weight-300 no-block" style="width:200px;">I am </label>
                                                    <input type="text" name="name" class="col-md-auto bold-600 color-darkTheme no-block" v-on:keyup="inputValidation('name', 'name', 'name_er')" v-model="user.name" style="width:300px; margin:auto 15px; font-weight:600" required  id="name" maxlength="30">
                                                    <span class="col-md-auto validity" style="margin:auto 0;"></span>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-auto color-darkTheme weight-300">As : {{ user.role }}</label><br>
                                                </div>
                                                <hr style="height:2px;border:none;background-color:rgb(82, 82, 82);">
                                                <div class="row">
                                                    <label class="col-md-auto color-darkTheme " style="width:200px;">E-MAIL</label><input type="text" class="col-md-auto bold-600 color-darkTheme no-block" v-model="user.email" style="width:300px; margin:auto 15px; font-weight:600" readonly>
                                                </div><br>
                                                
                                                <div class="row" >
                                                    <label class="col-md-auto color-darkTheme " style="width:200px;">PROGRAM STUDI  </label><input type="text" class="col-md-auto bold-600 color-darkTheme no-block" v-model="user.prody" style="width:300px; margin:auto 15px; font-weight:600" readonly>
                                                </div><br>
                                            
                                                <div class="row" >
                                                    <label class="col-md-auto color-darkTheme " style="width:200px;">NPM </label><input type="text" name="npm" class="col-md-auto bold-600 color-darkTheme no-block" v-model="user.npm" style="width:300px; margin:auto 15px; font-weight:600" required v-on:keyup="inputValidation('npm', 'npm', 'npm_er')" id="npm">
                                                    <span class="col-md-auto validity"></span>
                                                </div><br>
                                        
                                                <div class="row" >
                                                    <label class="col-md-auto color-darkTheme " style="width:200px;">TELEPON </label><input type="text" name="phone" class="col-md-auto bold-600 color-darkTheme no-block" v-model="user.phone" style="width:300px; margin:auto 15px; font-weight:600" required v-on:keyup="inputValidation('number', 'phone', 'phone_er')" id="phone">
                                                    <span class="col-md-auto validity"></span>
                                                </div><br>
                                        
                                                <div class="row" >
                                                    <label class="col-md-auto color-darkTheme " style="width:200px;">TEMPAT LAHIR</label><input type="text" name="bornPlace" class="col-md-auto bold-600 color-darkTheme no-block" v-model="user.bornPlace" style="width:300px; margin:auto 15px; font-weight:600" required>
                                                    <span class="col-md-auto validity"></span>  
                                                </div><br>
                                        
                                                <div class="row" >
                                                    <label class="col-md-auto color-darkTheme " style="width:200px;">TANGGAL LAHIR</label><datepicker v-bind:input-class="'col-md-auto bold-600 color-darkTheme no-block'" :bootstrap-styling="true" class="test" v-model="user.birthDay" style="width:300px; margin:auto 15px; font-weight:600;" required ></datepicker>
                                                    <span class="col-md-auto validity"></span>
                                                    
                                                </div><br>
                                                <hr style="height:2px;border:none;background-color:rgb(82, 82, 82);">
                                                <div class="row" >
                                                    <label class="col-md-auto color-darkTheme " style="width:200px;">Facebook</label><input type="text" name="facebook" class="col-md-auto bold-600 color-darkTheme no-block" v-model="user.facebook" style="width:300px; margin:auto 15px; font-weight:600">
                                                </div><br>
                                                <div class="row" >
                                                    <label class="col-md-auto color-darkTheme " style="width:200px;">Twitter</label><input type="text" name="twitter" class="col-md-auto bold-600 color-darkTheme no-block" v-model="user.twitter" style="width:300px; margin:auto 15px; font-weight:600">
                                                </div><br>
                                                <div class="row" >
                                                    <label class="col-md-auto color-darkTheme " style="width:200px;">Instagram</label><input type="text" name="instagram" class="col-md-auto bold-600 color-darkTheme no-block" v-model="user.instagram" style="width:300px; margin:auto 15px; font-weight:600">
                                                </div><br>
                                                <hr style="height:2px;border:none;background-color:rgb(82, 82, 82);">
                                                <input type="submit" class="full-width" value="Simpan Data" name="simpan">
                                                <br>
                                                <input  class="full-width btn btn-danger" value="Batal" name="batal" @click="edit=false">
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="media-social-container p-x-5 pad-t-60px">
                                <div class="row h-100">
                                    <div class="col" v-if="user.facebook">
                                        <a class="social-media" v-bind:href="'https://www.facebook.com/'+user.facebook"><i class="fab fa-facebook-f" id="profile"></i></a>
                                    </div>
                                    <div class="col" v-if="user.twitter">
                                        <a class="social-media" href="<?php echo 'https://www.twitter.com/'.$user->twitter?>"><i class="fab fa-twitter" id="profile"></i></a>
                                    </div>
                                    <div class="col" v-if="user.instagram">
                                        <a class="social-media" href="<?php echo 'https://www.instagram.com/'.$user->instagram?>"><i class="fab fa-instagram" id="profile"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import Axios from 'axios';
export default {
    components: {
        Datepicker
    },
    data(){
        return {
            user : {},
            edit : false,
        };
    },
    methods:{
        inputValidation: function (tipe, id, errId) {
                var re;
                var val = document.getElementById(id).value;
                var err;
                switch (tipe) {
                    case "email":
                        re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                        err= "Format Email Anda Salah atau Tidak Boleh Kosong.";
                        
                        break;
                    case "name":
                        re = /^[a-zA-Z ]+$/;
                        err = "Format Nama Anda Salah. Max 30 atau Tidak Boleh Kosong.";
                        break;
                    case "pass":
                        re = /(?=.{6,})/;
                        err = "Format Password Anda Salah. Min: 6, Max: 25 atau Tidak Boleh Kosong.";
                        break;
                    case "npm":
                        re = /(?=.{9,9})^[0-9]+$/;
                        err = "Format NPM Anda Salah. 9 Digit dan Hanya Angka.";
                        break;
                    case "number":
                        re = /^[0-9]+$/;
                        err = "Format No Telefon Anda Salah. Hanya Angka.";
                        break;
                    default:
                        re = /^[a-zA-Z ]{0, 30}+$/;
                        break;
                }
                var a = re.exec(val);
                if(a===null){
                    document.getElementById(id).setCustomValidity(err);
                    document.getElementById(errId).innerHTML= err;
                }else{
                    document.getElementById(id).setCustomValidity("");
                    document.getElementById(errId).innerHTML="";
                }
            },
        rePassValidation:
            function(id1, id2, errId) {
                var err = "Password Tidak Cocok!."
                var val1 = document.getElementById(id1).value;
                var val2 = document.getElementById(id2).value;
                
                if (val1 != val2) {
                    document.getElementById(id2).setCustomValidity(err);
                    document.getElementById(errId).innerHTML = err;
                } else {
                    document.getElementById(id2).setCustomValidity("");
                    document.getElementById(errId).innerHTML = "";
                }
            },
        setFailLogin:
            function setFailLogin(id, err=""){
                document.getElementById(id).style.visibility="visible";
                document.getElementById(id).innerHTML = err;
            },
        save(){
            
            let user = this.user;
            Axios.put('Member/'+this.user.id, {data : user}
            ).then((res)=>{
                this.$auth.user(res.data);
            }).catch((res)=>{
                console.log(res);
                console.log(this.user);
            });
        }
    },
    created(){
        this.user = JSON.parse(JSON.stringify(this.$auth.user()));
        var date = new Date(this.user.birthDay.substring(0,10));
        this.user.birthDay = date.toLocaleDateString();
        if(this.$route.query.edit){
            this.edit = true;
        }
    }
}
</script>

<style scoped>
.test > div> div{
    color: black !important;
    background-color: black !important;
}

</style>
