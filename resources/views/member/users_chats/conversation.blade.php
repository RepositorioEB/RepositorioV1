<?php
		foreach ($users_chats as $user_chat) {
			if (((($user_chat->nameorigen == Auth::user()->username) AND ($user_chat->namedestino == $_GET['nombredestino'])) || (($user_chat->namedestino == Auth::user()->username)AND($user_chat->nameorigen == $_GET['nombredestino'])))) {
				echo("\n");
				echo("<p>   ".$user_chat->nameorigen.": ");
				echo("   ".$user_chat->mensaje)."</p>";
				echo("\n");	
			}
			
		 } 	
?>
