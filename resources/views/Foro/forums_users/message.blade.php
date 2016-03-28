@extends('layouts.app')

@section('title', 'Foro' )

@section('content')
    <center><h3><label class="label label-info">NOMBRE DEL FORO: </label>&nbsp; {{$foros->name}}</h3></center> 
    <br>     
    <br><br>
    <h3>Ingrese su comentario: </h3>
    {!! Form::open(['route' => ['foro.foros_usuarios.store','forum_id'=>$_GET['forum_id'],'user_id'=>$_GET['user_id']],'method' => 'POST']) !!}
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Opinion" title="Campo de mensaje" name="message" size="40">
             <br>
             <center>
                {!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}
                <a href="{{ route('foro.foros_usuarios.index') }}" class="btn btn btn-primary" title="Cancelar" name="Cancelar">Cancelar</a>
             </center>
        </div>
    {!! Form::close() !!}
    
    <div id="conversation" >
        @foreach ($foros_usuarios as $foro_usuario)
            @if ($foro_usuario->forum_id == $_GET['forum_id'])
                <div id="message">
                    <p> <h4><img alt="Foto" src="{{ asset('images/logos.png') }}" width=50 height=50 title="Foto">&nbsp;<label class="label label-danger" name="nombreusuario" alt="2">{{$foro_usuario->user->name}} : <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> </label>&nbsp;{{$foro_usuario->message}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label label-primary">{{$foro_usuario->created_at}}</label></h4></p>   
                </div>
                <br>
            @endif
        @endforeach          
                                       
    </div>
    <div class="text-center">
        {!! $foros_usuarios->appends(array('forum_id' => $_GET['forum_id'],'user_id' => $_GET['user_id']))->links()!!}
    </div>
@endsection

