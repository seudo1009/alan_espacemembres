<?php session_start();  
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Inscription</title>
<link href="style.css" rel="stylesheet" />
<link rel="stylesheet" media="screen and (max-width:980px)" href="style_2.css" />
<meta charset="utf-8" />
</head>
<body>
 <h1> Inscription </h1>
 <div class="page">
 <?php 
     if( $_SESSION['verif'] != 1)
  {
     if($_SESSION['pseudo_verif'] == 1)
	 {
		 $_SESSION['pseudo_verif'] = 0;
		 echo '<span style ="color:red">Le pseudo que vous avez choisi est déjà utilisé, choisissez-en un autre.</span><br /> ';
	 }
	 if($_SESSION['pass_verif'] == 1)
	 {
		 $_SESSION['pass_verif'] = 0;
		 echo '<span style ="color:red">Les mots de passe ne correspondent pas.</span><br /> ';
	 }
	 if($_SESSION['pass_verif_'] == 1)
	 {
		 $_SESSION['pass_verif_'] = 0;
		 echo '<span style ="color:red"> Le mot de passe doit compter au moins 8 caractères ! </span><br /> ';
	 }
  ?>
 <form method="post" action="inscription_verif.php"> 
    <p> Choisissez un pseudo (peut être votre prénom) : </p>
	<input type="text" name="pseudo"/>
	<p> Choisissez un mot de passe (d'au moins 8 caractères): </p>
	<input type="password" name="pass"/>
	<p> Confirmer le mot de passe : </p>
	<input type="password" name="pass_confirm"/>
	<br />
	<br />
	<input type="submit"  class="bouton" value="S'inscrire"/>
 </form>
 <br />
  <a href ="index.php"> Retour </a>
 <?php 
  }else
   {
	   $_SESSION['verif'] = 0;
	    mail('sejoawalan@gmail.com','Inscriptions', 'Un nouveau membre inscrit : '.$_SESSION ['pseudo'].'!');
	   $_SESSION['verif'] = 0;
?>  
   <p> Vous avez bien été inscrit .</p>
  <div class="lien_">
   <a href ="accueil.php"> Continuer </a> </div> 
<?php 
}
 ?>
 </div>
</body>
</html>
