<!DOCTYPE html>
<?php
session_start();
//session_destroy();
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>EBImage</title>
     <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>

<?php
    
        $img_taille = 0;
        $img_type   = '';
        $img_nom    = '';
        $taille_max = 750000;
        
    
    $ret  = "uploads/" . basename($_FILES["img"]["name"]);
    $chemin= "img/".$_FILES['img']['name'];



if(isset($_POST["submit"])) 
{
   $check = getimagesize($_FILES["img"]["tmp_name"]); 
 
    if($check == false)
    {
     echo "Echec";
          
    }
    
    else
      
        $img_taille = $_FILES['img']['size'];
         
            if ($img_taille > $taille_max) 
            {
                echo "Trop gros !";
               
            }
   
    else
        
    {  
        
        $img_nom  = $_FILES['img']['tmp_name'];
        move_uploaded_file ( $img_nom , $chemin );   
        echo "<img src='$chemin' > <br>";
       
//        print_r($check);
    }
  
 header("Location: index.php");

        
}
    
$info = new SplFileInfo($chemin); 
$nom = $info->getFilename();
include('connexion.php'); 
    $req = $connexion->prepare('INSERT INTO img_telechargee (chemin_tele,nom_img_tele) VALUES( ?,?)');
            $req->execute(array($chemin,$nom));
    $_SESSION['cheminTele']=$chemin;
   $_SESSION['lastIdtele']=$connexion->lastInsertId(); 
    
  

?>
    
 

</body>
</html>