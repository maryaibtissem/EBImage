<?php

$idimg = $_POST['idimg']; 
$id="";
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

          
//        $img_type = $_FILES['img']['type'];
       
        imagejpeg ($image_p, $chemin, 100);
 echo "<img src='$chemin' >";
        



?>