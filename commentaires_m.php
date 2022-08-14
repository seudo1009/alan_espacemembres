<?php session_start(); 
$_SESSION['page'] = (int) $_SESSION['page'];
$_SESSION['page_t'] = (int) $_SESSION['page_t'];
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
	 <link rel="stylesheet"  href="style.css" />
	 <link rel="stylesheet" media="screen and (max-width:980px)" href="style_2.css" />
     <title>Commentaires</title>	 
   </head>
<body>
<h1> Commentaires </h1>
<div class="page">
<div class="lien_o">
<a href="page_m.php">Retour aux publications</a>   </div>  

<?php
include_once('post_comment_search.php');
$ext_audio = array ('mp3','ogg'); 
$ext_img = array ('jpeg','png','jpg','gif'); 
$ext_video = array ('mp4','webm','ogv'); 
	foreach ($post as $rep)
{
 $id_m = $rep['id_m'];
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
 </div> <br /><br />
<?php
}
include_once('comment_search.php');
 if(empty($rep3))
 {
	 echo '<div class="avert">Aucun commentaire.<br />Soyez le premier à commenter cette publication !<br /> </div>';
 }
 else
 {
  foreach($rep3 as $rep2)
 {
?>
<div class="commentaires">   <strong> <?php echo  $rep2['auteur'] ?> </strong> le <?php echo  $rep2['date'] ?> <br /><br /> <?php echo  $rep2['contenu'] ?></div>
<br />
 <?php
 }
 
	 if($rep1['nbre'] > 10 AND $rep1['nbre'] > $_SESSION['page']+10 )
	 {	 
      $_SESSION['red'] =1;
?>
    <div class = "more_ca_">
  <a href="recharge_c.php">Plus de commentaires</a>  </div>
<?php	
 }
if($_SESSION['page'] >=10  ) 
	  {
		  $_SESSION['red'] =1;
?>         
		  <div class="less_ca_">
			<a href="recharge_c1.php"> Commentaires précédents</a>  
			</div>
<?php	   
	  }
 }
?>
	
 <p> <strong> Ajouter un commentaire :</strong> </p>
<form method="post" action="treat_m.php">  
   Entrez votre commentaire : <br />
  <input type="text" name="contenu" required > <br />
  <input type="hidden" name="id" value= "<?php echo $_SESSION['id_post'];?>" />
   <input type="hidden" name="id_m" value= "<?php echo $id_m; ?>" />
  <input type="hidden" name="pseudo" value= "<?php echo $_SESSION['pseudo'];?>" />
  
  <input type="submit" class="bouton_aj" value="Ajouter"> 
</form> 
 </div>  

</body>
</html>