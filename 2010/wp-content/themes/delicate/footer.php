</div><!-- END WRAPPER .CONTAINER -->

<?php require ( DELICATE_INCLUDES . "/variables.php" ); ?>

<!-- THIS CLEARS ALL FLOATS -->
<div class="clear">&nbsp;</div>

<div id="footer-wrapper">
	<div class="sponsors">
	<h3>In Association With</h3>
    
    	<ul>
            <li><a href="http://www.salt-solutions.co.uk/" rel="external"><img src="<?php bloginfo('template_directory'); ?>/images/salt-solutions.jpg" alt="Salt Event Solutions" /></a></li>
                    
        	<li><a href="http://www.kirstyburgoine.co.uk" rel="external"><img src="<?php bloginfo('template_directory'); ?>/images/kirsty-burgoine.png" alt="Kirsty Burgoine Web Development"  /></a></li>
            
            <li><a href="http://www.talis.com/platform" rel="external"><img src="<?php bloginfo('template_directory'); ?>/images/talis-logo.jpg" alt="talis Platform" /></a></li>
            
                        
            
            
            
             <li><a href="http://www.stonehousephotographic.com/" rel="external"><img src="<?php bloginfo('template_directory'); ?>/images/stonehouse-photo.jpg" alt="Stonehouse Photographic" /></a></li>
             
             
            <li><a href="http://www.stonehousebrewery.co.uk/" rel="external"><img src="<?php bloginfo('template_directory'); ?>/images/stonehouse-brewery.jpg" alt="Stonehouse Brewery" /></a></li>
            
            <li><a href="http://www.creativeboom.co.uk/shrewsbury/" rel="external"><img src="<?php bloginfo('template_directory'); ?>/images/creative-boom-shrewsbury.jpg" alt="Creative Boom Shrewsbury" /></a></li>
            
            <li><a href="http://www.boomerangpr.com" rel="external"><img src="<?php bloginfo('template_directory'); ?>/images/boomerang-logo.jpg" alt="Boomerang Digital Communications" /></a></li>

            
			
            <li><a href="http://www.myenterprise.tv/" rel="external"><img src="<?php bloginfo('template_directory'); ?>/images/emn-white.jpg" alt="My Enterprise TV" /></a></li>
            
            
            
            
            <li><a href="http://www.anilamrit.co.uk/" rel="external"><img src="<?php bloginfo('template_directory'); ?>/images/anil-amrit.jpg" alt="Anil Amrit - Graphic and Web Design" /></a></li>
            
             <li><a href="http://www.shropshirelive.com/" rel="external"><img src="<?php bloginfo('template_directory'); ?>/images/shropshirelive.jpg" alt="Shropshire Live" /></a></li>
            
           
            

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
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/library/scripts/jcycle.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/library/scripts/prettyphoto.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/library/scripts/superfish.js"></script>

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

<script type="text/javascript"> Cufon.now(); </script>


</body><!-- END BODY -->

</html><!-- END HTML -->