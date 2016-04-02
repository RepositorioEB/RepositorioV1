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
            <a class="navbar-brand" href="#">ROVAA</a>      
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="{{ url('/') }}" title="Home"><span class="glyphicon glyphicon-home"></span></span>Inicio</a></li>
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}" title="Ingresar al repositorio">Ingresar</a></li>
                <li><a href="{{ url('/register') }}" title="Registrarse en el repositorio">Registrarse</a></li>
            @else
                @if(Auth::user()->role == 'admin')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admin.users.create') }}" title="NuevoUser">Nuevo</a></li>
                            <li><a href="" title="BuscarUser">Buscar</a></li>
                            <li><a href="{{ route('admin.users.index') }}" title="ListarUser">Lista</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Discapacidad<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admin.profiles.create') }}" title="NuevoProfile">Nuevo</a></li>
                            <li><a href="" title="BuscarProfile">Buscar</a></li>
                            <li><a href="" title="PropiosProfile">Propios</a></li>
                            <li><a href="{{ route('admin.profiles.index') }}" title="ListarProfile">Lista</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Objetos<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admin.ovas.create') }}" title="NuevoOva">Nuevo</a></li>
                            <li><a href="{{ route('admin.ovas.index') }}" title="ListarOva">Lista</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="">Categoría</a>
                                <ul>
                                    <li><a href="{{ route('admin.categories.create') }}" title="NuevoCategory">Nuevo</a></li>
                                    <li><a href="{{ route('admin.categories.index') }}" title="ListarCategory">Lista</a></li>
                                </ul>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" >Tipo</a>
                                <ul>
                                    <li><a href="{{ route('admin.types.create') }}" title="NuevoType">Nuevo</a></li>
                                    <li><a href="{{ route('admin.types.index') }}" title="ListarType">Lista</a></li>
                                </ul>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" >Descargas</a>
                                <ul>
                                    <li><a href="{{ route('admin.downloads.create') }}" title="NuevoDownload">Nuevo</a></li>
                                    <li><a href="{{ route('admin.downloads.index') }}" title="ListarDownload">Lista</a></li>
                                </ul>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="" title="BuscarOva">Buscar</a></li>
                            <li><a href="" title="PropiosOva">Propios</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Foros<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admin.forums.create') }}" title="NuevoForum">Nuevo</a></li>
                            <li><a href="" title="PropiosForum">Propios</a></li>
                            <li><a href="{{ route('admin.forums.index') }}" title="ListarForum">Lista</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ayuda<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admin.helps.create') }}" title="NuevoHelps">Nuevo</a></li>
                            <li><a href="" title="BuscarHelps">Buscar</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" >Problema</a>
                                <ul>
                                    <li><a href="{{ route('admin.problems.create') }}" title="NuevoProblem">Nuevo</a></li>
                                    <li><a href="{{ route('admin.problems.index') }}" title="ListarProblem">Lista</a></li>
                                </ul>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="" title="PropiosHelps">Propios</a></li>
                            <li><a href="{{ route('admin.helps.index') }}" title="ListarHelps">Lista</a></li>
                        </ul>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Objetos<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../../ovas/menu" title="ListaOva">Lista</a></li>
                            <li><a href="" title="SubirOva">Subir</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a title="Busquedas">Busqueda</a>
                                <ul>
                                    <li><a href="" title="BusquedaGeneral">General</a></li>
                                    <li><a href="" title="BusquedaOva">Ovas</a></li>
                                    <li><a href="" title="BusquedaTipo">Tipo</a></li>
                                    <li><a href="" title="BusquedaCategoria">Categoria</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Foros<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('foro.foros_usuarios.index') }}" title="ListarForo">Listar</a></li>
                            <li><a href="" title="NuevoForo">Nuevo</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ayuda<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('member.helps') }}" title="ListarAyuda">Listar</a></li>
                            <li><a href="" title="Problemas">Problema</a></li>
                        </ul>
                    </li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="Nombre de usuario">
                       <img alt="Foto usuario" class="imag-responsive" src="/images/users/{{ Auth::user()->photo }}" width="25" height="25" name="photo" /> {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        
                        <li><a href="{{ route('cuenta.user.index') }}"><i class="glyphicon glyphicon-user" title="Perfil" name="Perfil"></i> Perfil</a></li>
                        <li><a href="{{ route('cuenta.user.edit', \Auth::user()->id) }}"><i class="glyphicon glyphicon-cog" title="Configurar" name="Configurar"></i> Configurar</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out" title="Cerrar sesion" name="Cerrar_sesion"></i>Cerrar sesion</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>