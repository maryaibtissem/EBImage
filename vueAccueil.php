<?php

 require 'header.php'; 

?>
<div class="cadre">
<section class="ligneImg">

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

</section> 


<section id="grandeBoite">
<article id="boiteImg">
    <div id="resultat"></div>
    <div id="divHaut"></div>
    <div id="divBas"></div>    
    
</article>
<article id="boiteForm">
<article id="boiteform2">
 <h3>Ajouter une image : </h3>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="img" size=50><br><br>
    <input type="submit" value="Envoyer" name="submit"><br><br>
</form>
    
</article>
 <h3>Écrivez votre texte : </h3>
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
</div>

<div class="cadre">
 
       <div class="container">
        <section class="row">
        <h1>LES DERNIERS MÈMES CRÉÉS</h1>
        <section id="groupe">
            <?php 
   
            while($row2 = $imgsTele->fetch()) 
       
                {
                ?>
                <article class="ligneImg2 col-lg-4 "><?php
	           echo '<img  src='.$row2["chemin_gen"].'>'; 
                echo '</article>';
                }?>
                
        </section>      
        </section>
    </div>
    
</div>

<footer><p>EBImage, tous droits réservés | <a href="mailto:esteban.d@codeur.online">esteban.d@codeur.online </a></p></footer>
<script src="script.js">  </script> 

</body>
</html
    