<?php
 if($extension =='jpg' OR $extension== 'jpeg')
 {
	 $source = imagecreatefromjpeg("posts/".$nom);
	 imagejpeg($source, "posts/".$nom);
 }else
 {
	 $source = imagecreatefrompng("posts/".$nom);
	 imagepng($source,"posts/".$nom);
 }
 $largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
 if($hauteur_source > 800)
 {
	  $destination = imagecreatetruecolor( 690, 800);
 }else
 {
	 $destination = imagecreatetruecolor(690, $hauteur_source);
 }

$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);
imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
if($extension =='jpg' OR $extension == 'jpeg')
 {
	 imagejpeg($destination, "posts/".$nom);
 }else
 {
     imagepng($destination,"posts/".$nom);
 }