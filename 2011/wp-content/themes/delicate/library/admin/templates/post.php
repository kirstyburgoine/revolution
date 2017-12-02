<?php function post_settings() { ?>

<table class="widefat">
	<thead>
		<tr>
			<th>
				<div class="alignleft main-title">Category Settings</div>
				<div class="alignright"><input class="button heading-submit" name="save" type="submit" value="Update All Settings" /><input class="button heading-reset" name="reset" type="submit" value="Reset All Settings" onclick="return confirm('Click OK to reset. All settings will be reset to their default values and deleted from the database.');" /></div>
			</th>
		</tr>
	</thead><!-- </thead> -->

	<tbody>
		<tr>
			<td>
				<div class="option-content">
					<label for="blog_page_title" class="sub-title">Blog Page Title</label>
					<input type="text" id="blog_page_title" name="blog_page_title" value="<?php echo get_setting('blog_page_title');?>" />
					<div class="option-desc">Enter the title you wish to display on the blog page.</div>
				</div><!-- .option-content -->
			</td>
		</tr>

		<tr>
			<td>
				<div class="option-content">
					<?php wp_dropdown_categories( 'show_option_none=Blog Category:&name=blog_category&selected='.get_setting('blog_category') ); ?>
					<label for="blog_category">Select the category to serve as blog posts.</label>
				</div><!-- .option-content -->
			</td>
		</tr>

		<tr>
			<td>
				<div class="option-content">
					<select id="post_count" name="post_count">
						<?php
							$numbers = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10");
							foreach( $numbers as $numeral ) {
								echo '<option value="' . $numeral . '"';
								echo ( get_setting('post_count') == $numeral ) ? ' selected="selected" >' : '>';
								echo $numeral . '</option>';
							}
						?>
					</select>
					<label for="post_count">Select the amount of posts to display in the blog category.</label>
				</div><!-- .option-content -->
			</td>
		</tr>

		<tr>
			<td>
				<div class="option-content">
					<label for="portfolio_page_title" class="sub-title">Portfolio Page Title</label>
					<input type="text" id="portfolio_page_title" name="portfolio_page_title" value="<?php echo get_setting('portfolio_page_title');?>" />
					<div class="option-desc">Enter the title you wish to display on the portfolio page.</div>
				</div><!-- .option-content -->
			</td>
		</tr>

		<tr>
			<td>
				<div class="option-content">
					<?php wp_dropdown_categories( 'show_option_none=Portfolio Category:&name=portfolio_category&selected='.get_setting('portfolio_category') ); ?>
					<label for="portfolio_category">Select the category to serve as portfolio posts.</label>
				</div><!-- .option-content -->
			</td>
		</tr>

		<tr>
			<td>
				<div class="option-content">
					<select id="slider_count" name="slider_count">
						<?php
							$numbers = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10");
							foreach( $numbers as $numeral ) {
								echo '<option value="' . $numeral . '"';
								echo ( get_setting('slider_count') == $numeral ) ? ' selected="selected" >' : '>';
								echo $numeral . '</option>';
							}
						?>
					</select>
					<label for="slider_count">Select the amount of posts to display in the content slider.</label>
				</div><!-- .option-content -->
			</td>
		</tr>
	</tbody><!-- </tbody> -->
</table><!-- .widefat -->

<?php } ?>