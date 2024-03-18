//show panel
        $(".panel .panel-button.theme-options").on("click", function(){
            $(".panel-switcher, .panel-backdrop").toggleClass("active"); 
         
            return false;
        });
        //Close panel
        $(".panel-backdrop").on("click", function(){
            $(".panel-switcher, .panel-backdrop").removeClass("active");
        });


        if ( $('.panel').exists() ){
            // show hide subnav depending on scroll direction
            $(window).on("scroll ", function () {
                var scroll = $(window).scrollTop();
                if ( $("#home").exists() ) {
                    if (scroll > 700) {
                        $('.panel').removeClass('hiding');
                    } else {
                        $('.panel').addClass('');
                    }
                } else{
                    $('.panel').removeClass('hiding');
                }
                
                if($(window).scrollTop() + $(window).height() === $(document).height()) {
                    $('.panel').removeClass('hiding');
                }
            });

            $(window).scroll();
        }
