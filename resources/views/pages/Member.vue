<template>
    <div class="row p-x-10 pad-t-60px" style="max-width: 100vw">
		<div class="container register-container border-radius-5px mar-t-20px">
			<fieldset >
				
			<form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">
				<legend class="form-title">WELCOME <span class="color-secondTheme">FRESHMEN</span></legend>
				<div class="row">
					<div class="col-xl-12">
						<label class="color-lightTheme"><span class="color-red">*</span> Full Name</label>
						<input v-model="name" class="placeholder-lightTheme" name="name" type="text" placeholder="Jo Vianto" required v-on:keyup="inputValidation('name','name','name_er')" id="name" maxlength="30"/>
						<span class="validity"><span id="name_er"></span></span>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<label class="color-lightTheme"><span class="color-red">*</span> Email</label>
						<input v-model="email" class="placeholder-lightTheme" name="email" type="text" required v-on:keyup="inputValidation('email','email','email_er')" placeholder="example@domain.com" id="email" maxlength="50"/>
						<span class="validity"><span id="email_er"></span></span>
					</div>
				</div>
				<div class="row">
				  <div class="col-xl-12">
						<label class="color-lightTheme"><span class="color-red">*</span> Password</label>
						<input v-model="password" class="placeholder-lightTheme" name="pass" type="password" placeholder="Password" required v-on:keyup="inputValidation('pass','pass','pass_er')"  id="pass" maxlength="25" minlength="6"/>
						<span class="validity"><span id="pass_er"></span></span>
					</div>
				</div>
				<div class="row">
				  <div class="col-xl-12">
						<label class="color-lightTheme"><span class="color-red">*</span> Verify Password</label>
						<input class="placeholder-lightTheme" type="password" placeholder="Re-Password" required v-on:keyup="rePassValidation('pass', 'repass', 'rePass_er')" id="repass"/>
						<span class="validity"><span id="rePass_er"></span></span>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<label class="color-lightTheme"><span class="color-red">*</span> Study Program</label>
						<select v-model="prody" class="full-width" name="jurusan" required>
							<option disabled selected value> -- pilih sebuah prody -- </option>
							<option  value="Teknik Informatika">Teknik Informatika</option>
							<option value="Teknik Industri">Teknik Industri</option>
							<option value="TIKI">TIKI</option>
							<option value="Sistem Informasi">Sistem Informasi</option>
						</select>
					</div>
				</div>
				<div class="row">
				  <div class="col-xl-12">
					<label class="color-lightTheme"><span class="color-red">*</span> NPM</label>
						<input v-model="npm" class="placeholder-lightTheme" name="npm" type="tel" placeholder="123456789" required v-on:keyup="inputValidation('npm', 'npm', 'npm_er')" id="npm" maxlength="9"/>
						<span class="validity"><span id="npm_er"></span></span>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<label class="color-lightTheme"><span class="color-red">*</span> Phone</label>
						<input v-model="phone" class="placeholder-lightTheme" name="phone" type="text" placeholder="00123" required v-on:keyup="inputValidation('number', 'phone', 'phone_er')" id="phone"/>
						<span class="validity"><span id="phone_er"></span></span>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<label class="color-lightTheme"><span class="color-red">*</span> Born Place</label><span class="validity"></span>
						<input v-model="bornPlace" class="placeholder-lightTheme" name="bornPlace" type="text" placeholder="Yogyakarta"/>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xl-12">
					  <label class="color-lightTheme"><span class="color-red">*</span> Birth Day</label><span class="validity"></span>
						<input v-model="birthDay" class="placeholder-lightTheme" name="birthDay" type="date"/>
						<div class="alert alert-danger" v-if="error && !success">
							There was an error, unable to complete registration.
						</div>
						<p></p>
						<input  class="full-width" type="submit" value="Register" name="register"/>
					</div>
				</div>
				</form >
			</fieldset>	
					
	  	</div>
		<div class="container login-container border-radius-5px mar-t-20px">
			<fieldset >
				<legend class="form-title">SIGNIN DASHBOARD <span class="color-secondTheme">KSR</span></legend>
				<form autocomplete="off" @submit.prevent="login" method="post">
					<div class="row">
						<div class="col-xl-12">
							<label class="color-lightTheme"><span class="color-red">*</span> Email</label><span class="validity"></span>
							<input v-model="email_login" class="placeholder-lightTheme" name="email_login" type="text" placeholder="example@domain.com" required/>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-12">
							<label class="color-lightTheme"><span class="color-red">*</span> Password</label><span class="validity"></span>
							<input v-model="pass_login" class="placeholder-lightTheme" name="pass_login" type="password" placeholder="********" required/>
							<a href="#" style="margin-bottom:5px; margin-top:5">Lupa Password?</a>
							
						</div>
					</div>
					<div class="row  " v-if="error_login">
						<div class="col-xl-12 " >
							<br>
							<p class="align-center alert alert-danger" id="fail-login">Gagal Masuk! Email/Password Anda Salah.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-12">
							<input class="full-width bg-color-darkorange" type="submit" value="Login" name="login"/>
						</div>
					</div>
				</form>
			</fieldset>				
	 	</div>
	</div>
