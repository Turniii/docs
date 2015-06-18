
                    var j=3;
                    var button_photo_ajout = document.getElementById("button_photo_plus");
                    button_photo_ajout.addEventListener("click",function(){                    
                    if (j<7){
                        j++;                       
                    var ajout = document.createElement("input");
                    ajout.type = "file";                  
                    ajout.setAttribute ('style',"width:200px; font-size:10px; color:white;");
                    document.getElementById("photo").appendChild(ajout);}},false);
            
                    var i=$("#nbr_serv").val();
                    var button_service_ajout = document.getElementById("button_service_plus");
                    button_service_ajout.addEventListener("click",function(){
                    if (i<10){
                    i++;                       
                    var ajout = document.createElement("input");
                    ajout.type = "text";
                    var nom='Service n°'.concat(i);
                    ajout.setAttribute ('size','60');
                    ajout.setAttribute ('placeholder',nom);
                    ajout.setAttribute ('name','services_supp[]');
                    document.getElementById("service").appendChild(ajout);}},false);
            
                    var k=$("#nbr_con").val();
                    var button_contrainte_ajout = document.getElementById("button_contrainte_plus");
                    button_contrainte_ajout.addEventListener("click",function(){
                    if (k<10){
                    k++;                       
                    var ajout = document.createElement("input");
                    ajout.type = "text";
                    var nom='Contrainte n°'.concat(k);
                    ajout.setAttribute ('size','60');
                    ajout.setAttribute ('placeholder',nom);
                    ajout.setAttribute ('name','contraintes_supp[]');
                    document.getElementById("contrainte").appendChild(ajout);}},false);
            
                    var l=$("#nbr_prox").val();
                    var button_proximite_ajout = document.getElementById("button_proximite_plus");
                    button_proximite_ajout.addEventListener("click",function(){
                    if (l<10){
                    l++;                       
                    var ajout = document.createElement("input");
                    ajout.type = "text";
                    var nom='Proximité supplémentaire n°'.concat(l);
                    ajout.setAttribute ('size','60');
                    ajout.setAttribute ('placeholder',nom);
                    ajout.setAttribute ('name','proximites_supp[]');
                    document.getElementById("proximite").appendChild(ajout);}},false);
            
                    var m=$("#nbr_equip").val();
                    var button_equipement_ajout = document.getElementById("button_equipement_plus");
                    button_equipement_ajout.addEventListener("click",function(){
                    if (m<10){
                    m++;                       
                    var ajout = document.createElement("input");
                    ajout.type = "text";
                    var nom='Equipement supplémentaire n°'.concat(m);
                    ajout.setAttribute ('size','60');
                    ajout.setAttribute ('placeholder',nom);
                    ajout.setAttribute ('name','equipements_supp[]');
                    document.getElementById("equipements").appendChild(ajout);}},false);
                    
                    var etat=["0","0","0","0"];
                    function verification(id_elem,regex,index){
                        var x = document.getElementById(id_elem).value;
                        var regex = regex;
                        if (regex.test(x)){
                        etat[index]=1;}
                        else etat[index]=0;
                    }
                    
                    function alertVerif(index){
                            for (var i=0; i<etat.length; i++){
                                
                                if(etat[i]==0){
                                    if (i==0 && index==0){
                                        alert("Code postal non valide");}
                                    if (i==1  && index==1){
                                        alert("Date début de disponibilité non valide");}
                                    if (i==2 && index==2){
                                        alert("Date fin de disponibilité non valide");}
                                    if (i==3 && index==3){
                                        alert("Taille de la maison non valide");}
                                    }   
                                    }
                                };
                    
                    
                    function inArray(needle, haystack) {
                    var length = haystack.length;
                    for(var i = 0; i < length; i++) {
                        if(haystack[i] == needle) return false;
                    }
                    return true;
                    }
                    
 
