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
     <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
<body>
<header>
<div id="logo">
<img src="logo.png" alt="">
</div>
</header>

<section id="ligneImg">
<?php  
include('connexion.php'); 

$req1= $connexion->query("SELECT * FROM img_originale  ");       
    
    while($row1 = $req1->fetch())  
    {?>
    <article class="parentMini"><?php
	echo '<img class="miniature" src='.$row1["chemin_orig"].'>'; 
    echo '<input class="champCache" type="hidden" name="id" value='.$row1["id_orig"].'>';
    
    ?>                  
    </article>
    <?php
    } 
    
    if(isset($_SESSION['lastIdtele'] ))
    { 
    ?>
     <article class="parentMini"><?php    
      echo '<img class="miniaturetele" src='.$_SESSION['cheminTele'].'>'; 
    echo '<input class="champCache" type="hidden" name="id" value='.$_SESSION['lastIdtele'].'>';  
     ?>                  
    </article> <br>
    <?php    
    }
?>

<article id="boiteform2">
 
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="img" size=50><br>
    <input type="submit" value="Envoyer" name="submit">
</form>
    
</article>

</section> 


<section id="grandeBoite">
<article id="boiteImg">
    <div id="resultat"></div>
    <div id="divHaut"></div>
    <div id="divBas"></div>    
    
</article>
<article id="boiteForm">
<form method="post" action="text.php">

    <label for="haut">Texte du haut : </label> <input type="text" name="Votre texte" id="haut" value=""><br><br>   
    <label for="bas">Texte du bas : </label> <input type="text" name="Votre texte" id="bas" value=""><br><br>
    <label for="couleurTexte">Couleur : </label> <input type="color" id="couleurTexte" name="color" value="">
    
    <br>   <br><br>   <br>
    <a href="creation.php" class="boutonEnregistrer"> Enregistrer
 </a> &nbsp;  
</form>
</article>


</section>

<script>

    $('.miniature').on('click',function() {
        var clicked = $(this);
        var idimg = $(this).parent().find(".champCache").val();

        $.ajax({
                type: "POST",
                url: "traitement.php",
                data: {'idimg': idimg}, // je passe la variable JS
                success: function(msg){ // je récupère la réponse dans la variable msg
                    $('#resultat').empty();
                    $('#resultat').append(msg);
                }
            });




     });
    
     $('.miniaturetele').on('click',function() {
        var clicked = $(this);
        var idimg = $(this).parent().find(".champCache").val();

        $.ajax({
                type: "POST",
                url: "traitement2.php",
                data: {'idimg': idimg}, // je passe la variable JS
                success: function(msg){ // je récupère la réponse dans la variable msg
                    $('#resultat').empty();
                    $('#resultat').append(msg);
                }
            });




     });


       $('#haut').on('keyup',function() {
        var text= document.getElementById('haut').value;
        
        
        $.ajax({
                type: "POST",
                url: "image.php",
                data: {'text':text},
         success: function(msg){
          $('#divHaut').empty();
          $('#divHaut').append(msg);


            }
            });
     });

    $('#bas').on('keyup',function() {
        var textbas= document.getElementById('bas').value;
        console.log(textbas);
        $.ajax({
                type: "POST",
                url: "image.php",
                data: {'textbas':textbas},
         success: function(msg){
          $('#divBas').empty();
          $('#divBas').append(msg);


            }
            });
     });
    
    
        
    $('#couleurTexte').on('change',function() {   
    var couleurTexte= document.getElementById('couleurTexte').value;
        console.log(couleurTexte);
        $.ajax({
                type: "POST",
                url: "couleur.php",
                data: {'couleurTexte':couleurTexte},
       success: function(msg)
            {
           
            }
            });
    
    });  
        
   

</script>   
<!--<footer></footer>-->
</body>
</html
    
