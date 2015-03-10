

<nav class="navbar navbar-default">

<div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>

    <div id="navbar" class="navbar-collapse collapse col-md-offset-1">

          <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Startsida</a></li>
                <li class="{{ Request::is('/dashboard') ? 'active' : '' }}"><a href="/dashboard">Dashboard</a></li>

                <li class="{{ Request::is('round/*','rounds') ? 'active' : '' }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Rundor<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                          <li><a  href="/account/round/add">Lägg till runda</a></li>
                          <li><a  href="/account/rounds/{{Auth::id()}}/user">Hantera dina rundor</a></li>
                  </ul>
                </li>

                <li class="{{ Request::is('users', 'user/*', 'clubs', 'club/*') ? 'active' : '' }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bag <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                     <li><a  href="/account/user/{{Auth::id()}}/bags">Hantera dina bags</a></li>
                     <li><a  href="/account/user/{{Auth::id()}}/lost-and-found">Lost & Found</a></li>
                  </ul>
                </li>

                <li class="{{ Request::is('users', 'user/*', 'clubs', 'club/*') ? 'active' : '' }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Recensioner <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                          <li><a  href="/account/review/add">Skriv en recension</a></li>
                          <li><a  href="/account/review/user">Hantera dina recensioner</a></li>
                  </ul>
                </li>

                <li class="{{ Request::is('users', 'user/*', 'clubs', 'club/*') ? 'active' : '' }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Kommentarer <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                        <li><a  href="/account/comment/user/">Hantera dina kommentarer</a></li>
                  </ul>
                </li>

                @if(Auth::user()->hasRole('Premium'))

                <li class="{{ Request::is('users', 'user/*', 'clubs', 'club/*') ? 'active' : '' }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sponsorer <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                          <li><a  href="/account/sponsor/add">Lägg till en sponsor</a></li>
                          <li><a  href="/account/sponsor/user">Hantera dina sponsorer</a></li>
                  </ul>
                </li>
                @else
                @endif

          </ul>

        <ul class="nav navbar-nav navbar-right pull-right col-lg-offset-right-1">
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
                          <li><a  href="/account/user/password/">Byt lösenord</a></li>

                          <li class="divider"></li>
                          <li class="dropdown-header">Discgolf</li>
                          <li><a href="/account/round/add">Lägg till Runda</a></li>
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
                            <a href="/registration">Registrera</a>
                    </li>

                       <ul class="nav pull-right top-menu">

                                                           {{Form::open(['route' => 'searchresult', 'method' => 'GET', 'class' => 'navbar-form navbar-left'])}}
                                                         <div class="input-group">
                                                                  <input type="text" class="form-control input-sm" name="auto" id="auto" placeholder="Search Course">

                                                              <span class="input-group-btn">
                                                                   {{Form::submit('Search Course', ['class' => 'btn btn-primary btn-sm'])}}

                                                             {{Form::close()}}
                                                              </span>
                                                          </div>
                                                          </ul>


                @endif



        </ul>
        </ul>
            </div>
      </div>

</div>
</nav>
