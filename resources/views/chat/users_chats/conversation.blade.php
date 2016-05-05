<?php
foreach ($users_chats as $user_chat) {
    $mensajes[] = $user_chat;
}
foreach (array_reverse($mensajes) as $mensaje) {
            if (((($mensaje->nameorigen == Auth::user()->username) AND ($mensaje->namedestino == $_GET['nombredestino'])) || (($mensaje->namedestino == Auth::user()->username)AND($mensaje->nameorigen == $_GET['nombredestino']))))
            {    
                echo"<div id='message'>";
                    echo"<p> <h4>";
                    foreach ($users as $user)   
                    {
                        if($mensaje->nameorigen == $user->username)    //Condicion de usuario que va a enciar el mensaje
                        {
                            if(($user->photo) == null)  //Condicion si el usuario tiene foto
                            {
                                echo "<img alt='Foto".$mensaje->id."' src='".asset('images/users/userdefect.png')."' width=50 height=50 >";
                            }else{
                                echo "<img alt='Foto".$mensaje->id."' src='".asset('images/users/'.$user->photo.'')."' width=50 height=50 >";
                            }
                    
                        }   
                    }
                    echo"&nbsp;<div class='label label-danger' name='nombreusuario'>".$mensaje->nameorigen. ": <span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span> </div>&nbsp;".$mensaje->mensaje."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class='label label-primary'>".$mensaje->created_at."</div></h4></p>";   
                echo"</div>";
                echo"<br>";
            }
}
?>
