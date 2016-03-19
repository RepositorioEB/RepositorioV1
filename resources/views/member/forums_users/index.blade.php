@extends('layouts.app')

@section('title', 'Foro' )

@section('content')
    <label>Nombre del foro: </label> {{$foros->name}}
    <br>     
    <br><br>
    {!! Form::open(['route' => ['member.foros_usuarios.store','forum_id'=>$_GET['forum_id'],'user_id'=>$_GET['user_id']],'method' => 'POST']) !!}
        <div class="form-group">
            <input type="text" name="message" size="40">
             {!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
    
    <div id="conversation" style="height:800px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">
        <?php 
        foreach ($foros_usuarios as $foro_usuario) {
            if ($foro_usuario->forum_id == $_GET['forum_id']) {
                print ("\n");
                print (" <p>  ".$foro_usuario->user->name.": ");
                print ("   ".$foro_usuario->message."</p>");
                print ("\n");    
            }
         }          
        ?> 
                                       
    </div>
    <div class="text-center">
        {!! $foros_usuarios->appends(array('forum_id' => $_GET['forum_id'],'user_id' => $_GET['user_id']))->links()!!}
    </div>
@endsection
