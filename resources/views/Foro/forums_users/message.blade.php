@extends('layouts.app')

@section('title', 'Foro' )

@section('content')
    <center><h3><legend>NOMBRE DEL FORO: &nbsp; {{$foros->name}}</legend></h3></center> 
    <br>     
    <h4><legend >Características: &nbsp; </legend>{{$foros->characteristic}}</h4> 
    <br><br>
    <h3><label for="opinion" class="label label-primary">Ingrese su comentario: </label></h3>
    <!-- Formulario para enviar mensaje del foro-->
    {!! Form::open(['route' => ['foro.foros_usuarios.store','forum_id'=>$_GET['forum_id'],'user_id'=>Auth::user()->id],'method' => 'POST']) !!}
        <div class="form-group">
            <input type="text" id="opinion" class="form-control" placeholder="Opinion" title="Campo de mensaje" name="message" size="40">
             <br>
             <center>
                {!! Form::submit('Enviar',['title'=>'Enviar comentario','class' => 'btn btn-warning']) !!}
                <a href="{{ route('foro.foros_usuarios.index') }}" class="btn btn btn-warning" title="Cancelar comentar" name="Cancelar">Cancelar</a>
             </center>
        </div>
    {!! Form::close() !!}
    
    <div id="conversation" >  <!-- Mostrar conversacion del foro-->
    <?php
        $x=0;
    ?>
        @foreach ($foros_usuarios as $foro_usuario)
            @if ($foro_usuario->forum_id == $_GET['forum_id'])
                @if($x==0)
                    <div style="border-top: 1px solid black;">
                @endif
                <br>
                <div id="message">
                    <p> <h4>
                    <?php
                        //Condicion si usuario tiene foto
                        if(($foro_usuario->user->photo) == null)
                        {
                            echo "<img alt='Foto".$foro_usuario->id."' src='".asset('images/users/userdefect.png')."' width=50 height=50 >";
                        }else{
                            echo "<img alt='Foto".$foro_usuario->id."' src='".asset('images/users/'.$foro_usuario->user->photo.'')."' width=50 height=50 >";
                        }    
                    ?>
                    <!-- Mostrar foto y nomnre de usuario origen, mensaje a enviar y la fecha-->
                    &nbsp;<div class="label label-danger" name="nombreusuario" alt="2">{{$foro_usuario->user->username}} : <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> </div>&nbsp;{{$foro_usuario->message}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="label label-primary">{{$foro_usuario->created_at}}</div></h4></p>   
                </div>
                @if($x==0)
                    <?php
                        $x=1;
                    ?>
                    </div>
                    <br>
                    <div style="border-top: 1px solid black;">
                    </div>
                @endif
                <br>
            @endif
        @endforeach          
                                       
    </div>
    <div class="text-center">
        <!-- Paginacion del foro
    -->
        {!! $foros_usuarios->appends(array('forum_id' => $_GET['forum_id']))->links()!!}
    </div>
@endsection

