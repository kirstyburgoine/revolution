<?php if ( is_sidebar_active('first-subsidiary') || is_sidebar_active('second-subsidiary') || is_sidebar_active('third-subsidiary') ) { ?>

<!-- THIS CLEARS ALL FLOATS -->
<div class="clear">&nbsp;</div>

<div id="subsidiary-wrapper">
	<div class="container clearfix">
		<div class="column grid-1 alpha">
			<div class="column grid-5 alpha">
				<?php if ( is_sidebar_active('first-subsidiary') ) {
					echo '<div id="first-subsidiary" class="subsidiary">'. "\n";
						dynamic_sidebar('first-subsidiary');
					echo '</div><!-- END #FIRST-SUBSIDIARY .SUBSIDIARY -->'. "\n";
				} ?>
			</div><!-- END .COLUMN .GRID-5 .ALPHA -->

			<div class="column grid-5 omega">
				<?php if ( is_sidebar_active('second-subsidiary') ) {
					echo '<div id="second-subsidiary" class="subsidiary">'. "\n";
						dynamic_sidebar('second-subsidiary');
					echo '</div><!-- END #SECOND-SUBSIDIARY .SUBSIDIARY -->'. "\n";
				} ?>
			</div><!-- END .COLUMN .GRID-5 .OMEGA -->
		</div><!-- END .COLUMN .GRID-1 .ALPHA -->

		<div class="column grid-4 omega">
				<?php if ( is_sidebar_active('third-subsidiary') ) {
					echo '<div id="third-subsidiary" class="subsidiary">'. "\n";
						dynamic_sidebar('third-subsidiary');
					echo '</div><!-- END #THIRD-SUBSIDIARY .SUBSIDIARY -->'. "\n";
				} ?>
		</div><!-- END .COLUMN .GRID-4 .OMEGA -->
	</div><!-- END .CONTAINER -->
</div><!-- END #SUBSIDIARY-WRAPPER -->

<?php } ?>