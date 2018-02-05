<?php
 

 session_start();

 $securityNumber =(string)rand(111111,999999);

 $_SESSION['captcha']=$securityNumber ;  


     
$maxHorizAngle = 20;  
     
$imgX = 120;  
$imgY = 40;   



$font = __DIR__. "/SpicyRice.ttf";




$image = imagecreate($imgX, $imgY);
$fontMinSize = 12;  
$fontMaxSize = 15;   

$textColor = imagecolorallocate($image, 0, 0, 0);
$imageColor = imagecolorallocate($image, 255, 255, 210);
        

imagefill($image, 0, 0, $imageColor);
      
 $num_n = strlen($securityNumber);
        
        
for ($n = 0; $n < $num_n; $n++) {
	$num = $securityNumber[$n];
	$font_size = rand($fontMinSize, $fontMaxSize);
	$angle = rand(360 - $maxHorizAngle, 360 + $maxHorizAngle);
            
	$y = rand(($imgY - $font_size) / 4 + $font_size, ($imgY - $font_size) / 2 + $font_size);
	
	$x = rand(($imgX / $num_n - $font_size) / 2, $imgX / $num_n - $font_size) + $n * $imgX / $num_n;
	
	$textColor = imagecolorallocate($image, rand(0, 100), rand(0, 100), rand(0, 100));       
            imagettftext($image, $font_size, $angle, $x, $y, $textColor, $font, $num);
}
    
 header("Content-type: image/png");  imagepng($image); 
                   