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
                <li><a href="{{ url('/') }}" title="Inicio"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}" title="Ingresar">Ingresar</a></li>
                    <li><a href="{{ url('/register') }}" title="Registrarse">Registrarse</a></li>
                @else
                    @if(Auth::user()->role == 'admin')
                        <li><a href="#" >Usuarios<span class="caret"></span></a>
                            <ul>
                                <li><a href="{{ route('admin.users.create') }}" title="RegistrarUser">Registrar</a></li>
                                <li><a href="" title="BuscarUser">Buscar</a></li>
                                <li><a href="{{ route('admin.users.index') }}" title="ListarUser">Lista</a></li>
                            </ul>
                        </li>
                        <li><a href="#" >Discapacidad<span class="caret"></span></a>
                            <ul>
                                <li><a href="{{ route('admin.profiles.create') }}" title="RegistrarProfile">Registrar</a></li>
                                <li><a href="" title="BuscarProfile">Buscar</a></li>
                                <li><a href="" title="PropiosProfile">Propios</a></li>
                                <li><a href="{{ route('admin.profiles.index') }}" title="ListarProfile">Lista</a></li>
                            </ul>
                        </li>
                        <li><a href="#" >Objetos<span class="caret"></span></a>
                            <ul>
                                <li><a href="{{ route('admin.ovas.create') }}" title="RegistrarOva">Registrar</a></li>
                                <li><a href="" title="BuscarOva">Buscar</a></li>
                                <li><a href="" title="PropiosOva">Propios</a></li>
                                <li><a href="{{ route('admin.ovas.index') }}" title="ListarOva">Lista</a></li>
                                <li><a href="">Categoría</a>
                                    <ul>
                                        <li><a href="{{ route('admin.categories.create') }}" title="RegistrarCategory">Registrar</a></li>
                                        <li><a href="{{ route('admin.categories.index') }}" title="ListarCategory">Lista</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" >Tipo</a>
                                    <ul>
                                        <li><a href="{{ route('admin.types.create') }}" title="RegistrarType">Registrar</a></li>
                                        <li><a href="{{ route('admin.types.index') }}" title="ListarType">Lista</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" >Descargas</a>
                                    <ul>
                                        <li><a href="{{ route('admin.downloads.create') }}" title="RegistrarDownload">Registrar</a></li>
                                        <li><a href="{{ route('admin.downloads.index') }}" title="ListarDownload">Lista</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#" >Foros<span class="caret"></span></a>
                            <ul>
                                <li><a href="{{ route('admin.forums.create') }}" title="RegistrarForum">Registrar</a></li>
                                <li><a href="" title="PropiosForum">Propios</a></li>
                                <li><a href="{{ route('admin.forums.index') }}" title="ListarForum">Lista</a></li>
                            </ul>
                        </li>
                        <li><a href="#" >Ayuda<span class="caret"></span></a>
                            <ul>
                                <li><a href="{{ route('admin.helps.create') }}" title="RegistrarHelps">Registrar</a></li>
                                <li><a href="" title="BuscarHelps">Buscar</a></li>
                                <li><a href="" title="PropiosHelps">Propios</a></li>
                                <li><a href="{{ route('admin.helps.index') }}" title="ListarHelps">Lista</a></li>
                                <li><a href="#" >Problema</a>
                                    <ul>
                                        <li><a href="{{ route('admin.problems.create') }}" title="RegistrarProblem">Registrar</a></li>
                                        <li><a href="{{ route('admin.problems.index') }}" title="ListarProblem">Lista</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li><a href="../../ovas/menu" title="Objetos">Objetos<span class="caret"></span></a>
                            <ul>
                                <li><a href="" title="SubirOva">Subir</a></li>
                                <li><a href="" title="Busquedas">Busqueda</a>
                                    <ul>
                                        <li><a href="" title="BusquedaGeneral">General</a></li>
                                        <li><a href="" title="BusquedaOva">Ovas</a></li>
                                        <li><a href="" title="BusquedaTipo">Tipo</a></li>
                                        <li><a href="" title="BusquedaCategoria">Categoria</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ route('foro.foros_usuarios.index') }}" >Foros<span class="caret"></span></a>
                            <ul>
                                <li><a href="" title="RegistrarForo">Registrar</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('member.helps') }}" >Ayuda<span class="caret"></span></a>
                            <ul>
                                <li><a href="" title="Problemas">Problema</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="Nombre de usuario">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            
                            <li><a href="{{ route('cuenta.user.index') }}"><i class="glyphicon glyphicon-user" title="Perfil" name="Perfil"></i> Perfil</a></li>
                            <li><a href="{{ route('cuenta.user.edit', \Auth::user()->id) }}"><i class="glyphicon glyphicon-cog" title="Configurar" name="Configurar"></i> Configurar</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out" title="Cerrar sesion" name="Cerrar_sesion"></i>Cerrar sesion</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <img alt="Universidad Distrital"  class="admin-logo-nav" src="{{ asset('images/logos.png') }}" width=100 height=100></img>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <div> <h3>ROVAA</h3></div>
            </ul>
        </div>
    </div>
</nav>