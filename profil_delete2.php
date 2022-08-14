<?php session_start();
 $_SESSION['profil_delete']=0;
if(isset($_POST['case1']) OR isset($_POST['case2']) OR isset($_POST['case3']) OR isset($_POST['case4'])OR isset($_POST['case5']) )
{
	try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
	if(isset($_POST['case1']))
	{
		$req = $bdd->prepare('UPDATE membres SET email = \'\' WHERE pseudo = ? ');
        $req->execute(array($_SESSION['pseudo']));
	    $req->closecursor();
	}
	if(isset($_POST['case2']))
	{
		$req = $bdd->prepare('UPDATE membres SET passion = \'\' WHERE pseudo = ? ');
        $req->execute(array($_SESSION['pseudo']));
	    $req->closecursor();
	}
	if(isset($_POST['case3']))
	{
		$req = $bdd->prepare('UPDATE membres SET propos = \'\' WHERE pseudo = ? ');
        $req->execute(array($_SESSION['pseudo']));
	    $req->closecursor();
	}
	if(isset($_POST['case4']))
	{
		$req = $bdd->prepare('UPDATE membres SET profil = \'\' WHERE pseudo = ? ');
        $req->execute(array($_SESSION['pseudo']));
	    $req->closecursor();
	}
	if(isset($_POST['case5']))
	{
		$req = $bdd->prepare('UPDATE membres SET date_naissance = \'\' WHERE pseudo = ? ');
        $req->execute(array($_SESSION['pseudo']));
	    $req->closecursor();
	}
}
$_SESSION['profil_update']=0;

 header('Location: profil_.php');