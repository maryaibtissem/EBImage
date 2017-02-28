<?php
session_start();

$idimg = $_POST['idimg']; 
include('connexion.php'); 

 $req1 = $connexion->prepare("SELECT *  FROM img_originale  WHERE id_orig = ?");
            $req1->execute(array($idimg));  
            while($row1 = $req1->fetch())
            {  
                $source = $row1["chemin_orig"];
                $_SESSION['source']=  $source;
                $nom=$row1["nom_img"];
                $_SESSION['nom']=  $nom;
            }


$chemin= "image/".$nom;
$check = getimagesize($source); 

        $width = 500;
        $height = 500;   
    
        $image_p = imagecreatetruecolor ($width, $height);
        $image = imagecreatefromjpeg  ($source);
        
        imagecopyresampled ($image_p, $image, 0, 0, 0, 0, $width, $height, $check[0], $check[1]);
        imagejpeg ($image_p, $chemin, 100);

 echo "<img  src='$chemin' >";



        



?>