<nav class="navbar mNav fixed-top navbar-expand-lg navbar-light bg-light animated fadeIn"> 
        <a class="logo"><img src="images/emblen.jpg"/></a>
        <a class="navbar-brand" href="index.php">KSR</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><em>&nbsp;</em></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active"> <router-link :to="{ name: 'home' }"  class="nav-link no-outline fa fa-home">Home</router-link></li>
            <li class="nav-item"> <a class="nav-link no-outline fa fa-users" href="member.php"> Member</a> </li>
            <li class="nav-item"> <router-link :to="{ name: 'berita' }" class="nav-link no-outline fa fa-newspaper">Berita</router-link>  </li>
            <li class="nav-item"> <a class="nav-link no-outline color-darkOrange fa fa-user-plus" href="pendaftar.php"> Open Registration</a> </li>
          </ul>
          <div class="pull-right">
              <!-- <ul class="navbar-nav mr-auto">
                  <li class="nav-item active"> <a class="nav-link no-outline" href="#">Home <span class="sr-only">(current)</span></a> </li>
                  <li class="nav-item"> <a class="nav-link no-outline" href="about.html">About</a> </li>
              </ul> -->
              
              <?php
            //   if(isset($_SESSION['user'])){
            //     $user = unserialize($_SESSION['user']);
            //     echo '<li class="nav-item dropdown" style="margin:0; padding:0;"><a style="margin:0; padding: 0;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            //                                   <div class="navbar-profile navbar-nav color-lightTheme mr-auto" style="display:inline;">
            //                                     <img class="avatar" src="'.($user->photoUrl? $user->photoUrl : "images/pp.png").'" alt="avatar"/>
            //                                     <span class="name">'.$user->name.'</span>
            //                                   </div> 
            //                                 </a>
            //     <div class="dropdown-menu" aria-labelledby="navbarDropdown1" > 
            //       <a class="dropdown-item color-darkTheme fa fa-user" href="profile.php">  Beranda</a>
            //       <a class="dropdown-item color-darkTheme fa fa-wrench" href="profile_edit.php">  Edit Profile</a>
            //       <a class="dropdown-item color-darkTheme fa fa-play-circle" href="profile_edit.php">  IoT Demo</a>
            //       <div class="dropdown-divider"></div>
            //       <a class="dropdown-item color-darkTheme fa fa-newspaper" href="tambah-berita.php">  Olah Berita</a>
            //       <div class="dropdown-divider"></div>';
            //     if($user->role==="admin")
            //     echo '<a class="dropdown-item color-darkTheme fa fa-lock"  href="ksr-admin.php">  Panel Admin</a>
            //       <div class="dropdown-divider"></div>';
            //     echo '<a class="dropdown-item color-darkTheme fa fa-power-off" href="logout.php">  Keluar</a>
                   
            //     </div>
            //   </li>';
            //   }else{
            //     echo '<a href="daftar.php" style="outline:0;text-decoration: none;">
            //       <div class="navbar-profile navbar-nav color-lightTheme mr-auto">
            //           <span class="name">Masuk/Daftar</span>
            //       </div>
            //   </a>';
            //   }
               ?>
          </div>
        </div>
      </nav>