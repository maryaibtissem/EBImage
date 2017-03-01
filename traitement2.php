<?php
session_start();

$idimg = $_POST['idimg']; 
include('connexion.php'); 

 $req1 = $connexion->prepare("SELECT *  FROM img_telechargee WHERE id_img_tele= ?");
            $req1->execute(array($idimg));  
            while($row1 = $req1->fetch())
            {  
                $source = $row1["chemin_tele"];
                $_SESSION['source']=  $source;
                $nom=$row1["nom_img_tele"];
                $_SESSION['nom']=  $nom;
                
               
                
                echo "<img style='width:500px; height:500px;'  src='$source' >";
            }


