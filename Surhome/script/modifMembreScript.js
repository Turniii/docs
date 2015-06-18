
            var choix=true;
            $(document).ready(function(){
                $(".modifChamp").click(function(){
                    if (choix==true){
                    var OriginalContent = $(this).text();
                    $(this).html("<input type='text' value='" + OriginalContent + "' />");
                    $(this).children().first().focus();
                    choix = false;
                }
                    $(this).children().first().keypress(function (e) {
                    if (e.which == 13) { 
                        var newContent = $(this).val();
                        var inputHidden = $(this).parent().attr("id");
                        document.getElementById("nouveau"+inputHidden).value =newContent;
                        $(this).parent().text(newContent);
                        choix=true;
                    }});
                    $(this).children().first().blur(function(){
                     var newContent = $(this).val(); 
                    var inputHidden = $(this).parent().attr("id");
                    document.getElementById("nouveau"+inputHidden).value =newContent;
                     $(this).parent().text(newContent);
                     choix=true;
                });
            });
            });
            var choix2=true;
            $(document).ready(function(){
                $(".modifChamp1").click(function(){
                    if (choix2==true){
                    
                    $(this).html("<select name='pays' id='pays'>\n\
        <option value='France'>France</option>\
        <option value='Espagne'>Espagne</option>\
        <option value='Italie'>Italie</option>\
        <option value='Royaume-uni'>Royaume-Uni</option>\
        <option value='Allemagne'>Allemagne</option>\
        <option value='Suisse'>Suisse</option>\
        <option value='Belgique'>Belgique</option>\
        <option value='Luxembourg'>Luxembourg</option>\
        </select>");
                    $(this).children().first().focus();
                    choix2 = false;
                }
                    $(this).children().first().keypress(function (e) {
                    if (e.which == 13) { 
                        var newContent = $(this).val();
                        var inputHidden = $(this).parent().attr("id");
                        document.getElementById("nouveau"+inputHidden).value =newContent;
                        $(this).parent().text(newContent);
                        choix2=true;
                    }});
                    $(this).children().first().blur(function(){
                     var newContent = $(this).val(); 
                     var inputHidden = $(this).parent().attr("id");
                     document.getElementById("nouveau"+inputHidden).value =newContent;
                     $(this).parent().text(newContent);
                     choix2=true;
                });
            });
            });
            
            var choix3=true;
            $(document).ready(function(){
                $(".modifChamp2").click(function(){
                    if (choix3==true){
                    var regex = /^[0-9]{5}$/;
                    var OriginalContent = $(this).text();
                    $(this).html("<input type='text' value='" + OriginalContent + "' />");
                    $(this).children().first().focus();
                    choix3 = false;
                }
                    $(this).children().first().keypress(function (e) {
                    if (e.which == 13) { 
                        choix3=true;
                        var newContent = $(this).val();
                        
                        if (regex.test(newContent)){
                        var inputHidden = $(this).parent().attr("id");
                        document.getElementById("nouveau"+inputHidden).value =newContent;
                        $(this).parent().text(newContent);}
                        else {$(this).parent().text(OriginalContent);
                        alert("Code postal non valide");
                    }}});
                    $(this).children().first().blur(function(){
                     var newContent = $(this).val(); 
                     if (regex.test(newContent)){
                        var inputHidden = $(this).parent().attr("id");
                        document.getElementById("nouveau"+inputHidden).value =newContent;
                        $(this).parent().text(newContent);}
                        else {$(this).parent().text(OriginalContent);
                         alert("Code postal non valide");}
                     choix3=true;
                });
            });
            });
            var choix4=true;
            $(document).ready(function(){
                $(".modifChamp3").click(function(){
                    if (choix4==true){
                    var regex = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
                    var OriginalContent = $(this).text();
                    $(this).html("<input type='text' value='" + OriginalContent + "' />");
                    $(this).children().first().focus();
                    choix4 = false;
                }
                    $(this).children().first().keypress(function (e) {
                    if (e.which == 13) { 
                        choix4=true;
                        var newContent = $(this).val();
                        
                        if (regex.test(newContent)){
                        var inputHidden = $(this).parent().attr("id");
                        document.getElementById("nouveau"+inputHidden).value =newContent;
                        $(this).parent().text(newContent);}
                        else {$(this).parent().text(OriginalContent);
                        alert("Adresse mail non valide");
                    }}});
                    $(this).children().first().blur(function(){
                     var newContent = $(this).val(); 
                     if (regex.test(newContent)){
                        var inputHidden = $(this).parent().attr("id");
                        document.getElementById("nouveau"+inputHidden).value =newContent;
                        $(this).parent().text(newContent);}
                        else {$(this).parent().text(OriginalContent);
                         alert("Adresse mail non valide");}
                     choix4=true;
                });
            });
            });
        
function changeMail () {
    var regex = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    var mail = prompt("Entrez votre nouvelle adresse mail.", "");
    if (mail != null && regex.test(mail)){
    var mail2=prompt("Confirmez votre adresse mail.","");
    }
    else alert("L'adresse mail entrée n'est pas valide.");
    if (mail2 != null){
        if (mail==mail2 && regex.test(mail)){
        document.getElementById("Mail").innerHTML =mail;
        document.getElementById("nouveauMail").value =mail;
    }
        else alert("Les entrées ne correspondent pas ou l'adresse mail entrée n'est pas valide.");
        
    }
}
function changeMdp () {
    var regex = /^[a-zA-Z0-9]{8,}$/;
    var regex2 = /[0-9]{2,}/;
    var regex3 = /[a-zA-Z]{2,}/;
    var mdp = prompt("Entrez votre nouveau mot de passe.", "");
    if (mdp != null && regex.test(mdp) && regex2.test(mdp) && regex3.test(mdp)) {
    var mdp2=prompt("Confirmez votre nouveau mot de passe.","");
    }
    else alert("Le mot de passe entré est invalide.");
    if (mdp2 != null){
       if (mdp==mdp2){
        document.getElementById("modMdp").value = "true";
        document.getElementById("nouveauMdp").value = mdp2;
    }
    else alert("Les entrées ne correspondent pas.");
    }
}
  function testtt() {
      alert(document.getElementById("nouveauAdresse").value);
  }
