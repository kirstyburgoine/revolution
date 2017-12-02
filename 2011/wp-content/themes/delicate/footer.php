</div><!-- END WRAPPER .CONTAINER -->

<?php require ( DELICATE_INCLUDES . "/variables.php" ); ?>

<!-- THIS CLEARS ALL FLOATS -->
<div class="clear">&nbsp;</div>

<div id="footer-wrapper">
	<div class="sponsors">
	<h3>In Association With</h3>
    
    	<ul>
            
             <li><a href="http://typekit.com" rel="external" title="Typekit" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/typekit.png" alt="Typekit" style="padding-bottom: 15px;" /></a></li>
                    
        	<li><a href="http://8faces.com/" rel="external" title="8faces" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/8faces.png" alt="8faces"  /></a></li>
            
            <li><a href="http://www.thedrum.co.uk/" rel="external" title="The Drum" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/The-Drum.png" alt="The Drum" style="padding-bottom: 15px;" /></a></li>
            
            <li><a href="http://www.fivesimplesteps.com/" rel="external" title="5 Simple Steps" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/5-simple-steps.png" alt="5 Simple Steps" style="padding-bottom: 10px;" /></a></li>
            
        </ul>                
            
       
        
     </div>
     
     <div class="sponsors">
	<h3>Our Partners</h3>
    
    	<ul>
            <li><a href="http://www.salt-solutions.co.uk/" rel="external" title="Salt Event Solutions" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/salt-solutions.png" alt="Salt Event Solutions" /></a></li>
                    
        	<li><a href="http://www.kirstyburgoine.co.uk" rel="external" title="Kirsty Burgoine Web Design and Development" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/kirsty-burgoine.png" alt="Kirsty Burgoine Web Design and Development"  /></a></li>
            
            <li><a href="http://www.kasabi.com/" rel="external" title="Kasabi" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/kasabi.png" alt="Kasabi" /></a></li>
            
        </ul>                
            
        <ul>    
            
             <li><a href="http://www.orlylyndon.com/" rel="external" title="Orly Lyndon - The Boutique Photographer" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/orly-lyndon.png" alt="Orly Lyndon - The Boutique Photographer" /></a></li>
             
            <li><a href="http://www.myenterprise.tv/" rel="external" title="My Enterprise TV" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/emn-white.jpg" alt="My Enterprise TV" /></a></li>
            
            <li><a href="http://www.pebblepr.com/" rel="external" title="Pebble PR &amp; Freelance Writing" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/pebble-pr.png" alt="Pebble PR &amp; Freelance Writing" /></a></li>
            

        </ul>
        
     </div>
    
	<div class="container">
		
    	<div id="site-info" class="alignleft">
			<?php echo do_shortcode( __( delicate_footer_content ( get_setting('footer_content') ) ) ); ?>
		</div><!-- END #SITE-INFO .ALIGNLEFT -->
	</div><!-- END .CONTAINER -->
</div><!-- END #FOOTER-WRAPPER -->

<?php get_sidebar('subsidiary'); ?>

<!-- THIS CLEARS ALL FLOATS -->
<div class="clear">&nbsp;</div>

<?php if ( get_setting('tracking_code') <> "" ) { echo ( get_setting('tracking_code') ); } ?>

<!-- JAVASCRIPT FILES -->

<script type="text/javascript" src="<?php bloginfo('template_url') ?>/library/scripts/initiate.js"></script>
<?php /* <script type="text/javascript" src="<?php bloginfo('template_url') ?>/library/scripts/jcycle.js"></script> */ ?>

<script type="text/javascript" src="<?php bloginfo('template_url') ?>/library/scripts/prettyphoto.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/library/scripts/superfish.js"></script>

<script type="text/javascript" src="http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.latest.js"></script> 
<script type="text/javascript"> 
$(document).ready(function() {
    $('#homeimage').cycle({
		fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
	});
});
</script> 

<script>
    
    // Load theme
    Galleria.loadTheme('<?php bloginfo('template_url') ?>/library/src/themes/classic/galleria.classic.js');
    
    // run galleria and add some options
    $('#galleria').galleria({
        image_crop: false, // crop all images to fit
        thumb_crop: true, // crop all thumbnails to fit
		height: 550,
        transition: 'fade', // crossfade photos
        transition_speed: 700, // slow down the crossfade
        data_config: function(img) {
            // will extract and return image captions from the source:
            return  {
                title: $(img).parent().next('strong').html(),
                description: $(img).parent().next('span').next().html()
            };
        },
        extend: function() {
            this.bind(Galleria.IMAGE, function(e) {
                // bind a click event to the active image
                $(e.imageTarget).css('cursor','pointer').click(this.proxy(function() {
                    // open the image in a lightbox
                    this.openLightbox();
                }));
            });
        }
    });
    </script>

<!--[if IE 6]>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/library/scripts/pngfix.js"></script>
<![endif]-->

<?php /*
<script type="text/javascript"> Cufon.now(); </script>
*/ ?>

</body><!-- END BODY -->

</html><!-- END HTML -->