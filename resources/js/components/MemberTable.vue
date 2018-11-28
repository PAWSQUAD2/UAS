<template>
    <div>
        <div class="pagination">
            <li v-bind:class="[{disabled: !pagination.prev_page_url}]" @click="pagination.prev_page_url?updateData(pagination.prev_page_url):null" class="page-item"><a class="page-link" >Previous</a></li>
            <li class="page-item disabled"><a class="page-link">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
            <li v-bind:class="[{disabled: !pagination.next_page_url}]" @click="pagination.next_page_url?updateData(pagination.next_page_url):null"  class="page-item"><a class="page-link" >Next</a></li>
        </div>
        <table class="table table-dark">
            <tr >
                <th ><strong>PP.</strong></th>
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
        
            <tr v-else v-for="(data) in newUsers" v-bind:key="data.id">
                <td class="no-border" style="text-align:center;">
                    <img v-bind:src="data.photoUrl?data.photoUrl:'images/pp.png'" alt="pp" class="avatar">
                </td>
                <td ><a href="profile.php?uid='.$data['token'].'">{{ data.name }}</a></td>
                <td>FTI</td>
                <td>{{ data.prody }}</td>
                <td>{{ data.npm }}</td>
                <td>{{ data.email }}</td>
                <td>
                    {{ data.role }}
                </td>
            </tr> 
        </table>
    </div>
</template>
<script>
const axios = require('axios');

export default {
    data(){
        return {
            newUsers:[],
            pagination: {},
        };
    },
    methods:{
        updateData(tPage){
            tPage = tPage || '/Member/10';
            axios.get(tPage, {
                params:{
                    
                    token : this.$auth.token()
                }
            }).then((res)=>{
                this.newUsers = res.data.data;
                this.makePagination(res.data);
                console.log(res.data);
            });
        },
        makePagination(meta){
            let pagination={
                current_page : meta.current_page,
                last_page : meta.last_page,
                next_page_url : meta.next_page_url,
                prev_page_url : meta.prev_page_url
            }
            this.pagination = pagination;
        }
    },
    created(){
       this.updateData();
       
    },
    
}
</script>

<style scoped>
    .pagination{
        display: inline-flex;
        margin-left: auto;
        margin-right: auto;
    }
    
</style>