<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- CONFIGURATION -->

        <!-- Allow web app to be run in full-screen mode. -->
        <meta name="apple-mobile-web-app-capable" content="yes">

        <!-- Make the app title different than the page title. -->
        <meta name="apple-mobile-web-app-title" content="iOS 8 web app">

        <!-- Configure the status bar. -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <!-- Set the viewport. -->
        <meta name="viewport" content="initial-scale=1">

        <!-- Disable automatic phone number detection. -->
        <meta name="format-detection" content="telephone=no">

    <link rel="shortcut icon" type="image/png" href="/img/penguin-png.png"/>
    <title>Penguin Project | Alfa</title>

    {{HTML::style('admin_css/css/bootstrap2.css')}}
    {{HTML::style('admin_css/font-awesome/css/font-awesome.css')}}
    {{HTML::style('admin_css/css/style.css')}}
    {{HTML::style('admin_css/css/style-responsive.css')}}
    {{HTML::style('admin_css/css/datepicker.css')}}
    {{HTML::style('admin_css/css/jquery-ui.css')}}
    {{HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js')}}
    {{HTML::script('http://code.jquery.com/jquery-1.11.0.min.js')}}
    {{HTML::script('admin_js/form-validator/jquery.form-validator.js')}}
    {{HTML::script('admin_js/jquery-ui.min.js')}}
    {{HTML::script('packages/jleach/laravelmce/js/tinymce/tinymce.min.js')}}
    {{HTML::script('//tinymce.cachefly.net/4.1/tinymce.min.js')}}


<script>tinymce.init({selector:'textarea'});</script>

<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>

  <body data-spy="scroll">

    <section id="container">
   <div class="row-fluid back">
    <div class="col-lg-10 col-md-offset-1">

    </div>
    </div>

    <section id="main-content">
      <section class="wrapper site-min-height">

        <div class="row">
            <div class="showback">

                @include('layouts/include/flash') <!-- Visar alla flashmeddelanden som skickas ut av systemet -->

                @yield('content')

            </div>
        </div>

      </section><!--/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <footer>
        <div class="navbar navbar-inverse navbar-fixed-bottom">
            <div class="container">
              	<div class="navbar-header text-center margin-top">
                      <div class="col-xs-4"><a href="/"><i class="fa fa-home fa-3x green"></i></a></div>
                      <div class="col-xs-4"><a href=""><i class="fa fa-home fa-3x green"></i></a></div>
                      <div class="col-xs-4"><a href=""><i class="fa fa-home fa-3x green"></i></a></div>
                </div>

            </div>
        </div>
    </footer>




<!-- js placed at the end of the document so the pages load faster -->
{{HTML::script('admin_js/bootstrap.min.js')}}
{{HTML::script('admin_js/jquery.dcjqaccordion.2.7.js', ['class'=>'include'])}}
{{HTML::script('admin_js/jquery.scrollTo.min.js')}}
{{HTML::script('admin_js/jquery.nicescroll.js')}}
<!--common script for all pages-->
{{HTML::script('admin_js/common-scripts.js')}}
{{HTML::script('admin_js/bootstrap-datepicker.js')}}
<!--script for this page-->
{{HTML::script('admin_js/app.js')}}

<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>

@yield('scripts')

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60693522-1', 'auto');
  ga('send', 'pageview');
</script>


  </body>
</html>