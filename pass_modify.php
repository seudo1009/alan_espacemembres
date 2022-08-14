<?php session_start();  
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Change pass</title>
<link href="style.css" rel="stylesheet" />
<meta charset="utf-8" />
</head>
<body>
<div class="page">
 <?php 
     if( $_SESSION['pass_modify'] != 1)
  {
	 if($_SESSION['anc_pass_verif'] == 1)
	 {
		 $_SESSION['anc_pass_verif'] = 0;
		 
		 echo 'L\'actuel mot de passe ne correspond pas !<br /> ';
	 }
	 if($_SESSION['pass_nouv_confirm'] == 1)
	 {
		 $_SESSION['pass_nouv_confirm'] = 0;
		 
		 echo 'Les nouveaux mots de passe ne sont pas conformes !<br /> ';
	 }
  ?>
 <form method="post" action="change_pass.php"> 
    <p> Entrez le mot de passe acuel : </p>
	<input type="password" name="pass"/>
	<p> Choisissez votre nouveau mot de passe : </p>
	<input type="password" name="pass_nouv"/>
	<p> Confirmer le nouveau mot de passe : </p>
	<input type="password" name="pass_confirm"/>
	<br />
	<br />
	<input type="submit" class="bouton_l" value="Changer de mot le passe"/>
 </form>
 <br />
 <?php 
  }else
   {
	   $_SESSION['pass_modify'] = 0;
?>  
   <p> Votre mot de passe a bien été mis à jour .</p>
<?php 
}
 ?>
 <div class="lien_rs">
<a href ="profil_.php"> Retour </a> </div> 
</div> 
 
</body>
</html>