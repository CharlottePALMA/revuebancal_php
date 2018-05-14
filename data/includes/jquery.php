        <script>
            $(function(){
                
                var top = 180;
                
                function size(){
                    top = 180;
                    if(parseInt($('body').css('width')) < 1175)
                        top = 0;
                }
                size();
                $( window ).resize(function() {
                    
                    size();
                });
                //Au scroll dans la fenetre on déclenche la fonction
                $(window).scroll(function () {
                    //si on a défilé de plus de 180px du haut vers le bas
                    if ($(this).scrollTop() > top) { 
                        //on ajoute la classe "blanc" au header
                        $('header').addClass('blanc');
                        $('body').addClass('saut');
                    } else {
                        //sinon on retire la classe "blanc" (c'est pour laisser le header à son endroit de départ lors de la remontée
                        $('header').removeClass('blanc');
                        $('body').removeClass('saut');
                        $('header ul').removeClass('open');
                        $('header form').removeClass('open');
                        $('.burger').removeClass('croix');
                    }
                    //on annule le comportement du lien
                return false;
                });
                
                $('#recherche').click(function(){
                    if($('.rechercher').hasClass('cache')){
                        
                        $('.rechercher').removeClass('cache');
                        $('.rechercher').addClass('visible');
                        
                        $('#recherche').removeClass('visible');
                        $('#recherche').addClass('cache');

                        $('.valider').removeClass('cache');
                        $('.valider').addClass('visible');  
                    };
                return false;
                }); 
                
                $(".pagination").on("click", "a", function(e){
                    //e.preventDefault() && e.stopPropagation();
                    $('form input#page').val($(this).data('page'));
                    $('form input#page').closest('form').submit();
                })
                
                $('.burger').click(function(){
				    $('header ul').toggleClass('open');
                    $('header form').toggleClass('open');
                    if($('.burger').hasClass('croix')){
                       $('.burger').removeClass('croix');
                    }else{
                        $('.burger').addClass('croix');
                    }
                    
                })

            });
        </script>