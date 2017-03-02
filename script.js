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
        