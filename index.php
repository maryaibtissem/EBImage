<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>EBImage</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>

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
    </article> <br>
    <?php
    }    
?>
</section> 


<section id="grandeBoite">
<article id="boiteImg">
    <div id="resultat"></div>
    <div id="divHaut"></div>    
</article>
<article id="boiteForm">
<form method="post" action="text.php">

    <label for="haut">Texte du haut : </label> <input type="text" name="Votre texte" id="haut" value=""><br>   
    <label for="bas">Texte du bas : </label> <input type="text" name="Votre texte" id="bas">   
    
    
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
    
       $('#haut').on('keyup',function() {
        var text= document.getElementById('haut').value; 
        console.log(text);  
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
    
</script>   
</body>
</html
    
