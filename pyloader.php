<?php

$pic = imagecreate(300, 300);
$txt = imagecolorallocate($pic,0,0,0);
$bg = imagecolorallocate($pic,255,255,255);
$font = "/testarea/fonts/cubic.ttf";
$pos = 0;
$f = $_GET['file'];
if (!preg_match('/.(py)/',$f)) {
  return;
}
  if ($fr = fopen($f,'r')) {

    while (!feof($fr)) {
      $pos+=20;
      $line = fgets($fr);
      imagettftext($pic,5,0,0,$pos,$bg,$font,$line);
      }
  }
  header("Content-type: image/png");
imagepng($pic,null);
 ?>
