<!DOCTYPE html>
<?php
require 'header.php'; 
session_start();

if(isset($_SESSION['chemin']))
{
    $chemin= $_SESSION['chemin'];
}else
{
    $chemin="";
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EBImage - Téléchargement</title>
     <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
   
<?php  
$url= "http://localhost/projetMeme/url.php?id=".$_SESSION['lastId'];
    
 echo "<img style='width:500px; height:500px;'  src='$chemin' ><br><br>"; 
 ?>  
   
   
   
<a href="<?php echo $chemin?>" download class="boutonEnregistrer" id="bouton"> Télécharger </a>&nbsp;
    <a href="index.php" class="boutonEnregistrer" id="boutonRetour"> Retour </a><br><br>
  <form action=""><input style='width:500px;' type="text" value="<?php echo $url  ?>"></form>


    
</body>

<script>
$('#bouton').on('click',function() {
        
     $.ajax({
                type: "POST",
                url: "close.php",
     
            });
     
     
     
     }); 
    
    
    
</script>
</html>



