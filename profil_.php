<?php session_start();  
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Profil</title>
<link href="style.css" rel="stylesheet" />
<link rel="stylesheet" media="screen and (max-width:980px)" href="style_2.css" />
<meta charset="utf-8" />
</head>
<body>
<h1>Profil</h1>
<div class="page"> 
<?php
 include_once('profil_search.php');
 foreach ($membres as $rep)
{
?>	
<div class="profil_"> 
 <?php 
  if($rep['profil']!='')
  {
?>
<div class="photo" style="background:url('avatar/<?php echo $rep['profil'];?>')">  </div>
<?php
 }else
  {
	  echo 'Aucune photo de profil <br />';
  }	
  ?> <br /><br />
 <strong> Date d'inscription   </strong> :<?php echo ''.$rep['jour'].'/'.$rep['mois'].'/'.$rep['annee'].' <br />'; ?> <br />
 <strong> Pseudo </strong> :<?php echo ''.$rep['pseudo'].' <br />'; ?> <br />
  <?php
  if($rep['email']!='')
  {
?>
	<strong> Email</strong> : <?php echo ''.$rep['email'].' <br />'; ?> <br /> 
<?php	  
  }
  if($rep['date_naissance']!= '' AND $rep['date_naissance']!= '0000-00-00 00:00:00')
  {
?>
	<strong> Date de naissance </strong> : <?php echo ''.$rep['date_naissance'].' <br />'; ?> <br /> 
<?php	  
  }
  if($rep['passion'] != '')
  {
?>
	 <strong>Passion(s)</strong> : <?php echo ''.$rep['passion'].' <br />'; ?> <br /> 
<?php	  
  }
  if($rep['propos']!= '')
  {
?>
	<strong>Actu </strong>: <?php echo ''.$rep['propos'].' <br />'; ?> <br /> 
<?php	  
  }
   if($_SESSION['pseudo_truc'] == 1){ $_SESSION['pseudo_truc'] = 0; echo ' <span style ="color:red"> Le pseudo que vous demandez est déjà occupé !  </span><br /> ';} 
if($_SESSION['email'] == 1){ $_SESSION['email'] = 0;echo ' <span style ="color:red"> L\'adresse mail n\'est pas valide  </span><br /> ';} 
if($_SESSION['date'] == 1) { $_SESSION['date'] =0;echo ' <span style ="color:red"> Date incorrecte  </span><br /> ';}
if($_SESSION['passion'] == 1) {$_SESSION['passion'] = 0;echo ' <span style ="color:red"> Vous avez dépassé les 255 caractères  </span><br /> ';} 
if($_SESSION['propos'] == 1) {$_SESSION['propos'] = 0;echo ' <span style ="color:red"> Vous avez dépassé les 100 caractères </span><br /> ';} 
?>
 </div>
  <?php 
  if($_SESSION['profil_update']==1)
  {
 ?>
 <div class="form_prof"> 
 <form method="post" action="profil_mj.php" enctype="multipart/form-data"> 
 <br /> 
  <span style ="color:red"> (Remplissez au moins un champ) </span >
    <p>  Pseudo ? </p>
    <input type="text" name="pseudo" />
	<p>   Email ? <span style ="color:red"> (Votre email sera affiché sur votre profil)  </span > </p>
    <input type="text" name="email" />
	<p>  Date de nassance ?<span style ="color:red">  (format jj/mm/aaaa)  </span ></p>
    <input type="text" name="date_naissance" /> 
	<p> Passions  ? </p>
    <input type="text" name="passion" /> 
	<p> Actu ? </p>
    <textarea name="propos" > </textarea> 
	<p> Photo de profil ? </p>
	<input type="file" name="monfichier"  value="Importer une photo" /> <br /> <br /> 
	<br /> 
	<br /> 
	<input type="submit"  class="bouton_l" value="Mettre à jour le profil" /> 
</form> </div> 

 <br />
<?php 
  }
  ?>
  <br /> <br />  </div> 
 <?php 
  if($_SESSION['profil_delete']==1)
  {
 ?>
 <div class="form_prof"> 
 <form method="post" action="profil_delete2.php"> 
 <p> Choisissez au moins une information : </p>
	<input type="checkbox" name="case1" id="case1" /> <label for="case1"> Email </label>  <br />
	<input type="checkbox" name="case2" id="case2" /> <label for="case2"> Passion </label>  <br />
	<input type="checkbox" name="case3" id="case3" /> <label for="case3"> Actu </label>  <br />
	<input type="checkbox" name="case4" id="case4" /> <label for="case4"> Photo de profil </label>  <br />
	<input type="checkbox" name="case5" id="case5" /> <label for="case5"> Date de naissance </label>  <br /> <br />
	<input type="submit"  class="bouton_lo" value="Retirer les informations sélectionnées" /> 
</form> </div> 
 <br />
<?php 
  }
  ?>
 <div class="lien_o">  <a href="pass_modify.php"> Modifier le mot de passe </a> </div>  <div class="lien_o">
 <a href = "profil_update.php"> Mettre à jour votre profil ?</a></div> <div class="lien_ol">
 <a href="profil_delete1.php"> Retirer certaines informations du profil ?</a>  </div>
<?php
 $_SESSION['id_']= $rep['id'];
}
?> <br /> <br /> <br /> <br /><div class="lien">
 <a href="accueil.php"> Retour à l'accueil </a></div> 
</div> 
</body>

</html>