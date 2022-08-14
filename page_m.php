<?php session_start(); 
$_SESSION['page'] = 0;
$_SESSION['page_t'] = 0;
$_SESSION['pageb'] = (int) $_SESSION['pageb'];
$_SESSION['page_b'] = (int) $_SESSION['page_b'];
  ?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $_SESSION['pseudo_m'];?>Page de publications</title>
<meta charset="utf-8" />
<link rel="stylesheet" media="screen and (max-width:980px)" href="style_2.css" />
<link href="style.css" rel="stylesheet" />
</head>
<body>
<h1> Dernières publications </h1>
<div class="nom_espace_">  <?php
  include_once('post_search_m.php');
   foreach ($membres1 as $rep)
   {  
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

 <div class="options_o">  <?php echo '<span style="font-weight :bold;">'.$rep['pseudo'].'</span> <br /><br />'; 
if($rep['propos']!='')
 { 
  echo $rep['propos'];
}
   }
 ?>
  </div> 
</div>
<div class="page">
<?php 
	if(empty($membres))
	{
		echo $_SESSION['pseudo_m'].' n\'a encore fait aucune  publication sur sa page !<br/><br/>';
    }else
	{
		$ext_audio = array ('mp3','ogg'); 
$ext_img = array ('jpeg','png','jpg','gif'); 
$ext_video = array ('mp4','webm','ogv'); 
	foreach ($membres as $rep)
{
?>  <br /><br />
	<div class="publication"> <div class="titre"> <?php echo $rep['date'];?> </div> 
	<div class="post_text"> <?php echo $rep['contenu'];?> </div> 	
<?php
if($rep['nom'] != '')
{
	 if(in_array($rep['ext'],$ext_img))
	 {		 
?>
	<div class="post_support"> <div class="post_support_"> 
	<img src="posts/<?php echo $rep['nom'];?>" /> 
	</div> </div> 
<?php
	 }else
	 {
		 if(in_array($rep['ext'],$ext_audio))
	 {		 
?>
	<div class="post_support"> <div class="post_support_"> 
	<audio controls>
<source src="posts/<?php echo $rep['nom'];?>" ></source>
<source src="posts/<?php echo $rep['nom'];?>" ></source>
  </audio>
	</div> </div> 
<?php
	 }else
	 {
		 if(in_array($rep['ext'],$ext_video))
	 {		 
?>
	<div class="post_support"> <div class="post_support_"> 
	<video controls poster="sintel.jpg" width="720">
   <source src="posts/<?php echo $rep['nom'];?>" />
   <source src="posts/<?php echo $rep['nom'];?>" />
   <source src="posts/<?php echo $rep['nom'];?>" />
    </video>
	</div> </div> 
<?php
	 }
	 }
	 }
}
?>
<form method="post" action="load_commentaires_m.php" > 
    <input type="hidden" name="id" value= "<?php echo $rep['id'];?>" />
	<input type="submit" class="bouton" value="Commentaires" /> 
</form>
 </div> <br /><br />
<?php
}
if($rep1['nbre'] > 10 AND $rep1['nbre'] > $_SESSION['pageb']+10 )
 {	 
?>
    <div class = "more_c">
  <a href="recharge_p.php">Plus de publications</a>  </div>
<?php	
 }
if($_SESSION['pageb'] >=10  ) 
	  {
?>
		  <div class="less_c">
			<a href="recharge_p1.php"> Publications précédentes</a>  
			</div>
<?php	   
	  }
}
if($_SESSION['pseudo_recherche'] == 0)
{
?>	
<div class="lien">
<a href ="accueil.php"> Retour à l'accueil </a> </div>
<?php	  
  }else
  {
?>
<div class="lien_rs">
<a href ="recherche.php"> Retour </a> </div>
<?php
  }	
?>
<br/>

<div class="page">
</body>
</html>