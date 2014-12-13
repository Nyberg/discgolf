@extends('master')

@section('content')

@include('layouts/include/breadcrumb')

<hr/>
    <div class="container"> <!-- Container -->
     <div class="row">
		<div class="span4">
 <!-- Profile Model 3 -->
                <div class="panel">
                  <div class="valign">
                    <div class="text-center cell-1-3" >
                      <img src="/img/me.png" class="img-circle img-polaroid" alt="" style="width: 100px; height: 100px">
                    </div>
                    <div>
                      <p class="lead">Johannes Nyberg</p>
                      <ul class="icons-ul unstyled">
                        <li><em class="icon-fixed-width icon-map-marker"></em> Karlstad, SWEDEN</li>
                        <li><em class="icon-fixed-width icon-twitter"></em> <a href="#">@vonNyberg</a></li>
                        <li><em class="icon-fixed-width icon-envelope"></em> <a href="#">johannes.nyb@gmail.com</a></li>
                      </ul>
                    </div>
                  </div>
                </div>

                    <!-- Profile Model 1 -->
                <div class="panel">
                  <div class="text-center">
                    <p><img src="/img/me.png" class="img-circle img-polaroid" alt=""></p>
                    <br>
                    <h3>Social Media!</h3>
                    <h4 class="muted"><strong>Follow me!</strong></h4>
                    <br>
                    <div class="row-fluid">
                      <div class="span6">
                        <a href="#" class="btn btn-block btn-facebook"><em class="icon-facebook"></em> Like</a>
                      </div>
                      <div class="span6">
                        <a href="#" class="btn btn-block btn-twitter"><em class="icon-twitter"></em> Follow</a>
                      </div>
                    </div>
                  </div>
                </div>

		</div> <!-- Span -->

		<div class="span8">
				<h3 class="text-center">About Johannes Nyberg</h3>
			<p class="text-center">Avid follower of technology. A geek that loves the art and technology behind user-friendly webpages. </p>
			<hr/>


			For the past few years I've been developing several diffrent types of websites. My main focus is on the front-end part. Alot of my work is built with PHP, MySQL, javascript/jQuery and basic HTML5 and CSS3. My vision is to keep my work very clean and responsive, developing pages that will fit for everyone - everywhere.
	<br/><br/>
I almost got a bachelor degree in Interaction Desgin - so alot of my work goes into making websites very user friendly. This is where Mobile First comes into play. When thinking Mobile First I instantly get cleaner and more user friendly websites and reaches a better result in the end.

		</div>

	</div> <!-- Row 1 -->
</div> <!-- Container -->

@stop