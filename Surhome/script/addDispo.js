
            
            $(document).ready(function(){
                $('#date_button').click(function(){
                    $('#liste').slideToggle();
                });
            });
            
            function affichage_popup(nom_de_la_page, nom_interne_de_la_fenetre)
            {
                window.open (nom_de_la_page, nom_interne_de_la_fenetre, config='height=100, \n\
                width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, \n\
                location=no, directories=no, status=no');
            }
            
            var etat = ["0", "0"];
            function verification(id_elem, regex, index) {
                var x = document.getElementById(id_elem).value;
                var regex = regex;
                if (regex.test(x)) {
                    etat[index] = 1;
                }
                else
                    etat[index] = 0;
            }

            function alertVerif(index) {
                for (var i = 0; i < etat.length; i++) {

                    if (etat[i] == 0) {
                        if (i == 0 && index == 0) {
                            alert("Code postal non valide");
                        }
                        if (i == 1 && index == 1) {
                            alert("Taille de la maison non valide");
                        }
                    }
                }
            }
