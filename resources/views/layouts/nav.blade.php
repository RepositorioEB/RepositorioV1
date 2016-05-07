<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img alt="Universidad Distrital"  class="admin-logo-nav" src="{{ asset('images/logos.png') }}" width=75 height=75></img>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <a class="navbar-brand" href="{{url('rovaa')}}">ROVAA</a>      
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="{{ url('/') }}" title="Home"><span class="glyphicon glyphicon-home"></span></span>Inicio</a></li>
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}" title="Ingresar al repositorio">Ingresar</a></li>
                <li><a href="{{ url('/register') }}" title="Registrarse en el repositorio">Registrarse</a></li>
            @else
                @if(Auth::user()->role == 'admin')   <!-- Condicion administrador-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admin.users.create') }}" title="Nuevo Usuario">Nuevo</a></li>
                            <li><a href="{{ route('admin.users.index') }}" title="Listar Usuarios">Listar</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Discapacidad<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admin.profiles.create') }}" title="Nueva Discapacidad">Nueva</a></li>
                            <li><a href="{{ route('admin.profiles.index') }}" title="Listar Discapacidades">Listar</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Objetos<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admin.ovas.create') }}" title="Nuevo OVA">Nuevo</a></li>
                            <li><a href="{{ route('admin.ovas.index') }}" title="Listar OVAS">Listar</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="">Categorías</a>
                                <ul>
                                    <li><a href="{{ route('admin.categories.create') }}" title="Nueva Categoría">Nueva</a></li>
                                    <li><a href="{{ route('admin.categories.index') }}" title="Listar Categoría">Listar</a></li>
                                </ul>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a>Tipo</a>
                                <ul>
                                    <li><a href="{{ route('admin.types.create') }}" title="Nuevo Tipo">Nuevo</a></li>
                                    <li><a href="{{ route('admin.types.index') }}" title="Listar Tipos">Listar</a></li>
                                </ul>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a>Descargas</a>
                                <ul>
                                    <li><a href="{{ route('admin.downloads.index') }}" title="Listar Descargas">Listar</a></li>
                                </ul>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('ovas.own.index') }}" title="OVAS Propios">Propios</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Foros<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admin.forums.create') }}" title="Nuevo Foro">Nuevo</a></li>
                            <li><a href="{{ route('admin.forums.index') }}" title="Listar Foros">Listar</a></li>
                            <li><a href="{{ route('foro.own.index') }}" title="Foros Propios">Propios</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ayudas<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admin.helps.create') }}" title="Nueva Ayuda">Nueva</a></li>
                            <li><a href="{{ route('admin.helps.index') }}" title="Listar Ayudas">Listar</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a>Problemas</a>
                                <ul>
                                    <li><a href="{{ route('admin.problems.create') }}" title="Nuevo Problema">Nuevo</a></li>
                                    <li><a href="{{ route('admin.problems.index') }}" title="Listar Problemas">Listar</a></li>
                                </ul>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('helps.own.index') }}" title="Ayudas Propias">Propias</a></li>
                        </ul>
                    </li>
                @else  <!-- Condicion cliente-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Objetos<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('ovas.ovamember.create')}}" title="Subir Ova">Subir</a></li>
                            <li><a href="{{route('ovas.menu')}}" title="Listar OVAS">Listar</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a title="Buscar OVA">Búsqueda</a>
                                <ul>
                                    <li><a href="{{route('ovas.ova.index')}}" title="Búsqueda General">General</a></li>
                                    <li><a href="{{route('ovas.alls')}}" title="Búsqueda Ova">Ovas</a></li>
                                    <li><a href="{{ route('ovas.type.index') }}" title="Búsqueda Tipo">Tipo</a></li>
                                    <li><a href="{{ route('ovas.category.index') }}" title="Búsqueda Categoría">Categoría</a></li>
                                </ul>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('ovas.own.index') }}" title="OVAS Propios">Propios</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Foros<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('member.forums.create') }}" title="Nuevo Foro">Nuevo</a></li>
                            <li><a href="{{ route('foro.foros_usuarios.index') }}" title="Listar Foros">Listar</a></li>
                            <li><a href="{{ route('foro.own.index') }}" title="Foros Propios">Propios</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ayudas<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('helps.list') }}" title="Listar Ayudas">Listar</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Problemas<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('member.problems.create')}}" title="Nuevo Problema">Nuevo</a></li>
                            <li><a href="{{route('member.problems.index')}}" title="Problemas propios">Propios</a></li>
                        </ul>
                    </li>
                @endif
                <li class="dropdown">
                    <!-- Mostrar foto y nombre usuario-->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="Nombre de usuario">
                       <img alt="Foto usuario" class="imag-responsive" src="{{asset('images/users/'.Auth::user()->photo.'')}}" width="25" height="25" name="photo" /> {{ ucwords(Auth::user()->name) }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        
                        <li><a href="{{ route('cuenta.user.index') }}"><i class="glyphicon glyphicon-user" title="Perfíl Usuario" name="Perfíl"></i> Perfíl</a></li>
                        <li><a href="{{ route('cuenta.user.edit', \Auth::user()->id) }}"><i class="glyphicon glyphicon-cog" title="Configurar Usuario" name="Configurar"></i> Configurar</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out" title="Cerrar sesión Usuario" name="Cerrar_sesion"></i>Cerrar sesión</a></li>
                    </ul>
                </li>
            @endif
        </ul> 
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>