<template>
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
    
        <tr v-else v-for="(data, index) in newUsers" v-bind:key="data.id">
            <td >{{ index + 1 }}</td>
            <td ><a href="profile.php?uid='.$data['token'].'">{{ data.name }}</a></td>
            <td>FTI</td>
            <td>{{ data.prody }}</td>
            <td>{{ data.npm }}</td>
            <td>{{ data.email }}</td>
            <td>
                <div class="centralize">
                    <form action="pendaftar_action.php" method="post" target="hidden-frame">
                        <input type="hidden" name="Userid" value="'.$data['token'].'">
                        <confirm-button class="btn-acc" :on-confirm="acc" confirm-text="Anda Yakin Menerima -> " :nama="data.name" :id="data.id"> Accept </confirm-button>
                        <confirm-button class="btn-rej" :on-confirm="del" confirm-text="Anda Yakin Menolak -> " :nama="data.name" :id="data.id"> Reject </confirm-button>
                        <!-- <button type= "submit" class="btn-rej" name="rej" onclick="'."return confirm('Anda Yakin Menolak -> ".$data['name']."?')".'"> Reject </button> -->
                    </form>
                </div>
            </td>
        </tr> 
    </table>
</template>
<script>
const axios = require('axios');
Vue.component("confirm-button",{
  props:["onConfirm", "confirmText", "nama", "id"],
  template:`<button @click="onClick"><slot></slot></button>`,
  methods:{
    onClick(){
      if (confirm(this.confirmText + this.nama))
        this.onConfirm(this.id);
    }
  }

})
export default {
    data(){
        return {
            newUsers:[],
        };
    },
    methods:{
        updateData(){
            axios.get('/newMember', {
                params:{
                    token : this.$auth.token()
                }
            }).then((res)=>{
                this.newUsers = res.data.data;
            });
        },
        acc(par) {
            axios.put('user/accept/'+par, {
                params:{
                    token : this.$auth.token(),
                },
                
            }).
            then((res)=>{
                this.updateData();
            }).catch((res)=>{
                console.log(res);
            });
        },
        del(par) {
            axios.delete('user/'+par, {
                params:{
                    token : this.$auth.token(),
                },
                
            }).
            then((res)=>{
                this.updateData();
            }).catch((res)=>{
                console.log(res);
            });
        }
    },
    beforeMount(){
       this. updateData();
    },
    
}
</script>

<style scoped>
    :root {
    --blue: #007bff;
    --indigo: #6610f2;
    --purple: #6f42c1;
    --pink: #e83e8c;
    --red: #dc3545;
    --orange: #fd7e14;
    --yellow: #ffc107;
    --green: #28a745;
    --teal: #20c997;
    --cyan: #17a2b8;
    --white: #fff;
    --gray: #6c757d;
    --gray-dark: #343a40;
    --primary: #007bff;
    --secondary: #6c757d;
    --success: #28a745;
    --info: #17a2b8;
    --warning: #ffc107;
    --danger: #dc3545;
    --light: #f8f9fa;
    --dark: #343a40;
    --mainTheme: #002836;
    --breakpoint-xs: 0;
    --breakpoint-sm: 576px;
    --breakpoint-md: 768px;
    --breakpoint-lg: 992px;
    --breakpoint-xl: 1200px;
    --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
  }

.btn-acc {
    background-color: #4CAF50; /* Green background */
    border: 1px solid green; /* Green border */
    color: white; /* White text */
    padding: 10px 30px; /* Some padding */
    cursor: pointer; /* Pointer/hand icon */
	float: left; /* Float the buttons side by side */
	width: 100px;
}
.btn-rej {
    background-color: rgb(173, 51, 51); /* Green background */
    border: 1px solid rgb(128, 0, 0); /* Green border */
    color: white; /* White text */
    padding: 10px 30px; /* Some padding */
    cursor: pointer; /* Pointer/hand icon */
	float: left; /* Float the buttons side by side */
	width: 100px;
}
table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
table tr th{
	text-align: center;
}
table td, table th {
    border: 1px solid #ddd;
    padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2; height: 40px;}
table tr:nth-child(odd){background-color: white;}

table tr:hover {background-color: #ddd;}

table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #002836;
    color: white;
}

.centralize{
	width: 200px;
	margin: auto;
}
</style>
