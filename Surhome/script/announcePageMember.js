
            $(document).ready(function(){
                $('#date_button').click(function(){
                    $('#liste').slideToggle();
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
