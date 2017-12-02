$(document).ready(function() {

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
    *	In the footer, bring Monster Dude up from behind the bridge
    *	as user scrolls down the page and footer comes into view
    *	using parallax scrolling
    **/

    // Hide monster dude in footer fom view by loading outside the containing div on page load
    // Check position of user's browser
    // When the user's browser is XXXX px from the bottom of the page start parallax scroll
    // When the footer is in full view stop the scroll

});
