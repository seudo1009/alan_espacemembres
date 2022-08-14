<?php session_start(); 

include_once('re.php');
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
	 <link rel="stylesheet"  href="style.css" />
	 <link rel="stylesheet" media="screen and (max-width:1280px)" href="syle_2.css" />
     <title>Paramètres</title>	 
   </head>
<body>
<div class="page"> 
<form method="post" action="re_load.php"> 
    <p> Entrer le pseudo du membre que vous recherchez :</p>	 
  <input type="text" name="pseudo" required />  <br /> <br />
  <input class="bouton" type="submit" value="Rechercher"> 
  
</form><br /> <br />
<?php
if(!empty($pseudos_))
{
foreach ($pseudos_ as $rep)
{
?>	
<div class="session_membre"> <?php
 if($rep['profil']=='')
 {
?>  
 <div class="photo" style="background:url('avatar/ico.jpg')">  </div> 
 <?php 
 } else
 {
?> 
<div class="photo" style="background:url('avatar/<?php echo $rep['profil'];?>')">  </div> 
<?php
 }
?>  

 <div class="options"> <?php echo ''.$rep['pseudo'].' <br /><br />'; 
if($rep['propos']!='')
 { 
  echo $rep['propos'];
}
 ?>
    <div class="option_profil">   <div class="bouton_r">  <form method="post" action="profil_m.php"> 
    <input type="hidden" name="id" value= "<?php echo $rep['id'];?>" />
	<input type="submit" class="bouton" value="Voir le profil" /> 
</form></div>
  <div class="bouton_r"> 
<form method="post" action="load_page_m.php"> 
    <input type="hidden" name="id_m" value= "<?php echo $rep['id'];?>" />
	 <input type="hidden" name="pseudo_m" value= "<?php  echo $rep['pseudo'];?>" />
	<input type="submit" class="bouton" value="Visiter la page" /> 
</form>
</div></div>
<?php
}
 }else
{
	if ($_SESSION['pseudo_recherche3'] == 1)
	{
		$_SESSION['pseudo_recherche3'] = 0 ;
		echo '<br /> <br /> Aucun autre membre ne peut détenir le même pseudo que vous !<br />';
	}
if($_SESSION['pseudo_recherche_'] == 1 AND $_SESSION['pseudo_recherche2'] == 1)
{
	$_SESSION['pseudo_recherche2'] = 0;
$_SESSION['pseudo_recherche_'] = 0;	
?>
<br /> <br /> Aucun membre ne détient ce pseudo !<br /> <br />

<?php
}
}	
?>
  </div>  </div> 
  <br /><br />
  <div class="lien">
<a href="accueil.php">Retour à l'acceuil </a>  </div> 
</body>
</html>