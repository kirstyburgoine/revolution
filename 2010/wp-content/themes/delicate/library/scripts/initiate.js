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

// BEGIN PORTFOLIO
$('.portfolio-entry')
// .after('<div id="pagination">')
.cycle({
    timeout: 0,
    fx:     'fade',
    speed:  'fast',
    pager:  '#pagination',
	next:	'.next-button',
	prev:	'.previous-button'
});
// END PORTFOLIO

// BEGIN PRETTY PHOTO
$("a[rel^='prettyPhoto']").prettyPhoto({
	animationSpeed: 'normal', /* FAST/SLOW/NORMAL */
	padding: 40, /* PADDING FOR EACH SIDE OF THE PICTURE */
	opacity: 0.35, /* VALUE BETWEEN 0 AND 1 */
	showTitle: false, /* TRUE/FALSE */
	allowresize: true, /* TRUE/FALSE */
	counter_separator_label: '/', /* THE SEPARATOR FOR THE GALLERY COUNTER 1 OF 2 */
	theme: 'dark_rounded', /* LIGHT_ROUNDED/DARK_ROUNDED/LIGHT_SQUARE/DARK_SQUARE */
	callback: function(){}
});
// END PRETTY PHOTO

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