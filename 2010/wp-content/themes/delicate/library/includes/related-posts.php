	<div id="related-wrapper">
		<div class="related-title">
			<h3>Related Posts</h3>
		</div><!-- END .RELATED-TITLE -->

		<?php $this_post = $post; $category = get_the_category(); $category = $category[0]; $category = $category->cat_ID; $posts = get_posts('numberposts=5&offset=0&orderby=post_date&order=DESC&category='.$category); $count = 0; foreach ( $posts as $post ) { if ( $post->ID == $this_post->ID || $count == 5) { unset($posts[$count]); } else { $count ++; } } ?>
		 
		<?php if ( $posts ) : ?>
		<div class="related-posts">
			<ul>
				<?php foreach ( $posts as $post ) : ?>
				<li>
					<a href="<?php the_permalink() ?>" title="<?php if ( get_the_title() ){ the_title(); } else { echo "Untitled"; } ?>"><?php if ( get_the_title() ){ the_title(); } else { echo "Untitled"; } ?></a>
					<!--(<abbr class="published-time" title="<?php the_time( get_option('date_format') .' &#64; '. get_option('time_format') ); ?>"><?php the_time('m/d/Y'); ?></abbr>)-->
				</li>
				<?php endforeach // $POSTS AS $POST ?>
			</ul>
		</div><!-- END .RELATED-POSTS -->
		<?php else: ?>
		<ul>
			<li><?php _e('No Related Posts.'); ?></li>
		</ul>
		<?php endif // $POSTS ?>
		<?php $post = $this_post; unset($this_post); ?>
	</div><!-- END #RELATED-WRAPPER -->