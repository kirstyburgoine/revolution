<?php function general_settings() { ?>

<table class="widefat">
	<thead>
		<tr>
			<th>
				<div class="alignleft main-title">Customization Settings</div>
				<div class="alignright"><input class="button heading-submit" name="save" type="submit" value="Update All Settings" /><input class="button heading-reset" name="reset" type="submit" value="Reset All Settings" onclick="return confirm('Click OK to reset. All settings will be reset to their default values and deleted from the database.');" /></div>
			</th>
		</tr>
	</thead><!-- </thead> -->

	<tbody>
		<tr>
			<td>
				<div class="option-content">
					<select id="color_schemes" name="color_schemes">
						<?php
							$colors = array("blue", "grey", "tan");
							foreach( $colors as $color ) {
								echo '<option value="' . $color . '"';
								echo ( get_setting('color_schemes') == $color ) ? ' selected="selected" >' : '>';
								echo $color . '</option>';
							}
						?>
					</select>
					<label for="color_schemes">Select an alternate color scheme from the list.</label>
				</div><!-- .option-content -->
			</td>
		</tr>

		<tr>
			<td>
				<div class="option-content">
					<label for="custom_css" class="sub-title">Custom CSS</label>
					<textarea id="custom_css" name="custom_css"><?php echo get_setting('custom_css');?></textarea>
					<div class="option-desc">For more advanced customization add some CSS into the textarea above.</div>
				</div><!-- .option-content -->
			</td>
		</tr>
	</tbody><!-- </tbody> -->
</table><!-- .widefat -->

<?php } ?>