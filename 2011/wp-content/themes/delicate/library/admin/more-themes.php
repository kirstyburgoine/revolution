<style type="text/css">
#portfolio { width: 800px; }
#portfolio a:link, #portfolio a:active, #portfolio a:visited, #portfolio a:hover { text-decoration: none; }
#portfolio #admin-title h2 { font: 400 italic 35px/1.5 Georgia, "Times New Roman", Times, serif; margin: 5px 0 0; text-align: center; }
#portfolio .info { text-align: center; width: 785px; }
#portfolio .theme-title a { background: #EEE; border: 1px solid #DDD; display: block; font: 24px Georgia, "Times New Roman", Times, serif; margin: 0 6px 0; padding: 14px 14px 16px; text-decoration: none; text-shadow: 0 0 0 rgba(0,0,0,0); width: 750px; }
#portfolio .themeforest-button { display: none; margin: 12px 0 25px; text-align: right; }
#portfolio .themeforest-button a { font: 20px/1.5 Georgia, "Times New Roman", Times, serif; font-style: italic; font-weight: 400; text-decoration: none; }
#portfolio .themeforest-button a { background: #2DAEBF; border: 0; border-radius: 0; color: #FFF; cursor: pointer; -khtml-border-radius: 0; -moz-border-radius: 0; padding: 12px 18px 14px; text-shadow: 0 -1px 1px rgba(0,0,0,0.25); -webkit-border-radius: 0; }
</style>

<div class="wrap" id="portfolio">

	<link rel="shortcut icon" href="<?php echo get_bloginfo('template_url') . '/library/media/images/favicon.ico' ?>" />

	<?php include_once ( ABSPATH . WPINC . '/rss.php' );
		$rss = fetch_rss('http://themeforest.net/feeds/users/itsmattadams.atom');
		$maxitems = 5000; $items = array_slice($rss->items, 0, $maxitems);
	?>

		<div id="admin-title">
			<h2>My ThemeForest Portfolio</h2>
		</div><!-- #admin-title -->

		<div class="info">
			<a href="http://themeforest.net/user/itsmattadams/portfolio?ref=itsmattadams">My ThemeForest Portfolio</a>
		</div><!-- .info -->

		<?php if ( empty($items) )
			echo '<h2 class="theme-title">No themes could be found.</h2>';
		else foreach ( $items as $item ) : ?>

		<h2 class="theme-title">
			<a href="<?php echo $item['link']; ?>?ref=itsmattadams"><?php echo $item['title']; ?></a>
		</h2><!-- .theme-title -->

	<?php endforeach; ?>

	<h2 class="themeforest-button">
		<a href="http://themeforest.net/user/itsmattadams/portfolio?ref=itsmattadams">My ThemeForest Portfolio</a>
	</h2><!-- .themeforest-button -->

</div><!-- .wrap #portfolio -->