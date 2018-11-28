<template>
    <div class="row p-x-10 pad-t-60px">
        <div class="container profile-container mar-t-20px">
            <div class="absolute-ppbg" style="overflow:hidden;">
                <img class="sampul" src="images/sampul.jpg" alt="pp">
            </div>
            <div class="row">
                <div class="col-xl-12 no-padding">
                    <div class="profile-header-container p-x-5 pad-t-60px editor-container" id="editor-container">
                        <div class="row">
                            <h3 class="color-darkTeme">>> Tambah Berita</h3>
                        </div>
                        <hr>
                        <iframe name="hidden-frame" width="0" height="0" border="0" style="display: none;"></iframe>
                        <form autocomplete="false" @submit.prevent="current_edit.id?update():post()" method="POST" id="form-berita" enctype="multipart/form-data" >
                            <div class="row pad-b-40px">
                                <div class="col-md-auto img-berita mb-5 mr-5">
                                    <figure style="width:100%; max-height:150px; overflow:hidden;">
                                        <img :src="imgUrl" alt="pp" width="100%" style="margin-top:20px;" id="img-preview">
                                    </figure>
                                    <input type="file" name="file" ref="myFiles" class="full-width mt-4" accept="image/gif, image/jpg, image/jpeg, image/png" style="display: none;" id="selectedFile" @change="readURL">
                                    <div style="margin : auto; width:100px;">
                                        <input type="button" value="Browse..." onclick="document.getElementById('selectedFile').click();" style="width:100%;margin-top:30px;"/>
                                    </div>
                                    
                                </div>
                                <div class="col berita-header">
                                    <div class="row  mar-t-20px">
                                        <label class="col-md-auto color-darkTheme">Judul :</label><br>
                                    </div>
                                    <input v-model="judul" required type="text" placeholder="Judul Berita" class="text-box color-darkTheme" name="judul" id="judul">
                                    <div class="row">
                                        <label class="col-md-auto color-darkTheme">Kategori :</label><br>
                                    </div>
                            
                                    <select v-model="kategori" class="full-width combo-box color-darkTheme" name="kategori" id="kategori" required>
                                        <option disabled selected value> -- pilih kategori -- </option>
                                        <option value="Event">Event</option>
                                        <option value="Berita">Berita</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row  mar-t-20px">
                                <label required class="color-darkTheme">Isi Berita :</label><br>
                            </div>
                            <div class="row berita-editor">
                                <div class="tools">
                                    <button type="button" class="tool-button" @click="editorTool('editor', 0)">B</button>
                                    <button type="button" class="tool-button underline" @click="editorTool('editor', 1)">Link</button>
                                    <button type="button" class="tool-button centerline" @click="editorTool('editor', 2)">del</button>
                                    <button type="button" class="tool-button" @click="editorTool('editor', 3)">img</button>
                                    <button type="button" class="tool-button" @click="editorTool('editor', 4)">P</button>
                                </div>
                                <textarea required v-model="isi" class="editor mb-3" id="editor" maxlength="65535" name="isi"></textarea>
                                <button type="submit" class="tool-button publish btn-success" name="publish" id="publish">{{ current_edit.id?'UPDATE':'PUBLISH' }}</button>
                                <button type="button" class="tool-button preview color-lightTheme" @click="preview();">Preview</button>
                            </div>
                        </form>
                        <hr>
                        <div class="row full-width preview-container" style="display:none;" id="preview-container">
                            <h4 style="text-align:center; margin-bottom:40px;" class="full-width bold" >-PREVIEW-</h4>
                            <h4 style="text-align:center; " class="full-width" id="preview-judul">AWEWE</h4>
                            <h6 style="text-align:center; margin-bottom:80px;" class="full-width" id="preview-kategori">Kategori :</h6>
                            <br>
                            <div class="full-width" id="preview-isi"></div>
                            
                        </div>
                        <br><br>
                        <h3 class="color-darkTeme">>> Berita-Berita</h3>
                        <hr>
                            
                        <table class="table table-light">
                            <tr >
                                <th scope="col"><strong>No.</strong></th>
                                <th scope="col">Judul</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Tanggal Rilis</th>
                                <th style="min-width:100px">Option</th>
                            </tr>
                            <tr v-for="(data, i) in news" v-bind:key="data.id">
                                <td scope="row">{{ i }}</td>
                                <td>{{ data.judul }}</td>
                                <td>{{ data.kategori }}</td>
                                <td>{{ data.created_at }}</td>
                                <td>
                                    <div class="centralize">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success d-inline" @click="edit(i)"> Edit </button>
                                            <button type="button" class="btn btn-danger d-inline" @click="del(i)"> Hapus </button>
                                        </div>
                                        
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            imgUrl:"/images/Carousel_Placeholder.png",
            judul:"",
            isi:"",
            kategori:'',
            current_edit:{},
            news:[],
        }
    },
    methods:{
        editorTool(id, n){
            var a = ['<span class="bold">TextHere</span>',
                '<a href="your-link.here">TextHere</a>',
                '<span class="centerline">TextHere</span>',
                '<img src="example.png" alt="mImg">',
                '<p>Your Text Here</p>'
            ];
            if(!(n<0 || n>a.length-1)){
                document.getElementById(id).value+= a[n];
                this.isi = document.getElementById(id).value;
            }
            
        },
        preview(){
            document.getElementById("preview-container").style.display = "block";
            document.getElementById("preview-judul").innerHTML = document.getElementById("judul").value;
            document.getElementById("preview-kategori").innerHTML ="Kategori : " + document.getElementById("kategori").value;
            document.getElementById("preview-isi").innerHTML = document.getElementById("editor").value;
        },
        readURL(input) {
            console.log(input.target.files);
            if (this.$refs.myFiles.files && this.$refs.myFiles.files[0]) {
                var reader = new FileReader();
                reader.addEventListener("load", function () {
                    this.imgUrl = reader.result;
                }.bind(this), false);
                
                reader.readAsDataURL(input.target.files[0]);
            }
        },
        post(){
            if(this.imgUrl == "/images/Carousel_Placeholder.png"){
                alert('Foto Tidak Boleh Kosong');
                return;
            }
            axios.post('/image/store',{image: this.imgUrl}).then(response => {
                axios.post('news',{
                    judul : this.judul,
                    isi : this.isi,
                    photoUrl : response.data,
                    kategori: this.kategori,
                    
                }).then(res=>{
                    this.$router.push({
                        name :'berita',
                        query:{
                            id:res.data.id
                        }
                    })
                }).catch(res=>{
                    alert('UNEXPECTED ERROR CAUGHT, FAILED TO CREATE NEWS');
                });
            }).catch(res=>{
                console.log(res);
            });
        },
        update(){
            if(this.imgUrl == this.current_edit.photoUrl){
                axios.put('/news/'+this.current_edit.id,{
                    judul : this.judul,
                    isi : this.isi,
                    photoUrl : this.imgUrl,
                    kategori: this.kategori,
                }).then(()=>{
                    alert('sukses');
                })
            }else{
                axios.delete('/image/'+this.current_edit.id);
                
                axios.post('/image/store',{image: this.imgUrl}).then(response => {
                    axios.put('/news/'+this.current_edit.id,{
                        judul : this.judul,
                        isi : this.isi,
                        photoUrl : response.data,
                        kategori: this.kategori,
                    }).then(res=>{
                        this.$router.push({
                            name :'berita',
                            query:{
                                id:res.data.id
                            }
                        })
                    }).catch(res=>{
                        alert('UNEXPECTED ERROR CAUGHT, FAILED TO CREATE NEWS');
                    });
                }).catch(res=>{
                    console.log(res);
                });   
            }
            
        },
        updateData(){
            axios.get('news/').then(res=>{
                this.news = res.data;
            });
        },
        edit(i){
            this.fetchData({data : this.news[i]});
            var element = document.getElementById("editor-container");
            var top = element.offsetTop;
            window.scrollTo(0, top);
        },
        del(i){
            axios.delete('news/'+this.news[i].id).then(res=>{
                this.news.splice(i,1);
            })
        },
        fetchData(res){
            this.isi = res.data.isi;
            this.kategori = res.data.kategori;
            this.judul = res.data.judul;
            this.imgUrl = res.data.photoUrl;
            this.current_edit = res.data;
        }
    },
    beforeMount(){
        if(this.$route.query.edit){
            axios.get('news/'+this.$route.query.edit).then((res)=>{
                if(!res.data.isi){
                    alert('berita tidak ditemukan!');
                    return;
                }
                this.fetchData(res);
           });
        }
        this.updateData();
    }
}
</script>

