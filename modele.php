<?php
session_start();
 

function getimgs() 
{
include('connexion.php'); 
$req1= $connexion->query("SELECT * FROM img_originale  ");       
return $req1;
}

function dernierImgCree() 
{
include('connexion.php'); 
$req2= $connexion->query("SELECT * FROM img_generee ORDER BY id_gen DESC LIMIT 0, 6  ");       
return $req2;
}
   

?>