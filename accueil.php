<?php session_start();  
$_SESSION['page'] = 0;
$_SESSION['page_t'] = 0;
$_SESSION['pageb'] = 0;
$_SESSION['page_b'] = 0;
$_SESSION['pagem'] = (int) $_SESSION['pagem'];
$_SESSION['page_m'] = (int) $_SESSION['page_m'];
$_SESSION['pseudo_recherche'] = 0;
$_SESSION['pseudo_recherche_'] = 0;
$_SESSION['pseudo_recherche2'] = 0;
$_SESSION['pseudo_recherche3'] = 0 ;
$c=0;
include_once('notif.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Accueil</title>
<link href="style.css" rel="stylesheet" />
<link rel="stylesheet" media="screen and (max-width:980px)" href="style_2.css" />
<!--[if lt IE 9]>
<script
src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<meta charset="utf-8" />
</head>
<body>
<div class="entete">
  <div class="nom_espace_">  <?php
   include_once('profil_search.php');
   foreach ($membres as $rep)
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
  <nav>
  <ul>
<?php
if($_SESSION['notif']==1)
{
?>	
<li> <?php
if($c==1)
{
?><a href="not.php" style ="color:red;"> Notifications</a> 
<?php
}else
{
?> <a href="not.php"> Notifications</a> </li>
<?php
}
}
?>	
<li> <a href="profil_.php"> Profil </a>  </li>
<li> <a href="page_.php"> Ma page </a>  </li>
<li> <a href="param.php"> Paramètres </a>  </li>
  </ul> </nav> </div>
  <div class="page">
  
   <div class="titre_e"> 
   
   Espace membres
   </div> <div class="lien_o"> <a href="recherche.php"> Rechercher un membre </a> </div>
<?php
include_once('membres.php'); 
foreach ($membres as $rep)
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
 ?> <br />
    <div class="option_profil">  <form method="post" action="profil_m.php"> 
    <input type="hidden" name="id" value= "<?php echo $rep['id'];?>" />
	<input type="submit" class="bouton" value="Voir le profil" /> 
</form>
</div>
 
</div> <br /><br />
<?php  
include('membres_post.php'); 
if(!empty($membres_post))
{
$ext_audio = array ('mp3','ogg'); 
$ext_img = array ('jpeg','png','jpg','gif'); 
$ext_video = array ('mp4','webm','ogv'); 
 foreach($membres_post as $rep_)
{
?>
<div class="publication"> <div class="date"> <?php echo $rep_['date'];?> </div> 
	<div class="post_text"> <?php echo $rep_['contenu'];?> </div> 	
<?php
if($rep_['nom'] != '')
{
	 if(in_array($rep_['ext'],$ext_img))
	 {		 
?>
	<div class="post_support"> <div class="post_support_"> 
	<img src="posts/<?php echo $rep_['nom'];?>" /> 
	</div> 	</div> 
<?php
	 }else
	 {
		 if(in_array($rep_['ext'],$ext_audio))
	 {		 
?>
	<div class="post_support"> <div class="post_support_"> 
	<audio controls>
<source src="posts/<?php echo $rep_['nom'];?>" ></source>
<source src="posts/<?php echo $rep_['nom'];?>" ></source>
  </audio>
	</div> 	</div> 
<?php
	 }else
	 {
		 if(in_array($rep_['ext'],$ext_video))
	 {		 
?>
	<div class="post_support"> <div class="post_support_"> 
	<video controls poster="sintel.jpg" width="680">
   <source src="posts/<?php echo $rep_['nom'];?>" />
   <source src="posts/<?php echo $rep_['nom'];?>" />
   <source src="posts/<?php echo $rep_['nom'];?>" />
    </video>
	</div> </div> 
<?php
	 }
	 }
	 }
}
?>
 </div>
 <div class="option_page">
  <div class="avert">
 Visitez la page pour lire et commenter d'autres publications ! </div>
  <div class="avert_po">
<form method="post" action="load_page_m.php"> 
    <input type="hidden" name="id_m" value= "<?php echo $rep['id'];?>" />
	 <input type="hidden" name="pseudo_m" value= "<?php  echo $rep['pseudo'];?>" />
	<input type="submit" class="bouton" value="Visiter la page" /> 
</form>
</div>
</div>
<?php 
}
}
?>
  </div> 
 <br />
	<br />
<?php
 }	if($rep1['nbre']-1 > 10 AND $rep1['nbre']-1 > $_SESSION['pagem']+10 )
{	 
?>
    <div class = "more_ca">
  <a href="recharge_m.php">Plus de membres</a>  </div>
<?php	
 }
if($_SESSION['pagem'] >=10  ) 
	  {
?>
		  <div class="less_ca">
			<a href="recharge_m1.php"> Page précédente</a>  
			</div>
<?php	   
	  } 
?>
<div class="lien">
   <a href="deconnexion.php"> Se Déconnecter </a>
   </div>
     </div>
</body>
</html>
