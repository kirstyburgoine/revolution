<?php function page_settings() { ?>

<table class="widefat">
	<thead>
		<tr>
			<th>
				<div class="alignleft main-title">Contact Page Settings</div>
				<div class="alignright"><input class="button heading-submit" name="save" type="submit" value="Update All Settings" /><input class="button heading-reset" name="reset" type="submit" value="Reset All Settings" onclick="return confirm('Click OK to reset. All settings will be reset to their default values and deleted from the database.');" /></div>
			</th>
		</tr>
	</thead><!-- </thead> -->

	<tbody>
		<tr>
			<td>
				<div class="option-content">
					<label for="contact_email_address" class="sub-title">Email Address</label>
					<input type="text" id="contact_email_address" name="contact_email_address" value="<?php echo get_setting('contact_email_address');?>" />
					<div class="option-desc">Enter the email address for the contact form page template.</div>
				</div><!-- .option-content -->
			</td>
		</tr>
	</tbody><!-- </tbody> -->
</table><!-- .widefat -->

<table class="widefat">
	<thead>
		<tr>
			<th>
				<div class="alignleft main-title">Author Page Settings</div>
				<div class="alignright"><input class="button heading-submit" name="save" type="submit" value="Update All Settings" /><input class="button heading-reset" name="reset" type="submit" value="Reset All Settings" onclick="return confirm('Click OK to reset. All settings will be reset to their default values and deleted from the database.');" /></div>
			</th>
		</tr>
	</thead><!-- </thead> -->

	<tbody>
		<tr>
			<td>
				<div class="option-content">
					<input type="checkbox" class="checkbox" id="author_hcard" name="author_hcard" value="1" <?php if ( get_setting('author_hcard') ) echo ' checked="checked"'; ?> />
					<label for="author_hcard">Display a <a href="http://microformats.org/wiki/hcard">vCard</a> with the author's avatar, and bio on the author page.</label>
				</div><!-- .option-content -->
			</td>
		</tr>
	</tbody><!-- </tbody> -->
</table><!-- .widefat -->

<?php } ?>