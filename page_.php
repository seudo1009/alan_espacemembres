<?php session_start(); 
$_SESSION['page'] = 0;
$_SESSION['page_t'] = 0;
$_SESSION['pageb'] = (int) $_SESSION['pageb'];
$_SESSION['page_b'] = (int) $_SESSION['page_b'];
  ?>
<!DOCTYPE html>
<html>
<head>
<title> <?php echo $_SESSION['pseudo']; ?>-Page de publications</title>
<meta charset="utf-8" />
<link rel="stylesheet" media="screen and (max-width:980px)" href="style_2.css" />
<link href="style.css" rel="stylesheet" />
</head>
<body>
<h1>Ma page</h1>
<div class="nom_espace_">  <?php
  include_once('post_search.php');
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
if($_SESSION['post_support'] == 1) {$_SESSION['post_support'] = 0;echo ' <span style ="color:red"> Echec de l\'importation du média </span><br /> ';} 
	if(empty($membres))
	{
		echo '<div class="avert"> Vous n\'avez encore fait aucune  publication sur votre page !<br/><br/></div>';
?>
  <br/> <div class="lien_ol_">  <a href="publi_deci.php"> Faire une première publication </a> </div> 
<?php 
    }else
	{
?>
	<div class="lien_ol_">	<a href="publi_deci.php"> Faire une nouvelle publication </a>   </div> 
<?php 
	}
    if($_SESSION['publi_deci']==1)
  {
 ?>
 <br/> <br/>
 <div class="form_prof"> 
 <form method="post" action="page_mj.php" enctype="multipart/form-data"> 
 <br /> 
    <p> Allez y à fond... <?php echo $_SESSION['pseudo']; ?> ! (Ecrivez au moins un texte)</p>
    <textarea name="post" rows="8" cols="45" > </textarea> 
	    <p> Importer un média ? </p>
	<input type="file" name="monfichier" value= "Importer un média" /> <br /> <br />  
	<input type="submit" class="bouton_l" value="Publier sur ma page" /> 
</form> </div> 

 <br />
<?php 
}
$ext_audio = array ('mp3','ogg'); 
$ext_img = array ('jpeg','png','jpg','gif'); 
$ext_video = array ('mp4','webm','ogv'); 
	foreach ($membres as $rep)
{
?>  <br /><br />
	<div class="publication">  <div class="titre"> <?php echo $rep['date'];?> </div> 
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
<form method="post" action="load_commentaires_.php"> 
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
  <a href="recharge_p_.php">Plus de publications</a>  </div>
<?php	
 }
if($_SESSION['pageb'] >=10  ) 
	  {
?>
		  <div class="less_c">
			<a href="recharge_p1_.php"> Publications précédentes</a>  
			</div>
<?php	   
	  }
?>
<br/>
<div class="lien">
<a href="accueil.php" > Retour à l'accueil </a> </div> 
<div class="page">
</body>
</html>