<?php session_start();  
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Profil</title>
<link rel="stylesheet" media="screen and (max-width:980px)" href="style_2.css" />
<link href="style.css" rel="stylesheet" />
<meta charset="utf-8" />
</head>
<body>
<h2>Profil</h2>
<div class="page">
<?php
 include_once('profil_search_m.php');
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
 ?>
 </div>
 <?php
}
if($_SESSION['pseudo_recherche'] == 0)
{
?>	
<div class="lien_rs">
<a href ="accueil.php"> Retour </a> </div>
<?php	  
  }else
  {
?>
<div class="lien_rs">
<a href ="recherche.php"> Retour </a> </div>
<?php
  }	
  ?>
 </div>
</body>
</html>