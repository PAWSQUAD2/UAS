<template>
    <div :class="'card '+ (updated?status:'')" style="width: 100%;">
        <div class="card-body">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="photo-container">
                        <img class="photo-profile" :src="comment.user.photoUrl?comment.user.photoUrl:'/images/pp.png'" alt="Card image cap" style="width:100%; height:auto;" >
                    </div>
                    <div class="col">
                        <h5 class="card-title mb-2 bold">{{ comment.user.name }} <span class="card-subtitle text-muted tgl">{{ comment.created_at }}</span></h5>
                        <p v-if="mode == 'read'" class="card-text">{{ comment.isi }}</p>
                        <div v-else class="form-group">
                            <label for="exampleFormControlTextarea1">Comment :</label>
                            <textarea v-model="comment_buffer" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    
                </div>
                <div v-if="editable" class="row align-items-end">
                    <div v-if="mode == 'read'">
                        <button class="btn btn-dark align-bottom" @click="comment_buffer = comment.isi;mode='write'">Edit</button>
                        <button class="btn btn-danger align-bottom" @click="del()" >Hapus</button>   
                    </div>
                    <div v-else>
                        <button class="btn btn-success align-bottom" @click="save()">Simpan</button> 
                        <button class="btn btn-danger align-bottom" @click="mode='read'">Batal</button> 
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>

import axios from "axios";
export default {
    
    data(){
        return{
            editable:false,
            mode:"read",
            comment_buffer:"",
            updated:false,
            status:"",
        }
    },
    props:{
        comment:{
            type: Object,
            required: true
        },
        id:{
            type :  Number,
            required: true,
        }
    },
    methods:{
        
        save(){
            axios.put('/comment/'+this.id,{
                isi: this.comment_buffer
            }).then(()=>{
                this.mode="read";
                this.status = "updated";
                this.updated = true;
                this.comment.isi = this.comment_buffer;
            }).catch(()=>{
                this.mode="read";
                this.status = "failed"
                this.updated = true;
            });
        },
        del(){
            if(confirm('Apakah Anda Yakin Menghapus Komentar Tersebut?'))
            axios.delete('/comment/'+this.id,{
                isi: this.comment_buffer
            }).then(()=>{
                this.$emit('comment_deleted', this.id);
            }).catch(()=>{
                this.mode="read";
                this.status = "failed"
                this.updated = true;
            });
        }
    },
    beforeMount(){
        if(this.comment.user.id == this.$auth.user().id){
            this.editable = true;
        }
        
    },
    created(){
        if(this.comment.isNew){
            this.status = "updated";
            this.updated = true;
        }
    }
}
</script>

<style scoped>
.card{
    border-width: 1px;
    margin: 5px;
}
.photo-container{
    overflow: hidden;
    width: 100px;
    height:  100px;
}
.tgl{
    font-weight: 500;
    font-size: 12px;
}
.btn{
    margin: 10px;
    min-width: 40px;
}
.updated{
    border-right: 5px green solid !important ;
}
.failed{
    border-right: 5px brown solid !important ;
}
</style>
