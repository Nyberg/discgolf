<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Johannes Nyberg">
    <meta name="keyword" content="">

{{HTML::style('admin_css/css/bootstrap2.css')}}
{{HTML::style('admin_css/font-awesome/css/font-awesome.css')}}
{{HTML::style('admin_js/gritter/css/jquery.gritter.css')}}
{{HTML::style('admin_css/lineicons/style.css')}}
{{HTML::style('admin_css/css/style.css')}}
{{HTML::style('admin_css/css/style-responsive.css')}}
{{HTML::style('admin_css/css/datepicker.css')}}
{{HTML::style('admin_css/css/jquery-ui.css')}}
{{HTML::style('admin_css/css/morris.css')}}
{{HTML::style('admin_css/css/ekko-lightbox.css')}}
{{HTML::style('admin_css/css/ekko-lightbox.min.css')}}
{{HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js')}}
{{HTML::script('http://code.jquery.com/jquery-1.11.0.min.js')}}
{{HTML::script('admin_js/form-validator/jquery.form-validator.js')}}

{{HTML::script('admin_js/Chart.js')}}
{{HTML::script('admin_js/Chart.min.js')}}
{{HTML::script('admin_js/jquery-1.11.0.min.js')}}
{{HTML::script('admin_js/jquery.mixitup.js')}}
{{HTML::script('admin_js/ekko-lightbox.js')}}
{{HTML::script('admin_js/ekko-lightbox.min.js')}}
{{HTML::script('admin_js/jquery-ui.min.js')}}
{{HTML::script('packages/jleach/laravelmce/js/tinymce/tinymce.min.js')}}
{{HTML::script('//tinymce.cachefly.net/4.1/tinymce.min.js')}}
{{HTML::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyCMaFerIs2B3QmhCTjer-s1x_8THiBDYSs')}}


<script type="text/javascript">

function initialize() {

    document.getElementById('lat').style.display = 'none';
    document.getElementById('long').style.display = 'none';

    var long = document.getElementById('long').textContent;
    var lat = document.getElementById('lat').textContent;

    var myLatlng = new google.maps.LatLng(long, lat);
    var mapOptions = {
        zoom: 10,
        center: myLatlng
        }
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
    });
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>

<script>tinymce.init({selector:'textarea'});</script>

<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>

  <body data-spy="scroll">

    <section id="container">
   <div class="row-fluid back">
    <div class="col-lg-10 col-md-offset-1">
    <!-- <a class="navbar-brand" href="/"> -->
   <!-- <img src="/img/logo.png" class="col-md-offset-1"/> -->
   <!-- </a> -->
    </div>
    </div>


<div id="affix" data-spy="affix" data-offset-top="20" data-offset-bottom="200">
    @include('layouts/include/menu')
</div>
    <section id="main-content">
      <section class="wrapper site-min-height">

        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
            <div class="showback">

                @include('layouts/include/flash') <!-- Visar alla flashmeddelanden som skickas ut av systemet -->

                @yield('content')

            </div>
            </div>
        </div>

      </section><!--/wrapper -->
    </section><!-- /MAIN CONTENT -->

<footer class="site-footer">

    @include('layouts/include/footer')

</footer>

<!-- js placed at the end of the document so the pages load faster -->
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
{{HTML::script('admin_js/app.js')}}
{{HTML::script('admin_js/round/lost.js')}}
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>

@yield('scripts')

<script>
    $('#auto').autocomplete({
        source: '/query',
        minLength: 1
    });

        $('#getPlayer').autocomplete({
            source: '/getplayer',
            minLength: 1
        });
</script>

<script type="text/javascript">
      /*   $(document).ready(function () {
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
        }); */
	</script>
<script type="application/javascript">

    $('#myAffix').affix({
      offset: {
        top: 100,
        bottom: function () {
          return (this.bottom = $('.footer').outerHeight(true))
        }
      }
    })

     /* $(document).ready(function () {
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
*/
        </script>

  </body>
</html>