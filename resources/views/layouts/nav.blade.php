<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
        <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
      
        <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                 <li><a href="{{ url('/') }}" title="Inicio">Inicio</a></li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}" title="Ingresar">Ingresar</a></li>
                    <li><a href="{{ url('/register') }}" title="Registrarse">Registrarse</a></li>
                @else
                    <!-- Authentication Links
                    @if(Auth::user()->role == 'admin')
                        <li><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
                        <li><a href="{{ route('admin.profiles.index') }}">Perfiles</a></li>
                        <li><a href="#">Objetos</a></li>
                        <li><a href="#">Foros</a></li>
                        <li><a href="#">Ayuda</a></li>
                    @else
                    @endif
                     -->
                    <li><a href="{{ route('admin.users.index') }}" title="Usuarios">Usuarios</a>
                        <ul>
                            <li><a href="" title="Submenu1">Submenu1</a></li>
                            <li><a href="">Submenu2</a></li>
                            <li><a href="">Submenu3</a></li>
                            <li><a href="">Submenu4</a>
                                <ul>
                                    <li><a href="">Submenu1</a></li>
                                    <li><a href="">Submenu2</a></li>
                                    <li><a href="">Submenu3</a></li>
                                    <li><a href="">Submenu4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('admin.profiles.index') }}" title="Perfiles">Perfiles</a>
                        <ul>
                            <li><a href="">Submenu1</a></li>
                            <li><a href="">Submenu2</a></li>
                            <li><a href="">Submenu3</a></li>
                            <li><a href="">Submenu4</a>
                                <ul>
                                    <li><a href="">Submenu1</a></li>
                                    <li><a href="">Submenu2</a></li>
                                    <li><a href="">Submenu3</a></li>
                                    <li><a href="">Submenu4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('admin.ovas.index') }}" title="Objetos">Objetos</a>
                        <ul>
                            <li><a href="">Submenu1</a></li>
                            <li><a href="">Submenu2</a></li>
                            <li><a href="">Submenu3</a></li>
                            <li><a href="">Submenu4</a>
                                <ul>
                                    <li><a href="">Submenu1</a></li>
                                    <li><a href="">Submenu2</a></li>
                                    <li><a href="">Submenu3</a></li>
                                    <li><a href="">Submenu4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('admin.forums.index') }}" title="Foros">Foros</a>
                        <ul>
                            <li><a href="">Submenu1</a></li>
                            <li><a href="">Submenu2</a></li>
                            <li><a href="">Submenu3</a></li>
                            <li><a href="">Submenu4</a>
                                <ul>
                                    <li><a href="">Submenu1</a></li>
                                    <li><a href="">Submenu2</a></li>
                                    <li><a href="">Submenu3</a></li>
                                    <li><a href="">Submenu4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('admin.helps.index') }}" title="Ayuda">Ayuda</a>
                        <ul>
                            <li><a href="">Submenu1</a></li>
                            <li><a href="">Submenu2</a></li>
                            <li><a href="">Submenu3</a></li>
                            <li><a href="">Submenu4</a>
                                <ul>
                                    <li><a href="">Submenu1</a></li>
                                    <li><a href="">Submenu2</a></li>
                                    <li><a href="">Submenu3</a></li>
                                    <li><a href="">Submenu4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('admin.categories.index') }}" title="Categoria">Categoria</a>
                        <ul>
                            <li><a href="">Submenu1</a></li>
                            <li><a href="">Submenu2</a></li>
                            <li><a href="">Submenu3</a></li>
                            <li><a href="">Submenu4</a>
                                <ul>
                                    <li><a href="">Submenu1</a></li>
                                    <li><a href="">Submenu2</a></li>
                                    <li><a href="">Submenu3</a></li>
                                    <li><a href="">Submenu4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('admin.types.index') }}" title="Tipo">Tipo</a>
                        <ul>
                            <li><a href="">Submenu1</a></li>
                            <li><a href="">Submenu2</a></li>
                            <li><a href="">Submenu3</a></li>
                            <li><a href="">Submenu4</a>
                                <ul>
                                    <li><a href="">Submenu1</a></li>
                                    <li><a href="">Submenu2</a></li>
                                    <li><a href="">Submenu3</a></li>
                                    <li><a href="">Submenu4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('admin.downloads.index') }}" title="Descargas">Descargas</a>
                        <ul>
                            <li><a href="">Submenu1</a></li>
                            <li><a href="">Submenu2</a></li>
                            <li><a href="">Submenu3</a></li>
                            <li><a href="">Submenu4</a>
                                <ul>
                                    <li><a href="">Submenu1</a></li>
                                    <li><a href="">Submenu2</a></li>
                                    <li><a href="">Submenu3</a></li>
                                    <li><a href="">Submenu4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('admin.problems.index') }}" title="Problema">Problema</a>
                        <ul>
                            <li><a href="">Submenu1</a></li>
                            <li><a href="">Submenu2</a></li>
                            <li><a href="">Submenu3</a></li>
                            <li><a href="">Submenu4</a>
                                <ul>
                                    <li><a href="">Submenu1</a></li>
                                    <li><a href="">Submenu2</a></li>
                                    <li><a href="">Submenu3</a></li>
                                    <li><a href="">Submenu4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="Nombre de usuario">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out" title="Cerrar sesion"></i>Cerrar sesion</a></li>
                        </ul>
                    </li>
                @endif
            </ul>

      <ul class="nav navbar-nav navbar-left">
        <img alt="Universidad Distrital"  class="admin-logo-nav" src="{{ asset('images/logos.png') }}" width=120 height=120></img>
      </ul>
      <ul class="nav navbar-nav navbar-left">
        <div> <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ROVAA </h1></div>
      </ul>
        </div>
    </div>
</nav>