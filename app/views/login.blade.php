<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
        <link rel="shortcut icon" type="image/png" href="/img/penguin-png.png"/>
        <title>Penguin Project | Alfa</title>

{{HTML::style('admin_css/css/bootstrap.css')}}
{{HTML::style('admin_css/font-awesome/css/font-awesome.css')}}
{{HTML::style('admin_js/gritter/css/jquery.gritter.css')}}
{{HTML::style('admin_css/css/style.css')}}
{{HTML::style('admin_css/css/style-responsive.css')}}
{{HTML::script('js/jquery-1.11.0.min.js')}}
{{HTML::script('admin_js/form-validator/jquery.form-validator.js')}}


<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>

<style>body{padding-top: 125px;}</style>

<!--
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
     <link href="assets/css/style.css" rel="stylesheet"> -->
    </head>
  <body data-spy="scroll" data-target=".bs-docs-sidebar" onload="">



    @yield('content')

    <!-- js placed at the end of the document so the pages load faster -->
    {{HTML::script('admin_js/jquery.js')}}
    {{HTML::script('admin_js/jquery-1.8.3.min.js')}}
    {{HTML::script('admin_js/bootstrap.min.js')}}
    {{HTML::script('admin_js/jquery.dcjqaccordion.2.7.js', ['class'=>'include'])}}
    {{HTML::script('admin_js/jquery.scrollTo.min.js')}}
    {{HTML::script('admin_js/jquery.nicescroll.js')}}
    {{HTML::script('admin_js/jquery.sparkline.js')}}



    <!--common script for all pages-->
    {{HTML::script('admin_js/common-scripts.js')}}

    {{HTML::script('admin_js/gritter/js/jquery.gritter.js')}}
    {{HTML::script('admin_js/gritter-conf.js')}}

    {{HTML::script('admin_js/jquery.backstretch.min.js')}}


  @yield('scripts')
     <script>
                 $.backstretch("../img/bg-johannes.jpg", {speed: 500});
     </script>
  </body>
</html>