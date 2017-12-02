<?php

/*
 *
 * Template Name: Contact
 * THIS TEMPLATE CONTAINS A CONTACT FORM, SETTINGS ARE CONTROLLED IN THE THEMES OPTIONS
 *
 */

get_header(); ?>

<?php

// IF THE FORM IS SUBMITTED
if(isset($_POST['submitted'])) {

// CHECK TO SEE IF THE HONEYPOST CAPTCHA FIELD WAS COMPLETED
if (trim($_POST['checking']) !== '') {
	$captchaError = true;
} else {

// CHECK TO MAKE SURE THAT THE NAME FIELD WAS COMPLETED
if (trim($_POST['username']) === '') {
	$nameError = 'You forgot to enter your name.';
	$hasError = true;
} else {
	$name = trim($_POST['username']);
}

// CHECK TO MAKE SURE THAT A VALID EMAIL ADDRESS WAS ENTERED
if (trim($_POST['useremail']) === '') {
	$emailError = 'You forgot to enter your email address.';
	$hasError = true;
} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['useremail']))) {
	$emailError = 'You entered an invalid email address.';
	$hasError = true;
} else {
	$email = trim($_POST['useremail']);
}

// CHECK TO MAKE SURE THAT THE COMMENT FIELD WAS COMPLETED
if (trim($_POST['message']) === '') {
	$messageError = 'You forgot to enter a message.';
	$hasError = true;
} else {
	if (function_exists('stripslashes')) {
		$message = stripslashes(trim($_POST['message']));
} else {
	$message = trim($_POST['message']);
	}
}

// IF THERE IS NO ERROR, SEND THE EMAIL
if (!isset($hasError)) {
	$emailTo = get_setting("contact_email_address");
	$subject = 'Contact Form Submission from '.$name;
	$body = "\nName: $name \n\nEmail: $email \n\nMessage: $message";
	$headers = 'From: Shropgeek Revolution <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
	mail($emailTo, $subject, $body, $headers);
	$emailSent = true;
		}
	}
} ?>

<div id="content" class="column grid-1 alpha">

<?php get_sidebar('page-top'); ?>

<div id="contact">

<?php delicate_entry_title(); ?>

<?php if(isset($emailSent) && $emailSent == true) { ?>

	<div class="thanks">
		<h3>Thanks, <?=$name; ?></h3>
		<p>Your email was successfully sent. Kirsty Burgoine from Shropgeek will be in touch soon.</p>
	</div><!-- END .THANKS -->

<?php } else { ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" class="<?php delicate_entry_class(); ?>">

	<div class="entry-content">
		<?php the_content(''); ?>
		<?php wp_link_pages('before=<div class="page-link">' .__('<span class="page-link-title">Pages:</span>') . '&after=</div>') ?>
	</div><!-- END .ENTRY-CONTENT -->

	<?php if (isset($hasError) || isset($captchaError)) { ?>
		<div class="error">
			There was an error submitting the form.
		</div><!-- END .ERROR -->
	<?php } ?>
	
<form action="<?php the_permalink(); ?>" id="contact-form" method="post">
	<div class="name-label">
		<label for="username">
			<?php _e('Name') ?>
		</label><!-- END USERNAME LABEL -->
		<?php _e('<span class="required">*</span>') ?>
	</div><!-- END .NAME-LABEL -->

	<div class="form-input">
		<?php if($nameError != '') { ?>
			<span class="name-error">
				<?=$nameError; ?>
			</span><!-- END .NAME-ERROR -->
		<?php } ?>
		<input id="username" class="requiredField" name="username" type="text" size="30" maxlength="50" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>" />
	</div><!-- END .FORM-INPUT -->

	<div class="email-label">
		<label for="useremail">
			<?php _e('Email') ?>
		</label><!-- END USEREMAIL LABEL -->
		<?php _e('<span class="required">*</span>') ?>
	</div><!-- END .EMAIL-LABEL -->

	<div class="form-input">
		<?php if($emailError != '') { ?>
			<span class="email-error">
				<?=$emailError; ?>
			</span><!-- END .EMAIL-ERROR -->
		<?php } ?>
		<input id="useremail" class="requiredField" name="useremail" type="text" size="30" maxlength="50" value="<?php if(isset($_POST['useremail'])) echo $_POST['useremail'];?>" />
	</div><!-- END .FORM-INPUT -->

	<div class="message-label">
		<label for="message">
			<?php _e('Message') ?>
		</label><!-- END MESSAGE LABEL -->
	</div><!-- END .MESSAGE-LABEL -->

	<div class="form-textarea">
		<?php if($messageError != '') { ?>
			<span class="message-error">
				<?=$messageError; ?>
			</span><!-- END .MESSAGE-ERROR -->
		<?php } ?>
		<textarea id="message" class="requiredField" name="message" cols="45" rows="8"><?php if(isset($_POST['message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['message']); } else { echo $_POST['message']; } } ?></textarea>
	</div><!-- END .FORM-TEXTAREA -->

	<div class="form-honeypot">
		<label for="honeypot">
			Honeypot:
		</label><!-- END HONEYPOT LABEL -->

		<div class="form-input">
			<input id="honeypot" name="honeypot" type="text" value="<?php if(isset($_POST['honeypot'])) echo $_POST['honeypot'];?>" />
		</div><!-- END .FORM-INPUT -->
	</div><!-- END .FORM-HONEYPOT -->

	<div class="form-submit">
		<input type="hidden" name="submit" value="1" />
		<input class="submit-comment button" name="submitted" type="submit" id="submit" value="<?php _e(''); ?>" />
		<input class="reset-comment button" name="reset" type="reset" id="reset" value="<?php _e(''); ?>" />
	</div><!-- END .FORM-SUBMIT -->
</form>

</div><!-- END #POST -->

<?php endwhile; endif; } ?>

<?php get_sidebar('page-bottom'); ?>

</div><!-- END #CONTACT -->

</div><!-- END #CONTENT -->

<?php get_sidebar(); get_footer(); ?>