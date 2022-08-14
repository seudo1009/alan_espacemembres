<?php session_start();
$_SESSION['pageb'] = 0;
if(preg_match("#.+[a-zA-Z0-9]#",$_POST['post']))
{
	if(!isset($_FILES['monfichier']) OR $_FILES['monfichier']['error'] != 0)
	{
		$ph=0;
	}else
	{
		if($_FILES['monfichier']['size'] <= 5000000) 
	 {
		 $infofich = pathinfo($_FILES['monfichier']['name']);
		 $ext = $infofich['extension']; 
		 $ext_auto = array ('jpeg','png','jpg','gif','mp4','webm','ogv','mp3','ogg'); 
		 if(in_array($ext,$ext_auto)) 
		 {
              $jour = date('d');
              $mois = date('m');
              $annee = date('Y');
              $heure = date('H');
              $minute = date('i');
              $second = date('s');
			 $date = $jour.'_'.$mois.'_'.$annee.'-'.$heure.'_'.$minute.'_'.$second;
			 $nom = $_SESSION['id_'].'_'.$date.'.'.$ext;
			 $extension = $ext ;
			 move_uploaded_file($_FILES['monfichier']['tmp_name'], 'posts/'.$nom);
			 $ph= 1;
			 $ext_img = array ('jpeg','png','jpg'); 
			 if(in_array($extension,$ext_img))
	         {
				 include_once('redim_pub.php');
			 }
		 }else
		 {
			$_SESSION['post_support'] = 1;
		 }
	 }else
		 {
			$_SESSION['post_support'] = 1;
		 }
	}
   if ($_POST['post']!= '')
   {
	   $post = $_POST['post'] ;
	   $ps = 1;
   }else
   {
	   $ps = 0;
   }

try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  if($ps==1)
  {
	  $req = $bdd->prepare('INSERT INTO publications (id_membre,contenu,date_post) VALUES (:id,:contenu,NOW())');
	  $req->execute(array(
		'id' => $_SESSION ['id_'],
	'contenu' => htmlspecialchars($_POST['post'])
	 ));
	  $req->closecursor();
	  $req = $bdd->prepare('SELECT id_post FROM publications WHERE date_post = NOW() OR contenu = :contenu');
	  $req->execute(array('contenu' => htmlspecialchars($_POST['post'])));
	  $post_nouv = $req->fetchAll();
	  $req->closecursor();
	  foreach ($post_nouv as $rep)
	  {
		  $id_pub = $rep['id_post'];
	  }
  }
   if($ph==1)
  {
	  
	  $req = $bdd->prepare('INSERT INTO post_support (id_poster,nom,ext) VALUES (:id,:nom,:ext)');
	  $req->execute(array(
	  'id' => $id_pub,
	 'nom' => $nom,
	  'ext' => $extension,
	 ));
	  $req->closecursor();
  }

}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}

}
$_SESSION['publi_deci']=0;
 header('Location: page_.php');