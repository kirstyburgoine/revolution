jQuery(document).ready(function(){

// BEGIN SUPERFISH
$('ul.sf-menu').superfish({ 
	delay:       400,								// DELAY ON MOUSEOUT
	animation:   {opacity:'show', height:'show'},	// FADE-IN AND SLIDE-DOWN ANIMATION
	speed:       'fast',							// ANIMATION SPEED
	autoArrows:  false,								// DISABLE GENERATION OF ARROW MARK-UP
	dropShadows: false								// DISABLE DROP SHADOWS
}); 
// END SUPERFISH



// BEGIN SCROLL TO TOP
$('a[href*=#header]').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
		&& location.hostname == this.hostname) {
		var $target = $(this.hash);
		$target = $target.length && $target
		|| $('[name=' + this.hash.slice(1) +']');
		if ($target.length) {
		var targetOffset = $target.offset().top;
		$('html,body')
		.animate({scrollTop: targetOffset}, 1000);
		return false;
		}
	}
});
// END SCROLL TO TOP

});