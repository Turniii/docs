
            var choix = true;
            var choix2= true;
            $(document).ready(function(){
                $(".BOBan").click(function() {
                    var textOrigine=$(this).text();
                    var idMembre = $(this).parent().html().split('.');
                    $(this).addClass("editing");
                     
                    if (choix==true){
                    $(this).html("<form method='post' action='../controler/content.php?page=BOListeMembre&ban=true'>Durée :<input type='hidden' name='idMembre' value="+idMembre[1]+"/><input name='duree' id='duree' type='number' style='width:40px;'/><input type='submit' value='V'/><br/>(jours)");
                    $(this).attr("style","color:black;");
                    $("#duree").focus();
                    choix = false;
                }
                $("#duree").blur(function(){
                $(this).parent().text(textOrigine);
                $(this).parent().removeClass("editing");
                choix = true;
                });
              }) ;  
            });
            $(document).ready(function(){
                $(".BOSup").click(function() {
                    var textOrigine=$(this).text();
                    var idMembre = $(this).parent().html().split('.');
                    $(this).addClass("editing");
                    if (choix2==true){
                    $(this).html("<form method='post' action='../controler/content.php?page=BOListeMembre&suppression=true'>En êtes vous sûr ? :<input type='hidden' name='idMembre' value="+idMembre[1]+"/> <input name='val' id='val' type='submit' value='Oui'/>");
                    $(this).attr("style","color:black;");
                    $("#val").focus();
                    choix2 = false;
                }
                $("#val").blur(function(){
                $(this).parent().text(textOrigine);
                $(this).parent().removeClass("editing");
                choix2 = true;
                });
              }) ;  
            });