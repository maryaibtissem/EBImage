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


   <div id="cadre2">
<?php  
$url= "http://localhost/projetMeme/url.php?id=".$_SESSION['lastId'];
    
 echo "<img style='width:500px; height:500px;' src='$chemin' ><br><br>"; 
 ?>  
   
   
   
<a href="<?php echo $chemin?>" download class="boutonEnregistrer" id="bouton"> Télécharger </a>&nbsp;
    <a href="index.php" class="boutonEnregistrer" id="boutonRetour"> Retour </a><br><br>
  <form action=""><input style='width:500px;' type="text" value="<?php echo $url  ?>"></form> <br><br>
    
    <a href="https://twitter.com/intent/tweet/?url=<?php echo $url ?>&text=text&via=BorisDEBOT">Tweet</a>

    </div>
    
<footer><p>EBImage, tous droits réservés | <a href="mailto:esteban.d@codeur.online">esteban.d@codeur.online</a></p></footer>  
  
<script>
$('#bouton,#boutonRetour').on('click',function() {
        
     $.ajax({
                type: "POST",
                url: "close.php",
     
            });
     
     
     
     }); 
    
    
    
</script>
<!--<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script> -->
</body>


</html>



