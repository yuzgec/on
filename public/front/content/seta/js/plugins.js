
// Start Window Load Function
$(window).on('load', function() {

    'use strict';

    //  CLOCK OPTIONS
    var intVal, myclock;
    //clock plugin constructor
    $('#myclock').thooClock({
       size:220,
       showNumerals:true,
       dialColor:'#bababa',
       dialBackgroundColor:'transparent',
       secondHandColor:'#EB4242',
       minuteHandColor:'#EB4242',
       hourHandColor:'#EB4242',
       alarmHandColor:'#FFFFFF',
       alarmHandTipColor:'#fff',
       hourCorrection:'+0',
       brandText:'Quadra',
       brandText2:'Punch Navigation',
       onEverySecond:function(){
            //callback that should be fired every second
       },
       //alarmTime:'15:10',
    });

    //Do something else when window loaded

// End Function
});


    //*********************************************
    //  PORTFOLIO SECTION
    //*********************************************

        (function($, window, document, undefined) {
            'use strict';


            // init SHOP items
            $('#product-items').cubeportfolio({
                mediaQueries: [{
                    width: 1440,
                    cols: 3,
                    options: {
                          gapHorizontal: 100,
                          gapVertical: 120,
                      }
                },{
                    width: 1168,
                    cols: 3,
                    options: {
                          gapHorizontal: 70,
                          gapVertical: 50,
                      }
                },{
                    width: 992,
                    cols: 3,
                }, {
                    width: 540,
                    cols: 2,
                }, {
                    width: 480,
                    cols: 1,
                }],
                layoutMode: 'grid',
                gridAdjustment: 'responsive',
                drag: true,
                auto: false,
                autoTimeout: 5000,
                autoPauseOnHover: true,
                showNavigation: true,
                showPagination: true,
                rewindNav: true,
                scrollByPage: false,
                gapHorizontal: 100,
                gapVertical: 120,
                caption: 'none',
                animationType: 'quicksand',
                displayType: 'none',
                displayTypeSpeed: 0,
            });

        })(jQuery, window, document);
