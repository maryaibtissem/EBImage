<?php

 require 'header.php'; 

?>

<section id="ligneImg">

   <?php  while($row1 = $imgs->fetch()) 
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

<script src="script.js">  </script> 
<!--<footer></footer>-->
</body>
</html
    