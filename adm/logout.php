<?php
	if (isset($_SESSION))
	{
		session_start();
		$_SESSION = array();
		//Elimina os dados da sess�o
		session_unregister($_SESSION['codigo']);
		session_unregister($_SESSION['usuario']);
		//Encerra a sess�o
		session_destroy();		
	}

?>	