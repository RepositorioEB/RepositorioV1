@extends('layouts.app')

@section('title', 'Chat' )

@section('content')
    <h3><legend>Contacto: {{$_GET['nombredestino']}}</legend></h3>
    <br><br>
    <div id="conversation">
       <noscript>
        <?php 
        foreach ($users_chats as $user_chat) {
            if (((($user_chat->nameorigen == Auth::user()->username) AND ($user_chat->namedestino == $_GET['nombredestino'])) || (($user_chat->namedestino == Auth::user()->username)AND($user_chat->nameorigen == $_GET['nombredestino'])))) {
                echo "<br>";
                echo "<div id='message'>";
                echo "<p> <h4>";
                foreach ($users as $user)
                {
                    if($user_chat->nameorigen == $user->username)
                    {
                        if(($user->photo) == null)
                        {
                            echo "<img alt='Foto' src='".asset('images/users/userdefect.png')."' width=50 height=50 >";
                        }else{
                            echo "<img alt='Foto' src='".asset('images/users/'.$user->photo.'')."' width=50 height=50 >";
                        }
                    
                    }   
                }
                    
                echo "&nbsp;<div class='label label-danger' name='nombreusuario' alt='2'>$user_chat->nameorigen : <span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span> </div>&nbsp;$user_chat->mensaje&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class='label label-primary'>$user_chat->created_at</div></h4></p>";   
                echo "</div>";
                echo "<br>";  
            }
        } 
        ?> 
        </noscript>
                                       
    </div>
    {!! Form::open(['route' => ['chat.users_chats.store','nameorigen'=>Auth::user()->username,'namedestino'=>$_GET['nombredestino']],'method' => 'POST']) !!}
    <br>
    <label class="label label-primary" for="mensaje">Ingrese el mensaje: </label>
    <input type="text" placeholder="Mensaje" id="mensaje" class="form-control"  name="mensaje" size="40">
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
