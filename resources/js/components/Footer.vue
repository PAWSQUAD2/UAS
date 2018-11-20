<template>
    <footer class="footer">
        <div class="container bottom_border">
            <div class="row">
                <div class="col text-center">
                    <h5 class="headin5_amrc col_white_amrc pt2">Get in Touch</h5>
                    <p><i class="fa fa-location-arrow"></i> {{ setting.alamat }}</p>
                    <p><i class="fa fa-phone"></i> {{ setting.phone }}</p>
                    <p><i class="fa fa fa-envelope"></i> {{ setting.email }}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <ul class="social_footer_ul">
                <li><a v-bind:href="setting.facebook"><i class="fab fa-facebook-f"></i></a></li> 
                <li><a v-bind:href="setting.gplus"><i class="fab fa-google +"></i></a></li>
                <li><a v-bind:href="setting.instagram"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
        <hr class="split">
        <p class="text-center">Copyright @2018 | privacy policy | disclaimer | site map</p>
    </footer>
</template>

<script>
import axios from "axios";

export default{
    data() {
        return {
        setting: {},
        errors: []
        }
    },

    // Fetches posts when the component is created.
    created() {
        
        fetch('api/setting')
            .then(res => res.json())
            .then(res => {
                this.setting = res.data;
            });
        
        // async / await version (created() becomes async created())
        //
        // try {
        //   const response = await axios.get(`http://jsonplaceholder.typicode.com/posts`)
        //   this.posts = response.data
        // } catch (e) {
        //   this.errors.push(e)
        // }
    }
}

</script>