
            var etat=["0","0","0","0","0","0"];
                    function verification(id_elem,regex,index){
                        var x = document.getElementById(id_elem).value;
                        var regex = regex;
                        if (regex.test(x)){
                        etat[index]=1;}
                        else etat[index]=0;
                    }
                    function verification2(id_elem,index){
                        var x = document.getElementById(id_elem).value;
                        var regex = /^[a-zA-Z0-9]{8,}$/;
                        var regex2 = /[0-9]{2,}/;
                        var regex3 = /[a-zA-Z]{2,}/;
                        if(regex.test(x) && regex2.test(x) && regex3.test(x)){
                            etat[index]=1;}
                        else etat[index]=0;
                    }
                    
                    function alertVerif(index){
                            for (var i=0; i<etat.length; i++){
                                
                                if(etat[i]==0){
                                    if (i==0 && index==0){
                                        alert("Adresse mail non valide");}
                                    if (i==1  && index==1){
                                        alert("Remettre la bonne adresse mail");}
                                    if (i==2 && index==2){
                                        alert("Mot de passe non valide (8 caractères minimum avec 2 chiffres et 2 lettres");}
                                    if (i==3 && index==3){
                                        alert("Remettre le bon mot de passe");}
                                    if (i==4 && index==4){
                                        alert("Date de naissance non valide");}
                                    if (i==5 && index==5){
                                        alert("Code postal non valide");}
                                    }   
                                    }
                                };
                    function confMail(){
                        if ($('#adresse_mail').val()!==$('#confirmer_adresse_mail').val()){
                            $('#confirmer_adresse_mail').attr("style","border:1px solid red");
                        }
                        else {
                            $('#confirmer_adresse_mail').attr("style","border:1 solid grey");
                        }
                       
                    }
                    function confMdp(){
                        if ($('#mdp').val()!==$('#confirmer_mdp').val()){
                            $('#confirmer_mdp').attr("style","border:red 1px solid");
                        }
                        else {
                            $('#confirmer_mdp').attr("style","border:1px solid grey");
                        }
                       
                    }
                    
                    function verifNaissance(){
                        var now = new Date();
                        var annee   = now.getFullYear();
                        var mois    = now.getMonth() + 1;
                        var jour    = now.getDate();
                        var dateNaissance = $('#date_de_naissance').val();
                        var dateYear="";
                        var dateMonth="";
                        var dateDay="";
                        for (var i=6; i<10; i++){
                            dateYear+=dateNaissance[i];
                        }
                        for (var j=3; j<5; j++){
                            dateMonth+=dateNaissance[j];
                        }
                        for (var l=0; l<2; l++){
                            dateDay+=dateNaissance[l];
                        }
                        
                        if(annee-dateYear<18){
                            
                            alert("Vous devez avoir 18 ans pour vous inscrire sur le site");
                            $('#date_de_naissance').attr("style","border:1px solid red");
                        }
                         else if (annee-dateYear==18){
                            if (mois>dateMonth){
                                $('#date_de_naissance').attr("style","border:green 1px solid");
                            }
                            else if (mois==dateMonth){
                                if (jour>dateDay || jour==dateDay){
                                    $('#date_de_naissance').attr("style","border:green 1px solid");
                                }
                                
                                else if(jour<dateDay) {
                                    alert("Vous devez avoir 18 ans pour vous inscrire sur le site");
                                    $('#date_de_naissance').attr("style","border:1px solid red");
                                }
                            }
                        }
                        else {
                            $('#date_de_naissance').attr("style","border:green 1px solid");
                        }
                     }
                        function inArray(needle, haystack) {
                            var length = haystack.length;
                            for (var i = 0; i < length; i++) {
                                if (haystack[i] == needle)
                                    return false;
                                    alert("Les champs requis n'ont pas été tous renseignés");
                            }
                            return true;
                        }