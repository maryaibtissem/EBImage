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

 echo "<img style='width:50%;' src='$source' >";
        



?>