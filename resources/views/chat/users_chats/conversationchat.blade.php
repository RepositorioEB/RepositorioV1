@extends('layouts.app')

@section('title', 'Chat' )

@section('content')
    <h3>Contacto: <label class="label label-info">{{$_GET['nombredestino']}}</label></h3>
    <br><br>
    <div id="conversation" style="
        background: rgba(11,75,91,1);
        background: -moz-linear-gradient(45deg, rgba(11,75,91,1) 0%, rgba(13,93,108,1) 35%, rgba(13,95,110,0.92) 39%, rgba(13,92,107,0.78) 46%, rgba(11,75,91,0.96) 82%, rgba(11,75,91,1) 90%);
        background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(11,75,91,1)), color-stop(35%, rgba(13,93,108,1)), color-stop(39%, rgba(13,95,110,0.92)), color-stop(46%, rgba(13,92,107,0.78)), color-stop(82%, rgba(11,75,91,0.96)), color-stop(90%, rgba(11,75,91,1)));
        background: -webkit-linear-gradient(45deg, rgba(11,75,91,1) 0%, rgba(13,93,108,1) 35%, rgba(13,95,110,0.92) 39%, rgba(13,92,107,0.78) 46%, rgba(11,75,91,0.96) 82%, rgba(11,75,91,1) 90%);
        background: -o-linear-gradient(45deg, rgba(11,75,91,1) 0%, rgba(13,93,108,1) 35%, rgba(13,95,110,0.92) 39%, rgba(13,92,107,0.78) 46%, rgba(11,75,91,0.96) 82%, rgba(11,75,91,1) 90%);
        background: -ms-linear-gradient(45deg, rgba(11,75,91,1) 0%, rgba(13,93,108,1) 35%, rgba(13,95,110,0.92) 39%, rgba(13,92,107,0.78) 46%, rgba(11,75,91,0.96) 82%, rgba(11,75,91,1) 90%);
        background: linear-gradient(45deg, rgba(11,75,91,1) 0%, rgba(13,93,108,1) 35%, rgba(13,95,110,0.92) 39%, rgba(13,92,107,0.78) 46%, rgba(11,75,91,0.96) 82%, rgba(11,75,91,1) 90%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0b4b5b', endColorstr='#0b4b5b', GradientType=1 );
        height:200px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 13px; overflow-x: hidden;">
       <noscript>
        <?php 
        foreach ($users_chats as $user_chat) {
            if (((($user_chat->nameorigen == Auth::user()->username) AND ($user_chat->namedestino == $_GET['nombredestino'])) || (($user_chat->namedestino == Auth::user()->username)AND($user_chat->nameorigen == $_GET['nombredestino'])))) {
                echo "<br>";
                echo "<div style='background: white; color: black; border: 1px solid #CCCCCC; padding: 12px; overflow-x: hidden; border-radius: 79px 28px 64px 29px; -moz-border-radius: 79px 28px 64px 29px;-webkit-border-radius: 79px 28px 64px 29px; border: 0px solid #000000;'>";
                echo "<p> <h4><img alt='Foto' src='../../images/logos.png' width=50 height=50 title='Foto'>&nbsp;<label class='label label-danger' name='nombreusuario' alt='2'>$user_chat->nameorigen : <span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span> </label>&nbsp;$user_chat->mensaje&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class='label label-primary'>$user_chat->created_at</label></h4></p>";   
                echo "</div>";
                echo "<br>";  
            }
        } 
        ?> 
        </noscript>
                                       
    </div>
    {!! Form::open(['route' => ['chat.users_chats.store','nameorigen'=>Auth::user()->username,'namedestino'=>$_GET['nombredestino']],'method' => 'POST']) !!}
    <br>
    <input type="text" placeholder="Mensaje" class="form-control" title="Mensaje" name="mensaje" size="40">
    <br>
        <div class="form-group">
            <center>{!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}</center>
        </div>
    {!! Form::close() !!}
        
    <noscript>
        <div class="text-center">
            {!! $users_chats->appends(array('nombredestino' => $_GET['nombredestino']))->links()!!}
        </div>
    </noscript>
@endsection

        
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>     
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script>
            $(document).on("ready", function(){             
                $.ajaxSetup({"cache":false});
                setInterval("loadOldMessages()",500);
            });
            
            var loadOldMessages = function (){
                $.ajax({
                    type: "GET",
                    url: "/chat/llamando?nombredestino={{$_GET['nombredestino']}}"
                }).done(function(info){
                    $("#conversation").html(info);
                    $("#conversation p:first-child").css({"background-color":"black",
                                                        "padding-botton":"20px"});
                    var altura= $("#conversation").prop("scrollHeight");
                });
            
            }
    </script>
