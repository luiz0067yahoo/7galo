<?php
	if (isset($_SESSION))
	{
		session_start();
		$_SESSION = array();
		//Elimina os dados da sessão
		session_unregister($_SESSION['codigo']);
		session_unregister($_SESSION['usuario']);
		//Encerra a sessão
		session_destroy();		
	}

?>	