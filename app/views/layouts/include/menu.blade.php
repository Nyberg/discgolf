

<nav class="navbar navbar-default">

<div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#waddap" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>
          <a href="/" class="margin-top navbar-brand hidden-lg hidden-md"><img src="/img/logo.png" height="30px"/></a>
</div>
				<!-- NAVIGATION LINKS -->
				<div class="navbar-collapse collapse" id="waddap">
					<ul class="nav navbar-nav navbar-right main-navigation hidden-lg hidden-md">

						<li><a href="/">Startsida</a></li>
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Discgolf <span class="caret"></span></a>

						<ul class="dropdown-menu" role="menu">
						    <li><a href="/about/">Om Discgolf</a></li>
                            <li><a href="/rules-discgolf/">Regler Discgolf</a></li>
                            <li><a href="/links/">Länkar</a></li>
						</ul>
						</li>
						<li class="{{ Request::is('round/*','rounds', 'courses', 'course/*') ? 'active' : '' }}">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Rundor & Banor <span class="caret"></span></a>
                                          <ul class="dropdown-menu" role="menu">
                                            <li><a href="/rounds">Alla rundor</a></li>
                                            <li><a href="/records">Alla rekordrundor</a></li>
                                            @if(Auth::check())
                                            <li><a href="/round/start">Lägg till runda</a></li>
                                            @else
                                            @endif
                                            <li><a href="/courses">Alla Banor</a></li>
                                          </ul>
                                        </li>
						<li class="{{ Request::is('users', 'user/*', 'clubs', 'club/*') ? 'active' : '' }}">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Användare & Klubbar <span class="caret"></span></a>
                                          <ul class="dropdown-menu" role="menu">
                                            <li><a href="/users">Alla Användare</a></li>
                                            <li><a href="/clubs">Alla Klubbar</a></li>
                                          </ul>
                                        </li>
						<li><a href="/forum">Forum</a></li>
						@if(Auth::check())
						<li><a href="/dashboard">Dashboard</a></li>
						@else
						@endif
					</ul>
				</div>


    <div id="navbar" class="navbar-collapse collapse col-md-offset-1">

          <ul class="nav navbar-nav menu-padding">

            <li class="navbar-brand" href="/">
            <a href="/">
                <img src="/img/logo.png" height="30px"/>
                </a>
            </li>

                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Startsida</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Discgolf <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="/about/">Om Discgolf</a></li>
                    <li><a href="/rules-discgolf/">Regler Discgolf</a></li>
                    <li class="divider"></li>
                    <li><a href="/links/">Länkar</a></li>
                    <li><a href="/lost-and-found">Lost & Found</a></li>
                    <li><a href="/disc-db">Discdatabas</a></li>
                  </ul>
                </li>

                <li class="{{ Request::is('round/*','rounds', 'courses', 'course/*') ? 'active' : '' }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Rundor & Banor <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                   <li class="dropdown-header">Rundor</li>
                    <li><a href="/rounds">Alla rundor</a></li>
                    <li><a href="/records">Alla rekordrundor</a></li>
                    @if(Auth::check())
                    <li><a href="/account/user/{{Auth::id()}}/rounds">Dina rundor</a></li>
                    <li><a href="/round/start">Lägg till runda</a></li>
                    @else
                    @endif
                    <li class="divider"></li>
                     <li class="dropdown-header">Banor</li>
                    <li><a href="/courses">Alla Banor</a></li>
                    <li class="divider"></li>
                    @if(Auth::check())
                    <li><a href="/statistics">Statistik</a></li>
                    @else
                    <li data-toggle="tooltip" data-placement="left" title="Du måste vara medlem för att kunna besöka denna sidan! Klicka här för mer info."><a href="/membership">Statistik</a></li>
                    @endif
                  </ul>
                </li>

                <li class="{{ Request::is('users', 'user/*', 'clubs', 'club/*') ? 'active' : '' }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Användare & Klubbar <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                   <li class="dropdown-header">Spelare</li>
                    <li><a href="/users">Alla Användare</a></li>
                    <li class="divider"></li>
                     <li class="dropdown-header">Klubbar</li>
                    <li><a href="/clubs">Alla Klubbar</a></li>
                  </ul>
                </li>


                 <li class="{{ Request::is('forum','forum/*') ? 'active' : '' }}"><a href="/forum">Forum</a></li>
          </ul>

        <ul class="nav navbar-nav navbar-right pull-right col-lg-offset-right-1">
                @if(Auth::user())
                <li>
                    <a href="/account/user/{{Auth::id()}}/compare" id="compareCart">
                    <span class="fa fa-binoculars">
                    <span class="badge badge-compare"></span>
                    </span>
                    </a></li>
                @else
                @endif
                @if(Auth::user())
                <li class="dropdown">
                    <a href="#" class="" id="notification" data-toggle="dropdown">
                    <span class="fa fa-bell"> </span>
                    <span class="badge badge-notify"></span>  </a>
                    <ul class="dropdown-menu" id="notificationMenu">

                    </ul>
                </li>
                      <li class="{{ Request::is('account/*', 'admin/*', 'admin', 'dashboard') ? 'active' : '' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                       {{Auth::user()->first_name}} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="/dashboard">Dashboard</a></li>
                          <li class="divider"></li>
                           <li class="dropdown-header">Inställningar</li>
                          <li><a  href="/account/edit/{{Auth::user()->id}}/user">Redigera Profil/Inställningar</a></li>

                          <li class="divider"></li>
                          <li class="dropdown-header">Discgolf</li>
                          <li><a href="/round/start">Lägg till Runda</a></li>
                             @if(Auth::user())
                              <li><a  href="/account/rounds/{{Auth::User()->id}}/user">Dina Rundor</a></li>
                              @else

                              @endif
                                <li class="divider"></li>
                            <li class="dropdown-header">Bag</li>
                             <li><a href="/account/user/{{Auth::user()->id}}/bags">Din Bag</a></li>
                             <li class="divider"></li>

                             @if(Auth::user()->hasRole('Admin'))

                              <li><a href="/admin">Adminpanel</a></li>
                                 <li class="divider"></li>
                             @else
                             @endif
                             @if(Auth::user())
                                 <li><a class="logout" href="/logout"></i>Logga ut</a></li>
                             @endif
                        </ul>
                      </li>
                            @else
                                <li><a class="logout" href="/login"></i>Logga in</a></li>
                            @endif
                    <li>
                      </li>
                       @if(Auth::user())

                      <li>
                          <a href="/user/{{Auth::user()->id}}/show" style="padding-top: 10px; margin-top: 10px; margin-bottom: -5px">
                          <img alt="Brand" src="{{Auth::user()->image}}" width="30px" height="30px" class="img-circle"/>
                          </a>
                      </li>

                      @else

                          <li>
                            <a href="/alfa">Registrera</a>
                    </li>
                @endif



        </ul>
        </ul>
            </div>
      </div>

</div>
</nav>