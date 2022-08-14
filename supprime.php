<?php session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
	 <link rel="stylesheet"  href="style.css" />
	 <link rel="stylesheet" media="screen and (max-width:980px)" href="style_2.css" />
     <title>Suppression-compte</title>	 
   </head>
<body>
 <h2>Vouler vous vraiment supprimer votre compte ?</h2>
 <div class="page">
 <strong><span style="color:red;">  Toutes vos informations seront perdues.</span> </strong> 
  <form method="post" action="fi.php"> 
  <input type="hidden" name="id" value= "<?php echo $_SESSION['id_'];?>" />  
  <input class="bouton" type="submit" value="Supprimer"> 
</form> <br /><br />
<div class="lien_rs">
<a href="param.php">Retour  </a>  </div>  
 </div>  
</body>
</html>