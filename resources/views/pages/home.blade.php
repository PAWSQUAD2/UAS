@extends('layouts.default')
@section('content')
    
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
		          <p>Acara Perpisahaan & Ulang Tahun para fosil</p>
	            </div>
	          </div>
	      </div>
	      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
        </div>
    </div>
@stop