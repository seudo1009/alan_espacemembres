<?php session_start(); 
$_SESSION['pagen'] = (int) $_SESSION['pagen'];
$_SESSION['page_n'] = (int) $_SESSION['page_n'];
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
	 <link rel="stylesheet"  href="style.css" />
	 <link rel="stylesheet" media="screen and (max-width:980px)" href="style_2.css" />
     <title>Notifications </title>	 
   </head>
<body>
<h1> Notifications <span style ="color:red;"> (<?php echo  $_SESSION['nbre_nouv'];?>)</span> </h1>
<div class="page">
<?php
include_once('notif_search.php');
	foreach ($post as $rep)
{
?>  <br /><br />
	<div class="notif_nouv"> <div class="date"> <?php echo $rep['date'];?> </div> 	
	<div class="notif_nouv_"> <br />
	Un membre a commenté l'une de vos publications ! <br />
<form method="post" action="load_commentaires_.php"> 
    <input type="hidden" name="id" value= "<?php echo $rep['id_p'];?>" />
	<input type="submit" class="bouton_v" value="Voir" /> 
</form>
	</div> 	

 </div> <br /><br />
<?php
}
$rep1['nbre']=$_SESSION['nbre_nouv'];
	 if($rep1['nbre'] > 10 AND $rep1['nbre'] > $_SESSION['pagen']+10 )
{	 
?>
    <div class = "more_c">
  <a href="recharge_n.php">Plus de notifications</a>  </div>
<?php	
 }
if($_SESSION['pagen'] >=10  ) 
	  {
?>
		  <div class="less_c">
			<a href="recharge_n1.php"> Notifications  précédentes</a>  
			</div>
<?php	   
	  }
?> <div class="lien_rs">
<a href="accueil.php"> Retour </a>  </div> 
</div> 	 
</body>
</html>