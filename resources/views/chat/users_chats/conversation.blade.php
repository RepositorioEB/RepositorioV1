@foreach ($users_chats as $user_chat)
            @if (((($user_chat->nameorigen == Auth::user()->username) AND ($user_chat->namedestino == $_GET['nombredestino'])) || (($user_chat->namedestino == Auth::user()->username)AND($user_chat->nameorigen == $_GET['nombredestino']))))
                
                <div id="message">
                    <p> <h4>
                    <?php
                    foreach ($users as $user)
					{
						if($user_chat->nameorigen == $user->username)
						{
							if(($user->photo) == null)
                			{
                    			echo "<img alt='Foto".$user_chat->id."' src='".asset('images/users/userdefect.png')."' width=50 height=50 >";
                			}else{
                    			echo "<img alt='Foto".$user_chat->id."' src='".asset('images/users/'.$user->photo.'')."' width=50 height=50 >";
                			}
               		
						}	
					}
                    ?> 
                    &nbsp;<div class="label label-danger" name="nombreusuario">{{$user_chat->nameorigen}} : <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> </div>&nbsp;{{$user_chat->mensaje}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="label label-primary">{{$user_chat->created_at}}</div></h4></p>   
                </div>
                <br>
            @endif
@endforeach