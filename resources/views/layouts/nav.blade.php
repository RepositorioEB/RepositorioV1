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
      <ul class="nav navbar-nav navbar-left">
        <img alt="Universidad Distrital"  class="admin-logo-nav" src="{{ asset('images/logos.png') }}" width=180 height=60></img>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </ul>
      <ul class="nav navbar-nav navbar-left">
          <h2>ROVAA</h2>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Ingresar</a></li>
                    <li><a href="{{ url('/register') }}">Registrarse</a></li>
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
                    <li><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
                    <li><a href="{{ route('admin.profiles.index') }}">Perfiles</a></li>
                    <li><a href="{{ route('admin.ovas.index') }}">Objetos</a></li>
                    <li><a href="{{ route('admin.forums.index') }}">Foros</a></li>
                    <li><a href="{{ route('admin.helps.index') }}">Ayuda</a></li>
                    <li><a href="{{ route('admin.categories.index') }}">Categoria</a></li>
                    <li><a href="{{ route('admin.types.index') }}">Tipo</a></li>
                    <li><a href="{{ route('admin.downloads.index') }}">Descargas</a></li>
                    <li><a href="{{ route('admin.problems.index') }}">Problema</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar sesion</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>