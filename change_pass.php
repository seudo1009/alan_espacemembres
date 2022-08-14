<?php session_start();
if($_POST['pass'] != '' AND $_POST['pass_nouv']!= '' AND $_POST['pass_confirm'] != '')
{

try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
  $req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
  $req->execute(array($_SESSION['pseudo']));
  $membres =$req->fetchAll();
  foreach ($membres as $membre)
  {
     if( sha1($_POST['pass']) != $membre['pass'])
	 {
		$pass = 0;
	 }else
	 {
		 $pass=1;
	 }
  }
$req->closecursor();
	
	if(($_POST['pass_nouv'] != $_POST['pass_confirm']) OR $pass == 0)
	{
	 if($_POST['pass_nouv'] != $_POST['pass_confirm'])
	 {
		$_SESSION['pass_nouv_confirm'] = 1;
	 }
	 if($pass == 0)
	 {
		$_SESSION['anc_pass_verif'] = 1;
	 }

}else
{
	$req = $bdd->prepare('UPDATE membres SET pass = :pass WHERE pseudo = :pseudo ');
	$req->execute(array(
	'pass' => sha1($_POST['pass_nouv']),
	'pseudo' => $_SESSION['pseudo'],
	 ));
	$_SESSION['pass_modify']=1;
}
}
header('Location: pass_modify.php');