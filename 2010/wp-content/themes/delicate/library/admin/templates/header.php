<?php function header_settings() { ?>

<table class="widefat">
	<thead>
		<tr>
			<th>
				<div class="alignleft main-title">RSS Feed Settings</div>
				<div class="alignright"><input class="button heading-submit" name="save" type="submit" value="Update All Settings" /><input class="button heading-reset" name="reset" type="submit" value="Reset All Settings" onclick="return confirm('Click OK to reset. All settings will be reset to their default values and deleted from the database.');" /></div>
			</th>
		</tr>
	</thead><!-- </thead> -->

	<tbody>
		<tr>
			<td>
				<div class="option-content">
					<label for="post_feed" class="sub-title">Post RSS Feed</label>
					<input type="text" id="post_feed" name="post_feed" value="<?php echo get_setting('post_feed');?>" />
					<div class="option-desc">Replace the default post <acronym title="Really Simple Syndication">RSS</acronym> feed. Useful if you have decided to use third-party services like <a href="http://feedburner.google.com">Feedburner</a>.</div>
				</div><!-- .option-content -->
			</td>
		</tr>

		<tr>
			<td>
				<div class="option-content">
					<label for="email_feed" class="sub-title">Email RSS Feed</label>
					<input type="text" id="email_feed" name="email_feed" value="<?php echo get_setting('email_feed');?>" />
					<div class="option-desc">Enter your <a href="http://feedburner.google.com">Feedburner</a> username to allow readers to subscribe to your <acronym title="Really Simple Syndication">RSS</acronym> feed by e-mail.</div>
				</div><!-- .option-content -->
			</td>
		</tr>
	</tbody><!-- </tbody> -->
</table><!-- .widefat -->

<?php } ?>