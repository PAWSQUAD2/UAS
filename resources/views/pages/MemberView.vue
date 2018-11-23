<template>
    <div class="container-fluid no-v-pad" >

        <div class="row p-x-10 pad-t-60px">
            <div class="container profile-container mar-t-20px">
                <div class="absolute-ppbg" style="overflow:hidden;">
                    <img class="sampul" src="images/sampul.jpg" alt="pp">
                </div>
                <div class="row">
                    <div class="col-xl-12 no-padding">
                        <div class="profile-header-container p-x-5 pad-t-60px editor-container">
                            <div class="emblem">
                            <div class="logo"><img src="images/emblen.jpg"/></div>
                            <h3 class="caption color-darkTheme">Kelompok Studi Robotik</h3>
                        </div>
                        <h3 class="color-darkTheme">>> Calon-Calon Anggota KSR</h3>
                        <hr>
                        <iframe name="hidden-frame" width="0" height="0" border="0" style="display: none;"></iframe>
                        <table>
                            <tr >
                                <th ><strong>No.</strong></th>
                                <th >Nama</th>
                                <th >Fakultas</th>
                                <th >Program Studi</th>
                                <th >NIM</th>
                                <th >Email</th>
                                <th >Accept / Reject</th>
                            </tr>
                            
                            <tr v-if="!$auth.check('admin')">
                                <td colspan="7">Anda tidak punya hak untuk mengakses data ini.</td>
                            </tr>
                        
                            <tr v-else-if="newUsers.length==0">
                                <td colspan="7">Tidak Ada Pendaftar.</td>
                            </tr>
                        
                            <tr v-else v-for="data in newUsers" v-bind:key="data.id">
                                <td >{{ data.id }}</td>
                                <td ><a href="profile.php?uid='.$data['token'].'">{{ data.name }}</a></td>
                                <td>FTI</td>
                                <td>{{ data.prody }}</td>
                                <td>{{ data.npm }}</td>
                                <td>{{ data.email }}</td>
                                <td>
                                    <div class="centralize">
                                        <form action="pendaftar_action.php" method="post" target="hidden-frame">
                                            <input type="hidden" name="Userid" value="'.$data['token'].'">
                                            <!-- <button type= "submit" class="btn-acc" name="acc" onclick="'."return confirm('Anda Yakin Menerima -> ".$data['name']."?')".'"> Accept </button> -->
                                            <!-- <button type= "submit" class="btn-rej" name="rej" onclick="'."return confirm('Anda Yakin Menolak -> ".$data['name']."?')".'"> Reject </button> -->
                                        </form>
                                    </div>
                                </td>
                            </tr> 
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
const axios = require('axios');
export default {
    data(){
        return {
            newUsers:[],
        };
    },
    methods(){
        
    },
    created(){
        axios.get('/newMember', {
            params:{
                token : this.$auth.token()
            }
        }).then((res)=>{
            this.newUsers = res.data.data;
            console.log(res.data.data);
        });
    },
    
}

</script>
