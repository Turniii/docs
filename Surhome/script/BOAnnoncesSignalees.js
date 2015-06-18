
            var choix2= true;
        $(document).ready(function(){
                $(".BOSup").click(function() {
                    
                    var textOrigine=$(this).text();
                    var idAnnonce = $(this).parent().parent().html().split('<span>');
                    idAnnonce = idAnnonce[1].split('</span>');
                    $(this).addClass("editing");
                    if (choix2==true){
                    $(this).html("<form method='post' action='../controler/content.php?page=BOAnnoncesSignalees&suppression=true'>En êtes vous sûr ? :<input type='hidden' name='idAnnonce' value="+idAnnonce[0]+"/> <input name='val' id='val' type='submit' value='Oui'/>");
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
           
