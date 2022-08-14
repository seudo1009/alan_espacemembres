<?php session_start();
if($_SESSION['pseudo'] == $_POST['pseudo'])
{
	$_SESSION['pseudo_recherche3'] = 1;
}else {
	$_SESSION['pseudo_recherche'] = $_POST['pseudo'];
	$_SESSION['pseudo_recherche2'] = 1;
}
header('Location: recherche.php');