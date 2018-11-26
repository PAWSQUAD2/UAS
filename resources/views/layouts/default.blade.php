<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
    

    <div id="app" >
        <header>
            @include('includes.header')
        </header>
        <router-view style="min-height: calc( 100vh - 370px ) "></router-view>
        @include('includes.footer')
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script> 
    
    <script src="js/bootstrap-4.0.0.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>
</html>