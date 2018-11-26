<template>

    <div class="container-fluid no-v-pad" >
        <div class="row top ">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="background-color: grey">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active"> <img class="d-block mx-auto" src="images/img01.jpg" alt="First slide">
                        <div class="carousel-caption">
                            <h5>Project</h5>
                            <p>Kreativitas membuat sebuah robot</p>
                        </div>
                    </div>
                    <div class="carousel-item"> <img class="d-block mx-auto" src="images/img02.jpg" alt="Second slide">
                        <div class="carousel-caption">
                            <h5>Wisudawan Fosil</h5>
                            <p>Menghadiri acara wisudawan para fosil</p>
                        </div>
                    </div>
                    <div class="carousel-item"> <img class="d-block mx-auto" src="images/img03.jpg" alt="Third slide">
                        <div class="carousel-caption">
                            <h5>TEA PARTY</h5>
                            <p>Acara Perpisahaan dan Ulang Tahun para fosil</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
            </div>
        </div>
        <!-- Page content 1 -->
        <div class="p-x-10" style="background-color: white;padding-top: 40px;padding-bottom: 40px">
            <div class="container-fluid pad25B row">
                <div class="col-md-4 pad25B my-auto">
                    <div class="card-view" data-aos="fade-in">
                        <div class="icon-card-view"></div>
                        <h3 class="heder-card-view">Mechanic</h3>
                        <p class="content-card-view">Mechanic merupakan bentuk badan dari robot dan mekanisme kerjanya, sehingga kurikulum yang kami ajarkan tentang bagaimana membuat bentuk dan proses kerjanya. </p>
                    </div>
                </div>
                <div class="col-md-4 pad25B my-auto">
                    <div class="card-view" data-aos="fade-in">
                        <div class="icon2-card-view" ></div>
                            <h3 class="heder-card-view">Electronic</h3>
                            <p class="content-card-view">Electronic merupakan isi dari robot, mulai dari sensor hingga penggerak, dari baterai hingga tampilan display yang semuanya akan diatur oleh komputer.  </p>
                    </div>
                </div>

                <div class="col-md-4 pad25B my-auto">
                    <div class="card-view" data-aos="fade-in">
                        <div class="icon3-card-view"></div>
                            <h3 class="heder-card-view">COMPUTER</h3>
                            <p class="content-card-view">Seluruh proses dalam robot diatur dalam computer, sehingga untuk dapat membuat robot bergerak sesuai kebutuhan akan diperlukan kemampuan pemrograman.  </p>
                    </div>
                </div>					
            </div>
        </div>
        <div class="body" style="max-height:1000px; background-color: rgb(64, 67, 68); overflow: auto;">
            <!-- Page content 2-->
            <div class=" col-xl-12" >
                <!-- Project Section -->
                <div class="al-panel al-padding-32" id="projects">
                <h3 class="al-padding-bootom al-border-light-grey al-padding-16 color-lightTheme">Trending</h3>
                </div>
                <div class="al-row-padding">
                    <div v-for="(data, index) in news" v-bind:key="data.id" class="al-col al al-m al-margin-bottom" data-aos-duration="1000" v-bind:data-aos="index%2==0?'flip-right':'flip-left'">
                        <div class="al-display-container">
                            <div class="al-display-topleft al-black al-padding">{{ data.kategori }}</div>
                            <img v-bind:src="data.photoUrl" alt="'.$data['kategori'].'" style="width:100%; max-width:300px; max-height:200px;" >
                            <a class="al-title color-lightTheme bold" href="berita.php?id='.$data['id'].'">{{ data.judul }}</a>
                            <p class="al-caption color-lightTheme" max-lines="5">{{ data.isi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="body" style="max-height: 1200px;  background-color: white;overflow: hidden;">
            <div class="row ald-padding-64 pad-b-40px" >
                <div class="ald-col m6 ald-padding-large" data-aos="fade-right">
                    <img src="images/mechatron.jpg" class="ald-round ald-image ald-opacity-min" alt="Mechatron" width="600" height="750">
                </div>

                <div class="ald-col m6 ald-padding-large" data-aos="flip-left">
                    <h1 class="ald-center">Mutant: Mechatron - Rise of the Robots Roleplaying</h1><br>
                    <h5 class="ald-center">--Fria Ligan--</h5>
                    <p class="ald-large">The machines awake in this postapocalyptic RPG in the vein of Asimov and Westworld, set in the universe of acclaimed Mutant: Year Zero.</p>
                    <p class="ald-large ald-text-grey ald-hide-medium">In the huge underwater Mechatron-7 facility, armies of machines toil away in decaying factories. When the war raged the humans fled, leaving their robotic servants with one simple command: continue the production until we return. That was decades ago. Now, something is changing. Robots in Mechatron-7 are starting to malfunction. To rebel. To express a will of their own. To Awake. It's time for the machines to make their mark on the dawnworld.</p>
                </div>
            </div>
        </div>

        <div class="grid" style="opacity:.7; overflow: hidden;">
            <div class="about-container" style="height:500px;opacity:50%;">
                <div class="col no-padding" style="opacity:50%">
                    <div class="emblem clear-margin">
                        <div class="logo"><img src="images/emblen.jpg"/></div>
                        <h3 class="caption color-darkTheme clear-margin">About Us</h3>
                    </div>
                    <div class="tentang-ksr-data clear-margin">
                        <div class="row">
                            <div class="col visi"  style="color: white;">
                                <h2 style="text-align: center; font-weight: bold">VISI </h2>
                                        <br>
                                <p>
                                        <!--<'?'php 
                                            $setting = $con->query("SELECT * FROM setting");
                                            $setting = mysqli_fetch_assoc($setting);
                                            echo $setting['visi'];
                                        ?> -->
                                        Menjadikan KSR terkemuka dalam pengembangan ilmu pengetahuan dan teknologi dalam bidang robotika. 
                                </p>
                            </div>
                            <div class="col misi" style="overflow: auto;">
                                <h2 style="text-align: center; font-weight: bold;">MISI </h2>
                                        <br>
                                <p>
                                    1. Mengikuti kompetisi yang berhubungan dengan robotika.
                                    2. Menyelenggarakan penelitian dan pengabdian di bidang robotika kepada masyarakat yang dapat meningkatkan kesejahteraan manusia.
                                    3. Menyelenggarakan pelatihan dan pendidikan di bidang robotika guna mengaplikasikan ilmu pengetahuan kepada masyarakat luas.
                                    4. Menyelenggarakan kerjasama dengan pihak lain guna mengembangkan ilmu pengetahuan dan teknologi dalam bidang robotika. 
                                </p>
                            </div>
                        </div>
                        <div class="row">
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from 'axios';
export default {
<<<<<<< Updated upstream
    
=======
    data(){
        return{
            news : [],
        }
    },
    beforeMount(){
        Axios.get('news')
        .then(res=>{
            this.news = res.data;
        }).catch(res=>{

        })
    }
>>>>>>> Stashed changes
}
</script>
