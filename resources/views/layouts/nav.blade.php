<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Roa
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Pagina principal</a></li>
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