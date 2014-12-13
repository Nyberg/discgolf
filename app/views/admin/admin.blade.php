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

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<style>body{padding-top: 85px;}</style>
<!--
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
     <link href="assets/css/style.css" rel="stylesheet"> -->

  <body data-spy="scroll" data-target=".bs-docs-sidebar" onload="initialize()">

    <section id="container" >
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
              <!--logo start-->
              <a href="/admin" class="logo"><b>Another Awesome Site</b></a>
              <!--logo end-->
              <div class="nav notify-row" id="top_menu">
                  <!--  notification start -->
                  <ul class="nav top-menu">


                  </ul>
                  <!--  notification end -->
              </div>
              <div class="top-menu">
              	<ul class="nav pull-right top-menu">


              	</ul>
              </div>
          </header>
        <!--header end-->

        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            <div id="sidebar"  class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">

                	  <p class="centered"><a href="/admin/user/{{Auth::user()->id}}">
                	  @if(is_null(Auth::user()->image))
                	    <img src="/img/avatar.png" class="img-circle" width="60">
                	  @else

                	   <img src="/img/{{Auth::user()->image}}" class="img-circle" width="60">


                	  @endif
                	   </a></p>
                	  <h5 class="centered">{{Auth::user()->username}}</h5>

                    <li class="mt">
                        <a class="active" href="/admin">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                                            <a href="javascript:;" >
                                                <i class=" fa fa-bar-chart-o"></i>
                                                <span>Statistics</span>
                                            </a>
                                            <ul class="sub">
                                                <li><a  href="morris.html">Morris</a></li>
                                                <li><a  href="chartjs.html">Chartjs</a></li>
                                            </ul>
                                        </li>

                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-bullseye"></i>
                            <span>Discgolf</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="/admin/round/add">Add round</a></li>
                            <li><a  href="/rounds/{{Auth::User()->id}}/user">Your rounds</a></li>
                            <li><a  href="/rounds">All rounds</a></li>
                        </ul>
                    </li>


                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-tree"></i>
                            <span>Courses</span>
                        </a>
                        <ul class="sub">
                        <li><a  href="/course">All Courses</a></li>
                            <li><a  href="blank.html">Find Course</a></li>
                            <li><a  href="/admin/course/add">Add Crouse</a></li>
                            <li><a  href="lock_screen.html">Favorite Courses</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-users"></i>
                            <span>Players</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="form_component.html">Find players</a></li>
                            <li><a  href="/users">All Players</a></li>
                            <li><a  href="/users">Your Friends</a></li>

                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-trophy"></i>
                            <span>Tournaments</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="basic_table.html">Basic Table</a></li>
                            <li><a  href="responsive_table.html">Responsive Table</a></li>
                        </ul>
                    </li>


                     <li class="sub-menu">
                                            <a href="javascript:;" >
                                                <i class="fa fa-cogs"></i>
                                                <span>Settings</span>
                                            </a>
                                            <ul class="sub">
                                                <li><a  href="calendar.html">Your settings</a></li>
                                                <li><a  href="gallery.html">Your profile</a></li>
                                                <li><a  href="todo_list.html">Item 3</a></li>
                                            </ul>
                                        </li>
                    <li class="sub-menu">
                    <a class="logout" href="/logout"><i class="fa fa-sign-out"></i>Logout</a></li>
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->

    @yield('content')

</div>
</div>

@include('layouts/include/footer')

    <!-- js placed at the end of the document so the pages load faster -->
    {{HTML::script('admin_js/jquery.js')}}
    {{HTML::script('admin_js/jquery-1.8.3.min.js')}}
    {{HTML::script('admin_js/bootstrap.min.js')}}
    {{HTML::script('admin_js/jquery.dcjqaccordion.2.7.js', ['class'=>'include'])}}
    {{HTML::script('admin_js/jquery.scrollTo.min.js')}}
    {{HTML::script('admin_js/jquery.nicescroll.js')}}
    {{HTML::script('admin_js/jquery.sparkline.js')}}
    {{HTML::script('admin_js/generate_holes.js')}}


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