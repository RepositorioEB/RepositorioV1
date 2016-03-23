@foreach ($users_chats as $user_chat)
            @if (((($user_chat->nameorigen == Auth::user()->username) AND ($user_chat->namedestino == $_GET['nombredestino'])) || (($user_chat->namedestino == Auth::user()->username)AND($user_chat->nameorigen == $_GET['nombredestino']))))
                <div style="
background: rgba(26,126,219,1);
background: -moz-linear-gradient(45deg, rgba(26,126,219,1) 0%, rgba(22,99,187,1) 100%);
background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(26,126,219,1)), color-stop(100%, rgba(22,99,187,1)));
background: -webkit-linear-gradient(45deg, rgba(26,126,219,1) 0%, rgba(22,99,187,1) 100%);
background: -o-linear-gradient(45deg, rgba(26,126,219,1) 0%, rgba(22,99,187,1) 100%);
background: -ms-linear-gradient(45deg, rgba(26,126,219,1) 0%, rgba(22,99,187,1) 100%);
background: linear-gradient(45deg, rgba(26,126,219,1) 0%, rgba(22,99,187,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1a7edb', endColorstr='#1663bb', GradientType=1 );
                 border: 1px solid #CCCCCC; padding: 12px; overflow-x: hidden; border-radius: 79px 28px 64px 29px; -moz-border-radius: 79px 28px 64px 29px;-webkit-border-radius: 79px 28px 64px 29px; border: 0px solid #000000;">
                    <p> <h4><img alt="Foto" src="{{ asset('images/logos.png') }}" width=50 height=50 title="Foto">&nbsp;<label class="label label-danger" name="nombreusuario" alt="2">{{$user_chat->nameorigen}} : <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> </label>&nbsp;{{$user_chat->mensaje}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label label-primary">{{$user_chat->created_at}}</label></h4></p>   
                </div>
                <br>
            @endif
@endforeach