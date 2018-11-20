<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
    <header>
        @include('includes.header')
    </header>
<div class="container-fluid" >

    

    @yield('content')
   
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