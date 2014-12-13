<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>dg.dev</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Modern Skin for Bootstrap">
    <meta name="author" content="geedmo">


{{ HTML::script('js/functions.js') }}
{{ HTML::script('js/google-code-prettify/prettify.css') }}
{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/bootstrap-responsive.min.css') }}
{{ HTML::style('css/docs.css') }}
{{ HTML::style('css/style.css') }}
<style>body{padding-top: 85px;}</style>
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

          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="/">Home<span class="nav-description">start here</span></a>
              </li>

              <li class="">
                <a href="/">About<span class="nav-description">learn more</span></a>
              </li>

              <li class="">
                <a href="/">Contact<span class="nav-description">get in touch</span></a>
              </li>

              <li class="">
                <a href="/login">Login<span class="nav-description">do it</span></a>
              </li>


             

            </ul>
          </div>
        </div>
      </div>
    </div>


      
@yield('content')



@include('layouts/include/footer')

	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/holder/holder.js') }}
	{{ HTML::script('js/google-code-prettify/prettify.js') }}
	{{ HTML::script('js/application.js') }}

       
    </body>
</html>