<?php
 if($_SESSION['ext']=='jpg' OR $_SESSION['ext'] == 'jpeg')
 {
	 $source = imagecreatefromjpeg("avatar/".$_SESSION['id_'].".".$_SESSION['ext']."");
	 imagejpeg($source, "avatar_s/".$_SESSION['id_'].".".$_SESSION['ext']."");
 }else
 {
	 $source = imagecreatefrompng("avatar/".$_SESSION['id_'].".".$_SESSION['ext']."");
	 imagepng($source, "avatar_s/".$_SESSION['id_'].".".$_SESSION['ext']."");
 }
$destination = imagecreatetruecolor(100, 100);
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);
imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
if($_SESSION['ext']=='jpg' OR $_SESSION['ext'] == 'jpeg')
 {
	 imagejpeg($destination, "avatar/".$_SESSION['id_'].".".$_SESSION['ext']."");
 }else
 {
     imagepng($destination, "avatar/".$_SESSION['id_'].".".$_SESSION['ext']."");
 }