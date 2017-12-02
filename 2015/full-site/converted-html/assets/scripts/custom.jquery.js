$(document).ready(function() {

    window.requestAnimFrame = (function(){
        return  window.requestAnimationFrame        ||
                window.webkitRequestAnimationFrame  ||
                window.mozRequestAnimationFrame     ||
            function( callback ){
                window.setTimeout(callback, 1000 / 60);
            };
    })();

    /**
    * Infinately rotate screenshots from previous conference websites in the 'monster dude' screen on the home page
    **/

    $('.bxslider').bxSlider({
        mode: 'vertical',
        useCSS: false,
        infiniteLoop: true,
        hideControlOnEnd: true,
        easing: 'easeOutElastic',
        speed: 3000,
        auto: true
    });

    /**
    * Rotate Buy Tickets background swirl on hover
    **/

    var interval;
    var degree = 0;

    function animateSwirl(swirlID) {
        if(interval) {
            clearInterval(interval);
        }
        interval = setInterval(function() {
            $(swirlID)
                .css('-webkit-transform', 'rotate('+degree+'deg)')
                .css('-moz-transform', 'rotate('+degree+'deg)')
                .css('-ms-transform', 'rotate('+degree+'deg)');
                degree++; degree++; degree++;
        }, 10);
    }

    $('#tickets-button').hover(
        function() {
            animateSwirl('#button-swirl');
        },
        function() {
            clearInterval(interval);
        }
    );

    $('#buy--tickets-button').hover(
        function() {
            animateSwirl('#buy--tickets-button-swirl');
        },
        function() {
            clearInterval(interval);
        }
    );

    /**
    *   In the footer, bring Monster Dude up from behind the bridge
    *   as user scrolls down the page and footer comes into view
    **/

    var monster = $('.footer-scene-monster');
    var win = $(window);
    var startScrollPos = $('.footer--sponsors').offset().top - 100;
    
    function scrollMonster() {
        monster.animate({
            bottom: 0,
            opacity: 1
        }, 1500);
    }

    win.scroll(function() {
        var pixelsScrolled = win.scrollTop();
        if (pixelsScrolled >= startScrollPos) {
            requestAnimFrame(scrollMonster);
        }
    });
    
    
});
