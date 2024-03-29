<div id="sidebar" class="ui right sidebar vertical scrollbar-styled">
    <div class="d-flex flex-column align-items-between justify-content-start t-left  fullwidth mnh-full o-hidden" style="background-color: #ececec">
        <div>
          <iframe src="https://ondance.sporakademik.com/OnKayit" width="100%" style="height:100vh" class="mt-50 mb-30"></iframe>
        </div>
    </div>
</div>

<div id="cookie__notification_10_21553" class="cookie fixed bottom-30 right-30 right-0-sm px-15-sm fullwidth t-right pointer-events-none" data-expire="15">
    <div class="mxw-450 fullwidth bg-white bs-xl pt-50 pt-30-sm t-left d-inline-block pointer-events-all">
         <p class="fs-20 px-40 px-30-sm dark4 lh-30 light">
            Bu web sitesi size en iyi deneyimi sunmak için çerezleri kullanır.            <br>
             <a href="{{ route('home') }}" class="normal fs-16 underline gray7-hover">Detaylı Bilgi</a>
         </p>
         <button type="button" class="close bg-colored1 bg-colored-hover d-block fullwidth white bold lh-normal px-20 py-20 fs-12 uppercase slow-sm mt-40">Kabul Et</button>
    </div>
 </div>
 
 <div class="qcf bg-transparent radius-lg bs-xl unselectable">
     <div class="bg-colored px-30 py-40 t-left">
         <img src="/logob.png" class="block width-40" alt="website logo template">
         <h5 class="light fs-18 white mt-30">Hızlı İletişim</h5>
         <p class="fs-16 white lh-25 mt-10">Formu kullanrak bize hızlı mesaj gönderebilirsiniz👋.</p>
     </div>
     <form class="validate-me pt-15 bg-white" name="quick_form" method="post" action="">
        <input type="email" name="qemail" id="qemail" required placeholder="Adınız Soyadınız" autocomplete="off" class="fs-14 py-20 px-30 b-0 bb-1 b-gray">
        <input type="email" name="qemail" id="qemail" required placeholder="E-Mail Adresiniz" autocomplete="off" class="fs-14 py-20 px-30 b-0 bb-1 b-gray">
        <textarea name="qmessage" id="qmessage" required placeholder="Mesajınız" class="fs-14 py-20 px-30 height-120 mt-5 b-0 bb-1 b-gray"></textarea>
         <div class="mt-50 t-right py-30 px-30 d-flex justify-content-end align-items-center">
             <a href="{{ route('home')}}" class="fs-12 medium colored">Hakkımda</a>
             <button type="submit" id="qsubmit" class="fs-12 black medium ml-15 py-0 bg-white dark-loading">Mesajı Gönder</button>
         </div>
     </form>
 </div>
 <div class="qcf-backdrop"></div>

 <a href="#" class="drop-msg b-1 b-gray1 qcf-trigger circle width-60 width-50-sm height-60 height-50-sm bg-white gray7 bg-colored-active white-active">
     <i class="ti-headphone-alt fs-22 show"></i>
     <i class="ti-close fs-20 cls"></i>
 </a>

 <a id="back-to-top" href="#top" class="btt b-1 b-gray1 circle width-60 width-50-sm height-60 height-50-sm bg-white gray7">
     <i class="ti-angle-up fs-18"></i>
 </a>
 <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
 <script>iFrameResize({},'#paytriframe');</script>


<script src="/front/js/jquery.min.js?v=3"></script>
<script src="/front/js/bs.js?v=5.1.3"></script>
<script src="/front/js/components/quadra/gold.punch.navigation.js"></script>
<script src="/front/js/scripts.js?v=3.0"></script>
<script src="/front/content/portfolio/js/plugins.js?v=3"></script>
<script src="/front/js/components/masonry.pkgd.min.js"></script>
<script src="/front/content/seta/js/plugins.js?v=3"></script>
<script src="/front/js/components/quadra/gold.shop.js"></script>

<script>
	$(document).ready(function() {
		$("table").addClass("table table-hover table-striped table-bordered table-responsive");
        $("img").addClass('img-fluid');
	})
</script>