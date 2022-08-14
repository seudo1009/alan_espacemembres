<?php
header ("Content-type: image/png");
$image = imagecreate(700,250);
$orange = imagecolorallocate($image, 255, 128, 0);
$bleu = imagecolorallocate($image, 0, 0, 255);
$bleuclair = imagecolorallocate($image, 156, 227, 254);
$noir = imagecolorallocate($image, 0, 0, 0);
$blanc = imagecolorallocate($image, 255, 255, 255);
ImageSetPixel ($image, 100, 100, $blanc);
ImageLine ($image, 230, 230, 120,120, $noir);
ImageEllipse ($image, 200, 100, 100,50, $blanc);
$points = array(300, 40, 420, 50, 560, 160); ImagePolygon ($image, $points, 3, $noir);
ImageRectangle ($image, 30, 30, 160, 120,$noir);
imagestring($image, 4, 35, 15, "Welcome boss...", $blanc);
imagecolortransparent($image, $noir);
imagepng($image);
?>