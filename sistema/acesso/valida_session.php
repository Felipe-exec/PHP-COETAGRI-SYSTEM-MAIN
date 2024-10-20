
<?php
session_start();
 
if ( !isset($_SESSION['email']) and !isset($_SESSION['perfil']) and !isset($_SESSION['status'])) {
    unset ($_SESSION['email']);
    unset ($_SESSION['perfil']);
	unset ($_SESSION['status']);
	
    session_destroy();
 
    header ("Location: ../../index.php");
	die();
}


?>