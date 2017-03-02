<?php
session_start();
 

function getimgs() 
{
include('connexion.php'); 
$req1= $connexion->query("SELECT * FROM img_originale  ");       
return $req1;
}
   

?>