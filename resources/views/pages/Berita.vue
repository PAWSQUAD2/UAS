<template>
    <div class="container-fluid no-v-pad" >

        <div class="row p-x-10 pad-t-60px">
            <div class="container profile-container mar-t-20px">
                <div class="absolute-ppbg" style="overflow:hidden;">
                    <img class="sampul" src="images/sampul.jpg" alt="pp">
                </div>
                <div class="row">
                    <div class="col-xl-12 no-padding">
                        <div class="profile-header-container p-x-5 pad-t-60px editor-container" id="editor-container">
                            <div class="row">
                                <h3 class="color-darkTeme">>> Berita</h3>
                            </div>
                            <hr>
                            
                            <div class="card row full-width preview-container"  id="preview-container" ref="previewContainer" v-if="berita_pilihan.judul" >
                                <div class="card p-2">
                                    <h4 style="text-align:center; " class="full-width" id="preview-judul">{{ berita_pilihan.judul }}</h4>
                                    <h6 style="text-align:center; margin-bottom:80px;" class="full-width" id="preview-kategori">Kategori : {{ berita_pilihan.kategori }}</h6>
                                    <br>
                                    <div class="full-width" id="preview-isi" v-html="berita_pilihan.isi" style="margin-bottom : 60px">{{ berita_pilihan.isi }}</div>
                                </div>
                                <comments-box :id="berita_pilihan.id"></comments-box>
                            </div>
                            <div v-else>
                                Silahkan pilih berita dibawah ini.
                            </div>  
                            <hr>
                            <br><br>
                            <h3 class="color-darkTeme">>> Berita-Berita Lainnya</h3>
                            <hr>
                            <div v-if="news.length == 0" class="row container-berita">
                                Berita Kosong
                            </div>
                            <div v-for="(data, index) in news" v-bind:key="data.id" class="row container-berita" @click="selectBerita(index)" v-bind:data-aos="index%2==0?'flip-right':'flip-left'">
                                <div class="col-md-4 image-berita">
                                    <img :src="data.photoUrl" width="100%">
                                </div>
                                <div class="col-md-8 content">
                                    <h5 class="title"><span>{{ data.kategori.toUpperCase() }} </span> {{ data.judul }} </h5>
                                    <article>
                                        <p v-html="data.isi"> {{ data.isi }} </p>
                                        <p>Klik untuk melihat detail!</p>
                                        <p class="bold">{{ data.create_at }}</p>
                                    </article>
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
export default {
    data(){
        return {
            news:[],
            berita_pilihan:{},
        };
    },
    methods:{
        updateData(){
            axios.get('news').then((res)=>{
                this.news = res.data;
                
            });
        },
        selectBerita(index){
            this.berita_pilihan = this.news[index];
            var element = document.getElementById("editor-container");
            var top = element.offsetTop;
            window.scrollTo(0, top);
        }
    },
    beforeMount(){
       this.updateData();
       if(this.$route.query.id){
           axios.get('news/'+this.$route.query.id).then((res)=>{
               this.berita_pilihan = res.data;
           });
       }
    },
}
</script>
<style scoped>
.preview-container{
    padding: 10px;
}
</style>