</template>

<script>
export default {
	data(){
		return {
			name: '',
			email: '',
			password: '',
			prody:'',
			npm:'',
			phone:'',
			bornPlace:'',
			birthDay:null,
			error: false,
			errors: {},
			success: false,
			error_login:false,
			email_login:'',
			pass_login:'',
		};
	},
    methods:{
        inputValidation: 
            function (tipe, id, errId) {
                var re;
                var val = document.getElementById(id).value;
                var err;
                switch (tipe) {
                    case "email":
                        re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                        err= "Format Email Anda Salah atau Tidak Boleh Kosong.";
                        
                        break;
                    case "name":
                        re = /^[a-zA-Z ]+$/;
                        err = "Format Nama Anda Salah. Max 30 atau Tidak Boleh Kosong.";
                        break;
                    case "pass":
                        re = /(?=.{6,})/;
                        err = "Format Password Anda Salah. Min: 6, Max: 25 atau Tidak Boleh Kosong.";
                        break;
                    case "npm":
                        re = /(?=.{9,9})^[0-9]+$/;
                        err = "Format NPM Anda Salah. 9 Digit dan Hanya Angka.";
                        break;
                    case "number":
                        re = /^[0-9]+$/;
                        err = "Format No Telefon Anda Salah. Hanya Angka.";
                        break;
                    default:
                        re = /^[a-zA-Z ]{0, 30}+$/;
                        break;
                }
                var a = re.exec(val);
                if(a===null){
                    document.getElementById(id).setCustomValidity(err);
                    document.getElementById(errId).innerHTML= err;
                }else{
                    document.getElementById(id).setCustomValidity("");
                    document.getElementById(errId).innerHTML="";
                }
            },
        rePassValidation:
            function(id1, id2, errId) {
                var err = "Password Tidak Cocok!."
                var val1 = document.getElementById(id1).value;
                var val2 = document.getElementById(id2).value;
                
                if (val1 != val2) {
                    document.getElementById(id2).setCustomValidity(err);
                    document.getElementById(errId).innerHTML = err;
                } else {
                    document.getElementById(id2).setCustomValidity("");
                    document.getElementById(errId).innerHTML = "";
                }
            },
        setFailLogin:
            function setFailLogin(id, err=""){
                document.getElementById(id).style.visibility="visible";
                document.getElementById(id).innerHTML = err;
            },
        
		register(){
				
			var app = this;
			this.$auth.register({
				data: {
					name: app.name,
					email: app.email,
					password: app.password,
					prody : app.prody,
					birthDay : app.birthDay,
					bornPlace : app.bornPlace,
					npm : app.npm,
					phone : app.phone,
				}, 
				success: function () {
					app.success = true;
					alert('SUKSES');
				},
				error: function (resp) {
					app.error = true;
					app.errors = resp.response.data.errors;
					alert(app.errors.name);
				},
				redirect: null
			});
			
		},
		login(){
			var app = this;
			var redirect = this.$auth.redirect();
			this.$auth.login({
				params: {
					email: app.email_login,
					password: app.pass_login
				}, 
				success: function () {

				},
				error: function (e) {
					console.log(e.response.data);
					app.error_login = true;
				},
				rememberMe: true,
				redirect: '/',
				fetchUser: true,
			});       
		}
	},
	
	mounted () {

		//document.getElementById('datePicker').valueAsDate = new Date();
		// template id 'new-template' di kenali
	}
}
</script>
