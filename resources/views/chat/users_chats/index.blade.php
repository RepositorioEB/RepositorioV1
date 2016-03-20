@extends('layouts.app')

@section('title', 'Chat' )

@section('content')
    {{$_GET['nombredestino']}}
    <br>     
    <br><br>
    <div id="conversation" style="height:200px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">
       <noscript>
        <?php 
        foreach ($users_chats as $user_chat) {
            if (((($user_chat->nameorigen == Auth::user()->username) AND ($user_chat->namedestino == $_GET['nombredestino'])) || (($user_chat->namedestino == Auth::user()->name)AND($user_chat->nameorigen == $_GET['nombredestino'])))) {
                print ("\n");
                print (" <p>  ".$user_chat->nameorigen.": ");
                print ("   ".$user_chat->mensaje."</p>");
                print ("\n");    
            }
         } 
        ?> 
        </noscript>
                                       
    </div>
    {!! Form::open(['route' => ['chat.users_chats.store','nameorigen'=>Auth::user()->username,'namedestino'=>$_GET['nombredestino']],'method' => 'POST']) !!}
    
    <input type="text" placeholder="Mensaje" name="mensaje" size="40">

        <div class="form-group">
            {!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}
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
                    $("#conversation p:first-child").css({"background-color":"lightgreen",
                                                        "padding-botton":"20px"});
                    var altura= $("#conversation").prop("scrollHeight");
                });
            
            }
    </script>
