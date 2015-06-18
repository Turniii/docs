
            $(document).ready(function(){
                $("#recherche_avancee").click(function(){
                    $("#fin_recherche").slideToggle("slow");
                    
                });
            });
            

            $(document).ready(function(){

            var $carrousel = $('#carrousel'),
                $img = $('#carrousel li img'),
                indexImg = $img.length - 1,
                i = 0,
                $currentImg = $img.eq(i);

            $img.css('display', 'none');
            $currentImg.css('display', 'block');



            $('#suivant').click(function(){
                i++;
                if( i > indexImg ){
                    i = 0;
                }
                $img.css('display', 'none');
                $currentImg = $img.eq(i);
                $currentImg.css('display', 'block');
            });

            $('#precedent').click(function(){
                i--;
                if( i < 0 ){
                    i = indexImg;
                }
                $img.css('display', 'none');
                $currentImg = $img.eq(i);
                $currentImg.css('display', 'block');

            });

            function slideImg(){
                setTimeout(function(){

                    if(i < indexImg){
                        i++;
                    }
                    else{
                        i = 0;
                    }

                    $img.css('display', 'none');
                    $currentImg = $img.eq(i);
                    $currentImg.css('display', 'block');

                    slideImg();

                }, 7000);
            }

            slideImg();

            });
            
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

