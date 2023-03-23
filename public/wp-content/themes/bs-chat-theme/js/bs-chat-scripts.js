(function ($){
   $(document).ready(function (){
    $('.main-carousel').owlCarousel({
        "loop": true,
        "nav": true,
        "lazyLoad": true,
        "autoPlay": true,
        "animateIn": 'fadein',
        "items": 1,
        "center": true
    });

    //funcion para activar el loader
    //animacion para loading inicial
    preloaderFadeOutTime = 600;
    function fadePreloader() {
      var preloader = $(".loader-wrapper");
      preloader.fadeOut(preloaderFadeOutTime);
    }
    fadePreloader();

    //funcion para animar navbar
    $(window).scroll(function(){
      if($(window).scrollTop() >= 80 && $(window).width() > 480){
        $('#main-navbar').addClass('scrolled');
      } else {
        $('#main-navbar').removeClass('scrolled');
      }
    })
   })
})(jQuery);