<?php
session_start();

$num_letters = intval($_GET[n]);

$string = '';

for ($i = 0; $i < $num_letters; $i++) {
	// this numbers refer to numbers of the ascii table (lower case)
	$string .= chr(rand(97, 122));
}

$_SESSION['rand_code'] = $string;

$dir = 'fonts/';

$image = imagecreatetruecolor(($num_letters*15),20);
imageSaveAlpha($image, true);
ImageAlphaBlending($image, false);
$transparentColor = imagecolorallocatealpha($image, 200, 200, 200, 127);
imagefill($image, 0, 0, $transparentColor);
$black = imagecolorallocate($image, 0, 0, 0);
$color = imagecolorallocate($image, 50, 200, 50); // red
$white = imagecolorallocate($image, 255, 255, 255);

//imagefilledrectangle($image,0,0,200,50,$white);
imagettftext ($image, 14, 0, 0, 15, $color, $dir."verdana.ttf", $_SESSION['rand_code']);

header("Content-type: image/png");
imagepng($image);
imagedestroy($image); 

?>