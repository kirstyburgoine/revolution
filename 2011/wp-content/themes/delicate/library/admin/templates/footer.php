<?php function footer_settings() { ?>

<table class="widefat">
	<thead>
		<tr>
			<th>
				<div class="alignleft main-title">Footer Settings</div>
				<div class="alignright"><input class="button heading-submit" name="save" type="submit" value="Update All Settings" /><input class="button heading-reset" name="reset" type="submit" value="Reset All Settings" onclick="return confirm('Click OK to reset. All settings will be reset to their default values and deleted from the database.');" /></div>
			</th>
		</tr>
	</thead><!-- </thead> -->

	<tbody>
		<tr>
			<td>
				<div class="option-content">
					<label for="footer_content" class="sub-title">Footer Content</label>
					<textarea id="footer_content" name="footer_content"><?php echo get_setting('footer_content');?></textarea>
					<div class="option-desc">Enter the content that you would like to appear in the footer. You can place <acronym title="Extensible Hypertext Markup Language">XHTML</acronym> and JavaScript here to have it inserted automatically into your theme. <br /><code>[blog-title]</code> <code>[copyright]</code> <code>[login-logout]</code> <code>[scroll-to-top]</code> <code>[the-year]</code> <code>[wp-link]</code></div>
				</div><!-- .option-content -->
			</td>
		</tr>

		<tr>
			<td>
				<div class="option-content">
					<label for="tracking_code" class="sub-title">Tracking Code</label>
					<textarea id="tracking_code" name="tracking_code"><?php echo get_setting('tracking_code');?></textarea>
					<div class="option-desc">Paste your <a href="http://www.google.com/analytics">Google Analytics</a> (or other) tracking code here.</div>
				</div><!-- .option-content -->
			</td>
		</tr>
	</tbody><!-- </tbody> -->
</table><!-- .widefat -->

<?php } ?>