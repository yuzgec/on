    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <link rel="icon" type="image/png" href="/fav.png" />
    <link rel="stylesheet" href="/front/css/revolutionslider/settings.css" />

    <link rel="stylesheet" href="/front/css/plugins.css?v=4.0"/>
    <link rel="stylesheet" href="/front/css/revolutionslider/settings.css" />
    <link rel="stylesheet" href="/front/css/theme.css?v=4.0"/>
    <link rel="stylesheet" href="/front/content/portfolio/css/portfolio.css?v=4.0" />
    <link rel="stylesheet" href="/front/content/seta/css/seta.css?v=4.0" />
    <link rel="stylesheet" href="/front/css/skins/skin-seta.css" />
    <link rel="stylesheet" href="/front/css/skins/skin-portfolio.css" />
    <link rel="stylesheet" href="/front/css/blog.css" />
    <link rel="stylesheet" href="/front/css/components/quadra/gold.punch.navigation.css"/>
    <link rel="stylesheet" href="/front/css/components/semantic.min.css"/>

    <style>
        .cbp-item .work-image{-webkit-transform:scale(1);transform:scale(1); -webkit-transition:transform 0.5s;transition:transform 0.5s;}
        .cbp-item:hover .work-image{-webkit-transform:scale(1.03);transform:scale(1.03);}
        /* Details animation */
        .cbp-item .details{opacity:0;-webkit-transform:scale(1.04) perspective(1000px);transform:scale(1.04) perspective(1000px);-webkit-transition:all 0.5s;transition:all 0.5s;}
        .cbp-item:hover .details{opacity:1;-webkit-transform:scale(1) perspective(1000px);transform:scale(1) perspective(1000px);}
        /* Texts and line animations */
        .cbp-item .details .title, .cbp-item .details .tag{opacity:0;-webkit-transform:translateY(15px);transform:translateY(15px);-webkit-transition:all 0.5s;transition:all 0.5s;}
        .cbp-item:hover .details .title, .cbp-item:hover .details .tag{opacity:1;-webkit-transform:translateY(0px);transform:translateY(0px);}
        .cbp-item:hover .details .tag{-webkit-transition-delay:0.1s;transition-delay:0.1s;}
        .cbp-item .details .line{-webkit-transition:all 0.3s;transition:all 0.3s;}
        .cbp-item:hover .details .line{width:70px!important;}
    </style>

<style>
    /* SIDEBAR */
    #sidebar{z-index:2725!important;width:350px;position:fixed!important;}
    #sidebar.top{max-height:75%;padding:0;}
    #sidebar.bottom{max-height:50%;padding:0;}
    .pushable>.pusher{z-index:1010!important;}
    body #sidebar.right + .pusher.dimmed{-webkit-transform:translate3d(-100px,0,0)!important;transform:translate3d(-100px,0,0)!important;}
    body #sidebar.left + .pusher.dimmed{-webkit-transform:translate3d(100px,0,0)!important;transform:translate3d(100px,0,0)!important;}
    .pushable>.pusher:after{z-index:2500;-webkit-transition:all 0.2s;transition:all 0.2s; background: rgba(26,26,26,0.27) !important;}
</style>
        