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

    {{HTML::style('http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.13.0/css/semantic.min.css')}}
    {{HTML::style('//fonts.googleapis.com/css?family=Open+Sans:400,700,300&subset=latin,vietnamese')}}
    {{HTML::style('sem/semantic.css')}}
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
    {{HTML::script('sem/semantic.js')}}

<script>tinymce.init({selector:'textarea'});</script>

<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>

  <body data-spy="scroll">

      <div class="ui grid">
          <div class="computer tablet only row">
              <div class="ui inverted fixed menu navbar page grid">
                  <a href="" class="brand item">Project Name</a>
                  <a href="" class="active item">Home</a>
                  <a href="" class="item">About</a>
                  <a href="" class="item">Contact</a>
                  <a class="ui dropdown item">Dropdown
                    <i class="dropdown icon"></i>
                    <div class="menu">
                      <div class="item">Action</div>
                      <div class="item">Another action</div>
                      <div class="item">Something else here</div>
                      <div class="ui divider"></div>
                      <div class="item">Seperated link</div>
                      <div class="item">One more seperated link</div>
                    </div>
                  </a>
              </div>
          </div>
          <div class="mobile only row">
              <div class="ui fixed inverted navbar menu">
                  <a href="" class="brand item">Project Name</a>
                  <div class="right menu open">
                      <a href="" class="menu item">
                          <i class="reorder icon"></i>
                      </a>
                  </div>
              </div>
              <div class="ui vertical navbar menu">
                  <a href="" class="active item">Home</a>
                  <a href="" class="item">About</a>
                  <a href="" class="item">Contact</a>
                  <div class="ui item">
                      <div class="text">Dropdown</div>
                      <div class="menu">
                          <a class="item">Action</a>
                          <a class="item">Another action</a>
                          <a class="item">Something else here</a>
                          <a class="ui aider"></a>
                          <a class="item">Seperated link</a>
                          <a class="item">One more seperated link</a>
                        </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="ui page grid main">
          <div class="row">
              <div class="column padding-reset">
                  <div class="ui large message">

                  </div>
              </div>
          </div>
      </div>

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

<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>

@yield('scripts')

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