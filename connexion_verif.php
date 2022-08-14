<?php session_start();
$_SESSION['id_'] = (int) $_SESSION['id_'];
if($_POST['pseudo'] != '' AND $_POST['pass']!= '')
{

try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ? AND pass = ?');
  $req->execute(array(htmlspecialchars($_POST['pseudo']),sha1($_POST['pass'])));
  $pseudos = $req->fetchAll();
  if(empty($pseudos))
{
	$d=1 ;
}else
{
	foreach ($pseudos as $rep)
	{
		$_SESSION['id_'] = $rep['id'];
		$_SESSION['po'] = $rep['profil'];
	}
	$d=0;
}
$req->closecursor();
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}

	
	if( $d == 1 )
	{
		$_SESSION['verif_connex'] = 1;
	 

    }else
{
	$_SESSION['verif_connex1'] = 1;
	$_SESSION['pseudo'] = $_POST['pseudo'] ;
}
}else
{
	echo 'Vous devez remplir tous les champs.';
}
header('Location: connexion.php');