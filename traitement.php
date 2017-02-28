<?php

$idimg = $_POST['idimg']; 
//echo $_POST['text'];

include('connexion.php'); 

 $req1 = $connexion->prepare("SELECT *  FROM img_originale  WHERE id_orig = ?");
            $req1->execute(array($idimg));  
            while($row1 = $req1->fetch())
            {  
                $source = $row1["chemin_orig"];
                $nom=$row1["nom_img"];
       
            }


$chemin= "image/".$nom;
$check = getimagesize($source); 

        $width = 600;
        $height = 600;   
    
        $ratio_orig = $check[0]/$check[1];

        if ($width/$height > $ratio_orig) 
        {
        $width = $height*$ratio_orig;
        } 
        else
            {
        $height = $width/$ratio_orig;
            }
         
       
        $image_p = imagecreatetruecolor ($width, $height);
        $image = imagecreatefromjpeg  ($source);
        
        imagecopyresampled ($image_p, $image, 0, 0, 0, 0, $width, $height, $check[0], $check[1]);

//if(isset($_POST['text']))
//{
//    $text =$_POST['text']; 
//       
//
//$textcolor = imagecolorallocate($image_p, 0, 0, 255);
//imagestring($image_p, 5, 0, 0,$text , $textcolor);
//}


 echo "<img  src='$chemin' >";

        



?>