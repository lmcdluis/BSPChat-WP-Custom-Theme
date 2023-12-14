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

    $('.brands-carousel').owlCarousel({
      "loop": true,
      "lazyLoad": true,
      "autoplay": true,
      "center": true,
      "autoplayTimeout": 3000,
      "responsive": {
        0:{
            items:2,
            nav:true,
            loop: true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:true
        }
    }
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
    $(window).scroll(function(e){
      if($(this).scrollTop() > 1 && $(this).width() > 480){
        $('#main-navbar').addClass('scrolled');
      } else {
        $('#main-navbar').removeClass('scrolled');
      }
    })

    function hideHeaderAndFooterLoginPage(){
      var url = window.location.pathname;
      if(url === '/bsp-login/'){
       $('.navbar, footer').addClass('d-none');
       $('.login-content').css('min-height', '100vh')
      } 
    }
    hideHeaderAndFooterLoginPage();

    $('#wp-submit').addClass('btn btn-green');
    $('#custom_loginform input[name="log"], #custom_loginform input[name="pwd"]').addClass('form-control');

    $('#close-modal-contact').on('click', function(e){
      e.preventDefault();
      $('#wpforms-form-217').trigger("reset");
    });

    $('iframe[src*="https://www.youtube.com/embed/"]').addClass("youtube-iframe");
    $('#close-modal-video').on('click', function(){
      var _iframe = $('iframe')[0];
      _iframe.parentNode.removeChild(_iframe);
    });

    function autoPlayVideo(id){
      "use stric";
      $('#youtube-container').html('<iframe width="100%" height="515" id="youtube-demo-video" src="https://www.youtube.com/embed/'+id+'?autoplay=1&loop=1&rel=0&wmode=transparent" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>')
    }


    $('.video-button').on('click', function(){
      autoPlayVideo('bKb42vCVBGk');
    })

    function showModalWithUrl (){
      var urlSite = $(location).attr('hash');
      if(urlSite === "#demo-modal"){
        autoPlayVideo('bKb42vCVBGk');
      }
    }
    showModalWithUrl();
   })
})(jQuery);