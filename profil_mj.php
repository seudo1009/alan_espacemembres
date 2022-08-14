<?php session_start();
if($_POST['pseudo'] != '' OR $_POST['email'] != '' OR (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0) OR $_POST['passion'] != '' OR $_POST['date_naissance'] != '' OR $_POST['propos'] != '')
{
	if(!isset($_FILES['monfichier']) OR $_FILES['monfichier']['error'] != 0)
	{
		$_SESSION['photo'] = 1;
	}else
	{
		if($_FILES['monfichier']['size'] <= 1000000) 
	 {
		 $infofich = pathinfo($_FILES['monfichier']['name']);
		 $ext = $infofich['extension']; 
		 $ext_auto = array ('jpeg','png','jpg'); 
		 if(in_array($ext,$ext_auto)) 
		 {
			 $_SESSION['ext']=$ext;
			 move_uploaded_file($_FILES['monfichier']['tmp_name'], 'avatar/'.$_SESSION['id_'].'.'.$_SESSION['ext']);
			 include_once('redim.php');
			 $ph= 1;
		 }else
		 {
			 $_SESSION['photo'] = 1;
		 }
	 }else
		 {
			 $_SESSION['photo'] = 1;
		 }
	}
	if ($_POST['email']!='')
   {
      $_POST['mail'] = htmlspecialchars($_POST['mail']);
     if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['email']))
     {
        $email = $_POST['email'];
		$em = 1;
     }
     else
     {
		$_SESSION['email'] = 1;
		$em=0;
     }
   }else{
	   $em=0;
   }
   if ($_POST['pseudo']!='')
   {
	   $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
  $req->execute(array($_POST['pseudo']));
  $pseudos = $req->fetchAll();
    if(empty($pseudos) OR $_SESSION['pseudo'] == $_POST['pseudo'])
  {
	   $pseudo = $_POST['pseudo'] ;
	   $_SESSION['pseudo'] = $_POST['pseudo'];
	   
	   $ps = 1;
}else
{
	
	$ps = 0;
	 $_SESSION['pseudo_truc'] = 1;
}
	   
   }else
   {
	   $ps = 0;
   }
   if ($_POST['passion']!='' AND strlen($_POST['passion'])<= 255)
   {
	   $passion = $_POST['passion'] ;
	   $pas = 1;
   }else
   {
	    if ( strlen($_POST['passion'])>255)
   {
	   $_SESSION['passion'] = 1;
   }
	   $pas = 0;
   }
   if ($_POST['propos'] != ''AND strlen($_POST['propos'])<=100)
   {
	   $propos = nl2br ($_POST['propos']) ;
	   $prop = 1;
   }else
   {
	    if ( strlen($_POST['propos'])>100)
   {
	   $_SESSION['propos'] = 1;
   }
	   $prop = 0;
   }
   if ($_POST['date_naissance']!='')
   {
	    if (preg_match("#^[0-2]{0,1}[0-9]/0{0,1}[0-9]/[1-2][0-9][0-9][0-9]$#",$_POST['date_naissance']) OR preg_match("#^3[0-1]/1[1-2]/[1-2][0-9][0-9][0-9]$#",$_POST['date_naissance']) )
     {
        $date = $_POST['date_naissance'];
		$da = 1;
     }else
	 {
		  $_SESSION['date'] = 1;
	 }
	    
   }else{
	   $da = 0;
   }

try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  if($ps==1)
  {
	  $req = $bdd->prepare('UPDATE membres SET pseudo = ? WHERE id = ? ');
      $req->execute(array($pseudo,$_SESSION['id_']));
	  $req->closecursor();
  }
   if($em==1)
  {
	  $req = $bdd->prepare('UPDATE membres SET email = ? WHERE id = ? ');
      $req->execute(array($email,$_SESSION['id_']));
	  $req->closecursor();
  }
  if($pas==1)
  {
	  $req = $bdd->prepare('UPDATE membres SET passion = ? WHERE id = ? ');
      $req->execute(array($passion,$_SESSION['id_']));
	  $req->closecursor();
  }
  if($prop==1)
  {
	  $req = $bdd->prepare('UPDATE membres SET propos = ? WHERE id = ? ');
      $req->execute(array($propos,$_SESSION['id_']));
	  $req->closecursor();
  }
  if($da==1)
  {
	  $req = $bdd->prepare('UPDATE membres SET date_naissance = ? WHERE id = ? ');
      $req->execute(array($date,$_SESSION['id_']));
	  $req->closecursor();
  }
   if($ph==1)
  {
	  $req = $bdd->prepare('UPDATE membres SET profil = ? WHERE id = ? ');
      $req->execute(array(''.$_SESSION['id_'].'.'.$_SESSION['ext'].'',$_SESSION['id_']));
	  $req->closecursor();
  }

}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}

}
$_SESSION['profil_update']=0;
header('Location: profil_.php');