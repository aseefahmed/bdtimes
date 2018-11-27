(function($) {
    "use strict";
    jQuery(document).ready(function($) {
        // Off canvas menu
        $(".menu-trigger").on("click", function() {
            $(".off-canvas-menu, .off-canvas-overlay").addClass("active");
            return false;
        })
        $(".menu-close, .off-canvas-overlay").on("click", function() {
            $(".off-canvas-menu, .off-canvas-overlay").removeClass("active");
        });
        // Owl carousel
        $(".breakingnews-carousel, .entertainment-carousel, .politics-carousel, .sports-carousel, .big-section-slider, .video-slides, .photo-gallary-slides, .viral-carousel, .video-gallary-slides").owlCarousel({
            items: 1,
            autoplay: false,
            nav: true,
            dots: true,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
        // magnific popup
        $('.video-play-btn, .service-video').magnificPopup({
            type: 'video',
        });
        // ad close
        $("a.ad-close-btn").click(function() {
            $(".ad").addClass("hidden");
            return false;
        });
        $(".ad-close-btn-left").click(function() {
            $(".single-long-ad-left").addClass("hidden");
            return false;
        });
        $(".ad-close-btn-right").click(function() {
            $(".single-long-ad-right").addClass("hidden");
            return false;
        });
        // double ad
        $("#sticker").sticky({
            topSpacing: 0
        });
        //Check to see if the window is top if not then display button
        $(window).scroll(function() {
            if ($(this).scrollTop() > 200) {
                $('.scrollToShow').fadeIn();
            } else {
                $('.scrollToShow').fadeOut();
            }
        });
        
        // search bar
        $(".search-btn").on('click', function(){
            $("input.search-input").addClass("search-active");
            $(".profile-img").addClass("no-img");
        });
        
        $(".logo").on('click', function(){
            $("input.search-input").removeClass("search-active");
            $(".profile-img").removeClass("no-img");
        });
        
        // ===== Scroll to Top ==== 
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 200) {        // If page is scrolled more than 50px
                $('#return-to-top').fadeIn(200);    // Fade in the arrow
            } else {
                $('#return-to-top').fadeOut(200);   // Else fade out the arrow
            }
        });
        $('#return-to-top').click(function() {      // When arrow is clicked
            $('body,html').animate({
                scrollTop : 0                       // Scroll to top of body
            }, 500);
        });
    });
    jQuery(window).load(function() {});
}(jQuery));