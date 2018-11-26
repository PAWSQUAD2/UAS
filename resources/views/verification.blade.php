

 
Email Verification - KSR Dashboard', '<h3>Terima Kasih!!</h3>

Hello <i>{{ $demo->receiver }}</i>,
<p style="color:red;font-size:20px;">Terima kasih anda telah mendaftar KSR. Mohon aktivasi email anda dibawah ini dan tunggu hingga pendaftaran anda dire-view oleh admin</p>
Please Click Link Below : <a href="http://ksriotdemo.000webhostapp.com/verify.php?token={{ $token }}">---KLIK DISINI---</a>
<p style="color:red;font-size:20px;">Atau Anda dapat membuka http://ksriotdemo.000webhostapp.com/paw/UTS/verify.php kemudian masukkan token = {{ $token }} Anda untuk verifikasi email.</p>

Thank You,
<br/>
<i>{{ $demo->sender }}</i>