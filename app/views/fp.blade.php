<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->
    <meta name="description" content="">
    <meta name="author" content="Johannes Nyberg">
    <meta name="keyword" content="">
        <link rel="shortcut icon" type="image/png" href="/img/penguin-png.png"/>
    <title>Penguin Project | Alfa</title>

{{HTML::style('front/css/bootstrap.min.css')}}
{{HTML::style('front/css/colors/green.css')}}
{{HTML::style('front/css/nivo_themes/default/default.css')}}
{{HTML::style('front/css/owl.theme.css')}}
{{HTML::style('front/css/owl.carousel.css')}}
{{HTML::style('front/css/nivo-lightbox.css')}}
{{HTML::style('front/css/styles.css')}}
{{HTML::style('front/assets/ionicons/ionicons.css')}}
{{HTML::style('front/assets/elegant-icons/style.css')}}
{{HTML::style('front/css/responsive.css')}}


<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
<![endif]-->

<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<body data-spy="scroll">

@yield('content')

@yield('scripts')

<!-- =========================
     SCRIPTS
============================== -->

{{HTML::script('front/js/jquery.min.js')}}

<script>

    /* =================================
       LOADER
    =================================== */
    // makes sure the whole site is loaded
    jQuery(window).load(function() {
        "use strict";
            // will first fade out the loading animation
        jQuery(".status").fadeOut();
            // will fade out the whole DIV that covers the website.
        jQuery(".preloader").delay(1000).fadeOut("slow");
    })

</script>

{{HTML::script('front/js/bootstrap.min.js')}}
{{HTML::script('front/js/retina-1.1.0.min.js')}}
{{HTML::script('front/js/smoothscroll.js')}}
{{HTML::script('front/js/jquery.scrollTo.min.js')}}
{{HTML::script('front/js/jquery.localScroll.min.js')}}
{{HTML::script('front/js/owl.carousel.min.js')}}
{{HTML::script('front/js//nivo-lightbox.min.js')}}
{{HTML::script('front/js/simple-expand.min.js')}}
{{HTML::script('front/js/jquery.nav.js')}}
{{HTML::script('front/js/jquery.fitvids.js')}}
{{HTML::script('front/js/jquery.ajaxchimp.min.js')}}
{{HTML::script('front/js/custom.js')}}

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