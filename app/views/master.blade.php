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
{{ HTML::script('packages/jleach/laravelmce/js/tinymce/tinymce.min.js') }}

<script>
tinymce.init({
    selector: "textarea"
});
</script>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<style>body{padding-top: 85px;}</style>
<!--
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
     <link href="assets/css/style.css" rel="stylesheet"> -->

  <body data-spy="scroll" data-target=".bs-docs-sidebar" onload="initialize()">

    <section id="container" >

    @include('layouts/include/menu')

          <section id="main-content">
              <section class="wrapper site-min-height">

              	<div class="row mt">
              		<div class="col-lg-12">
              		<div class="showback">

              		 @include('layouts/include/flash')

                    @yield('content')

                  		</div>
                  	</div>
                  	</div>

        		</section><! --/wrapper -->
              </section><!-- /MAIN CONTENT -->

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

@section('scripts')

<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to Dashgum!',
            // (string | mandatory) the text inside the notification
            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
            // (string | optional) the image to display on the left
            image: 'assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>

	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });


        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }

        </script>

@stop

  </body>
</html>