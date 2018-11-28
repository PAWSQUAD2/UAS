<template>
    <div v-if="ready">
        <comment v-for="(comment) in comments" :comment="comment" :key="comment.id" :id="comment.id" @comment_deleted="comment_deleted"></comment>
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
            })
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
