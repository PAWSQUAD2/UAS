<template>
    <div v-if="ready" class="border">
        <div style="padding-left:5px">
            <h2 class="text-muted">Comments</h2>
            <div class="form-group" v-if="$auth.check()">
                <label for="exampleFormControlTextarea1">Tambahkan komentar :</label>
                <textarea v-model="nComment" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Komentar Anda"></textarea>
                <button class="float-right btn btn-primary post" @click="post()">Kirim</button>
            </div>
            <div v-else>
                <h6  style="margin-top:10px;margin-bottom:20px">Anda Harus 
                    <router-link   :to="{ name: 'member' }" style="outline:0;text-decoration: none;">
                        <span class="bold">Login</span>
                    </router-link> Dulu
                </h6>
            </div>
        </div>
        <comment v-for="i in (maxShow)" :comment="comments[i-1]" :key="comments[i-1].id" :id="comments[i-1].id" @comment_deleted="comment_deleted"></comment>
        <label v-if="comments.length == 0" style="text-align:center">Jadilah yang pertama !</label>
        <div v-if="nMore">
            <button  class="full-width btn btn-outline-info" @click="more()">Load More</button>
        </div>
        
    </div>
</template>

<script>

export default {
    props:{
        id:Number
    },
    data(){
        return{
            comments : [],
            ready:false,
            nComment:null,
            maxShow:6,
            nMore : true,
        }
    },
    methods:{
        comment_deleted(id){
            this.comments = this.comments.filter((v, i, arr)=>{
                return v.id != this.id;
            });
        },
        update(){
            axios.get('comment/'+this.id).then((res)=>{
                this.comments = res.data;
                this.ready = true;
                
                this.maxShow = 6;
                
                this.nMore = true;
                this.more();
                if(this.comments.length<6){
                    this.maxShow = this.comments.length;
                    this.more();
                }
            })
        },
        post(){
            if(!this.nComment){
                alert("Komentar Tidak Boleh Kosong!!");
                return;
            }
            axios.post('comment',{
                'isi' : this.nComment,
                'id_user' : this.$auth.user().id,
                'id_berita' : this.id

            }).then((res)=>{
                this.nComment="";
                let data = res.data;
                data.isNew = true;
                this.comments.unshift(data);
                this.maxShow++;
            })
        },
        more(){
            this.maxShow+5>this.comments.length?this.maxShow=this.comments.length:this.maxShow+=5;
            if(this.maxShow >= this.comments.length) this.nMore = false;
        }
    },
    beforeMount(){
        this.update();
        
    },
    watch:{
        id: function(){
            this.ready=false;
            this.update();
            
        }
    }
}
</script>

<style scoped>
.border{
    border: 1px black solid;
    padding: 10px;
}
.post{
    margin-top: 10px;
    margin-bottom: 20px;
}
</style>
