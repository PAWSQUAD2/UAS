<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
    <header>
        @include('includes.header')
    </header>
<div class="container-fluid no-v-pad" >

    <div class="row p-x-10 pad-t-60px">
        <div class="container profile-container mar-t-20px">
            <div class="absolute-ppbg" style="overflow:hidden;">
                <img class="sampul" src="images/sampul.jpg" alt="pp">
            </div>
            <div class="row">
                <div class="col-xl-12 no-padding">
                    <div class="profile-header-container p-x-5 pad-t-60px editor-container">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    @include('includes.footer')
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script> 
    <script src="js/bootstrap-4.0.0.js"></script>
</body>
</html>