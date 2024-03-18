
// Start Window Load Function
$(window).on('load', function() {

    'use strict';

    $(".career-btn, .career-close").on("click", function(){
        var target = $(".career");
        if ($(target).hasClass("working")) {
            return false;
        } if($(target).hasClass("closed")){
            $(target).addClass("working open").removeClass("closed");
            $('html, body').stop().animate({
                scrollTop : $("#career").offset().top  + "px"
            }, 1120, 'easeInOutExpo');
            setTimeout( function(){ $(target).removeClass("working"); }, 1000);
        } else{
            $(target).addClass("working closed").removeClass("open");
            setTimeout( function(){ $(target).removeClass("working"); }, 1000);
        }
        return false;
    });

});
