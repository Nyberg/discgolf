<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

{{HTML::style('admin_css/css/bootstrap.css')}}
{{HTML::style('admin_css/font-awesome/css/font-awesome.css')}}
{{HTML::style('admin_css/css/zabuto_calendar.css')}}
{{HTML::style('admin_js/gritter/css/jquery.gritter.css')}}
{{HTML::style('admin_css/lineicons/style.css')}}
{{HTML::style('admin_css/css/style.css')}}
{{HTML::style('admin_css/css/style-responsive.css')}}
{{HTML::style('admin_css/css/datepicker.css')}}
{{HTML::style('css/lightbox.css')}}
{{HTML::script('js/jquery-1.11.0.min.js')}}
{{HTML::script('js/lightbox.min.js')}}
{{HTML::script('admin_js/chart-master/Chart.js')}}
    {{HTML::script('admin_js/mf.js')}}

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<style>body{padding-top: 85px;}</style>

<!--
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
     <link href="assets/css/style.css" rel="stylesheet"> -->
    </head>
  <body data-spy="scroll" data-target=".bs-docs-sidebar" onload="initialize()">



    @yield('content')



@include('layouts/include/footer')

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
    {{HTML::script('admin_js/bootstrap-datepicker.js')}}

    <!--script for this page-->
    {{HTML::script('admin_js/sparkline-chart.js')}}
    {{HTML::script('admin_js/zabuto_calendar.js')}}
    {{HTML::script('admin_js/jquery.backstretch.min.js')}}



  </body>
</html>