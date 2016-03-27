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
                <li><a href="{{ url('/') }}" title="Inicio"><span class="glyphicon glyphicon-home"></span></a></li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}" title="Ingresar">Ingresar</a></li>
                    <li><a href="{{ url('/register') }}" title="Registrarse">Registrarse</a></li>
                @else
                    @if(Auth::user()->role == 'admin')
                        <li><a href="{{ route('admin.users.index') }}" >Usuarios<span class="caret"></span></a>
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
                        <li><a href="{{ route('admin.profiles.index') }}" >Perfiles<span class="caret"></span></a>
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
                        <li><a href="{{ route('admin.ovas.index') }}" >Objetos<span class="caret"></span></a>
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
                        <li><a href="{{ route('admin.forums.index') }}" >Foros<span class="caret"></span></a>
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
                        <li><a href="{{ route('admin.helps.index') }}" >Ayuda<span class="caret"></span></a>
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
                        <li><a href="{{ route('admin.categories.index') }}" >Categoria<span class="caret"></span></a>
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
                        <li><a href="{{ route('admin.types.index') }}" >Tipo<span class="caret"></span></a>
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
                        <li><a href="{{ route('admin.downloads.index') }}" >Descargas<span class="caret"></span></a>
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
                        <li><a href="{{ route('admin.problems.index') }}" >Problema<span class="caret"></span></a>
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
                    @else
                        <li><a href="{{ route('ovas.ova.index') }}" >Objetos<span class="caret"></span></a>
                            <ul>
                                <li><a href="">Subir</a></li>
                                <li><a href="">Lista</a></li>
                                <li><a href="">Busqueda</a>
                                    <ul>
                                        <li><a href="">General</a></li>
                                        <li><a href="">Ovas</a></li>
                                        <li><a href="">Tipo</a></li>
                                        <li><a href="">Categoria</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ route('foro.foros_usuarios.index') }}" >Foros<span class="caret"></span></a>
                            <ul>
                                <li><a href="">Crear</a></li>
                                <li><a href="">Lista</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('member.helps') }}" >Ayuda<span class="caret"></span></a>
                            <ul>
                                <li><a href="{{ route('member.helps') }}">Lista</a></li>
                                <li><a href="">Problema</a></li>
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