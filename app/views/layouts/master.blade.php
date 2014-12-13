<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Johannes Nyberg - web developer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Modern Skin for Bootstrap">
    <meta name="author" content="geedmo">


{{ HTML::script('js/functions.js') }}
{{ HTML::script('js/google-code-prettify/prettify.css') }}
{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/bootstrap-responsive.min.css') }}
{{ HTML::style('css/docs.css') }}
{{ HTML::style('css/style.css') }}

<!-- 
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
     <link href="assets/css/style.css" rel="stylesheet"> -->

  <body data-spy="scroll" data-target=".bs-docs-sidebar" class="clear-outline">

 	    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top navbar-big">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.html">johannes nyberg<span class="nav-description">web developer</span></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="./index.html">Home<span class="nav-description">start here</span></a>
              </li>
              <li class="">
                <a href="./extents.html">Extents<span class="nav-description">Whats up doc?</span></a>
              </li>
              <li class=""><a href="./uikit.html">UI <span class="nav-description">Kit</span></a> </a></li>
              <li class="">
                <a href="./base-css.html">Base CSS<span class="nav-description">Fundamental</span></a>
              </li>
              <li class="">
                <a href="./components.html">Components<span class="nav-description">all you need</span></a>
              </li>
              <li class="">
                <a href="./javascript.html">JavaScript<span class="nav-description">a kind of magic</span></a>
              </li>
              <li>
              <a href="./discgolf.html">Discgolf<span class="nav-description">proness</span></a>
             

            </ul>
          </div>
        </div>
      </div>
    </div>
    
     <div class="container"> <!-- Container -->
     
     	@yield('content')
     
     </div>


	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/holder/holder.js') }}
	{{ HTML::script('js/google-code-prettify/prettify.js') }}
	{{ HTML::script('js/application.js') }}

       
    </body>
</html>