<style scoped>
.img-berita{
    width: 200px;
    height: 300px;
    overflow: hidden;
    display: block;
    border: 1px black solid;
}
.pic-opt{
    display: block;
}
.text-box{
    background-color: aliceblue !important;

}
.text-box::placeholder{
    color: gray;
}
.combo-box{
    background-color: aliceblue !important;

}
.combo-box::placeholder{
    color: gray;
}
.berita-editor{
}
.tools{
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    border-bottom: 1px solid gray;
    height: 50px;
    width: 100%;
    background-color: #f5f5f5;
    padding: 10px;
}

.editor, .editor:hover, .editor:active{
    border: none;
    height: 500px;
    border: 1px solid gainsboro;
    border-radius: 10px;
    background-color: aliceblue !important;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    overflow: auto;
}
.editor-container{
    padding-bottom: 100px;
}

.tool-button{
    border: 1px solid gainsboro;
    border-radius: 5px;
    height: 100%;
    min-width: 40px;
    margin-right: 5px;
    cursor: pointer;
}
.underline{
    text-decoration: underline;
}
.centerline{
    text-decoration: line-through;
}
.publish{
    width: 120px;
    padding: 7px;
}
.preview{
    background-color: rgb(231, 92, 0) !important;
    width: 120px;
    padding: 7px;
}

.preview-container{
    margin-top: 50px;
    margin: 0 auto;
    border: 1px gainsboro solid;
    padding-top: 30px;
    padding-bottom: 30px;
}
#preview-isi{
    overflow: inherit;
    word-wrap: break-word;
    text-align: justify;
    width: 100%;
    padding: 40px;
}
</style>
