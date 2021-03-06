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

    <meta name="description" content="">
    <meta name="author" content="Johannes Nyberg">
    <meta name="keyword" content="">
    <link rel="shortcut icon" type="image/png" href="/img/penguin-png.png"/>
    <title>Penguin Project | Alfa</title>

    {{HTML::style('admin_css/css/bootstrap2.css')}}
    {{HTML::style('admin_css/font-awesome/css/font-awesome.css')}}
    {{HTML::style('admin_css/lineicons/style.css')}}
    {{HTML::style('admin_css/css/style.css')}}
    {{HTML::style('admin_css/css/style-responsive.css')}}
    {{HTML::style('admin_css/css/datepicker.css')}}
    {{HTML::style('admin_css/css/flexslider.css')}}
    {{HTML::style('admin_css/css/owl/owl.theme.css')}}
    {{HTML::style('admin_css/css/owl/owl.carousel.css')}}
    {{HTML::style('admin_css/css/owl/owl.transitions.css')}}
    {{HTML::style('admin_css/css/jquery-ui.css')}}
    {{HTML::style('admin_css/css/ekko-lightbox.css')}}
    {{HTML::style('admin_css/css/ekko-lightbox.min.css')}}
    {{HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js')}}
    {{HTML::script('http://code.jquery.com/jquery-1.11.0.min.js')}}
    {{HTML::script('admin_js/form-validator/jquery.form-validator.js')}}
    {{HTML::script('admin_js/jquery.mixitup.js')}}
    {{HTML::script('admin_js/ekko-lightbox.js')}}
    {{HTML::script('admin_js/ekko-lightbox.min.js')}}
    {{HTML::script('admin_js/jquery-ui.min.js')}}
    {{HTML::script('admin_js/jquery.flexslider.js')}}
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

  <div id="fb-root"></div>

    <section id="container">
   <div class="row-fluid back">
    <div class="col-lg-10 col-md-offset-1">

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
<!--common script for all pages-->
{{HTML::script('admin_js/common-scripts.js')}}
{{HTML::script('admin_js/bootstrap-datepicker.js')}}
<!--script for this page-->
{{HTML::script('admin_js/app.js')}}
{{HTML::script('admin_js/round/lost.js')}}
{{HTML::script('admin_js/notifications/notiser.js')}}
{{HTML::script('admin_js/compare/compare.js')}}

<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>

@yield('scripts')

@if(Auth::check())
<script>
    $(document).ready(function() {
        getCompareNumber();
    });
</script>
@else
@endif

<script>



    $('#auto').autocomplete({
        source: '/query',
        minLength: 2
    });

    $('#getPlayer').autocomplete({
        source: '/getplayer',
        minLength: 1
    });

    $('#myAffix').affix({
      offset: {
        top: 100,
        bottom: function () {
          return (this.bottom = $('.footer').outerHeight(true))
        }
      }
    })

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60693522-1', 'auto');
  ga('send', 'pageview');
</script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
        pausePlay: true,
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

    <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/sv_SE/sdk.js#xfbml=1&version=v2.3&appId=294606220556376";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

  </body>
</html>