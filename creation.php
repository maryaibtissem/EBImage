<?php
session_start();
include('connexion.php');

function hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);

    if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
    }
$rgb = array($r, $g, $b);

return $rgb; // returns an array with the rgb values
}


    
$color = $_SESSION['couleurTexte'];

$chemin= "imgCree/".$_SESSION['nom'];
$info = new SplFileInfo($chemin); 
$extension = $info-> getExtension();
echo $extension;

$check = getimagesize($_SESSION['source']); 

        $width = 500;
        $height = 500;     
       
        
        $image_p = imagecreatetruecolor ($width, $height);
        if($extension=='jpg' || $extension=='jpeg' ) 
        {
            $image = imagecreatefromjpeg($_SESSION['source']);
        }else if($extension=='png' )
        {
            $image = imagecreatefrompng($_SESSION['source']);
        }
        
        imagecopyresampled ($image_p, $image, 0, 0, 0, 0, $width, $height, $check[0], $check[1]);
        



$textUtilisateur = $_SESSION['text'];
$textbas = $_SESSION['textbas'];
$colorRgb = hex2rgb($color); //converti coleur hexa en rgba
    $c1 = $colorRgb[0];
    $c2 = $colorRgb[1];
    $c3 = $colorRgb[2];
echo $c1."<br>"; echo $c2."<br>"; echo $c3;

$textcolor = imagecolorallocate($image_p,  $c1,  $c2,  $c3);
$taille = 28;
$angle = 0;
$x = 5;
$y =50;

$font = 'font/KaushanScript-Regular.ttf';

imagettftext($image_p, $taille, $angle, $x, $y, $textcolor, $font, $textUtilisateur);

$taillebas = 28;
$anglebas = 0;
$xbas = 5;
$ybas =450;

imagettftext($image_p, $taillebas, $anglebas, $xbas, $ybas, $textcolor, $font, $textbas);

if($extension=='jpg' || $extension=='jpeg' ) 
        {
            imagejpeg ($image_p, $chemin, 100);
            $req1 = $connexion->prepare('INSERT INTO img_generee (chemin_gen,text,url) VALUES (?,?,?)');
            $req1->execute(array('NULL','NULL','NULL'));   
            $_SESSION['lastId']=$connexion->lastInsertId(); 

            $chemin2="imgCree/".$_SESSION['lastId'].".jpg";
        }
else if($extension=='png' )
        {    
            imagepng ($image_p, $chemin, 100);
            $req1 = $connexion->prepare('INSERT INTO img_generee (chemin_gen,text,url) VALUES (?,?,?)');
            $req1->execute(array('NULL','NULL','NULL'));   
            $_SESSION['lastId']=$connexion->lastInsertId(); 

            $chemin2="imgCree/".$_SESSION['lastId'].".png";
        }


      


rename($chemin,$chemin2);

  $req3 = $connexion->prepare('UPDATE img_generee
            SET  chemin_gen = ?
            WHERE id_gen=?');
            $req3->execute(array($chemin2,$_SESSION['lastId'] ));


$_SESSION['chemin']=$chemin2;
header("Location: url.php");



?>


