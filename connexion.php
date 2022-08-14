<?php session_start();  
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Connexion</title>
<meta charset="utf-8" />
<link href="style.css" rel="stylesheet" />
<link rel="stylesheet" media="screen and (max-width:980px)" href="style_2.css" />
</head>
<body>
 <h1> Connexion </h1>
 <div class="page">
 <?php 
     if( $_SESSION['verif_connex1'] == 0 )
  {
	  if($_SESSION['verif_connex'] == 1 )
	  {
		  echo '<span style ="color:red"> Mauvais identifiant ou mot de passe.</span><br /> ';
	      $_SESSION['verif_connex'] = 0;
	  }
  ?>
 <form method="post" action="connexion_verif.php"> 
    <p> Entrez votre pseudo : </p>
	<input type="text" name="pseudo"/>
	<p> Entrez votre mot de passe : </p>
	<input type="password" name="pass"/>
	<br />
	<br />
	<input type="submit"  class="bouton" value="Se connecter"/>
 </form> <br />
 
 <a href ="index.php"> Retour </a>
 <?php 
  }else
   {
	   $_SESSION['verif_connex1'] = 0 ;
?>  
   <p> Bienvenue <strong><?php  echo $_SESSION['pseudo']?> </strong>.</p>
   
   <div class="nom_espace_">  <?php
 if($_SESSION['po']=="")
 {
?>  
 <div class="photo" style="background:url('avatar/ico.jpg')">  </div> <br />
 <?php 
 } else
 {
?> 
<div class="photo" style="background:url('avatar/<?php echo $_SESSION['po'] ;?>')">  </div> 
<?php
 }
?>  
</div> 
   <div class="lien_">
   <a href ="accueil.php"> Continuer </a> </div> 

<?php 
}
 ?>
 </div >
</body>
</html>
