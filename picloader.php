<?php
$file = $_GET['file'];
$info = getimagesize($file);
$height = $width = 400;
header('Content-type: image/jpeg');
switch ($info[2]) {
  case "3":
    $image = imagecreatefrompng($file);
    break;
    case '2':
      $image = imagecreatefromjpeg($file);
      break;
      case '1':
        $image = imagecreatefromgif($file);
        break;
  default:
  $image = imagecreatefromgif($file);
    break;
}
if ($width && ($info[0] < $info[1]))
    {
        $width = ($height / $info[1]) * $info[0];
    }
    else
    {
        $height = ($width / $info[0]) * $info[1];
    }
    $imagetc = imagecreatetruecolor($width, $height);

        imagecopyresampled($imagetc, $image, 0, 0, 0, 0, $width, $height,
            	$info[0], $info[1]);

        imagejpeg($imagetc, null, 100);

 ?>
