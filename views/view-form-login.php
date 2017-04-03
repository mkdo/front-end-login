<?php
/**
 * Form Login
 *
 * If you wish to override this file, you can do so by creating a version in your
 * theme, and using the `MKDO_FRONT_END_LOGIN_PREFIX . '_view_template_folder` hook
 * to set the right location.
 *
 * @package mkdo\front_end_login
 */

/**
 * Variables
 *
 * The following variables can be used in this view.
 * $username          = '';
 * $password          = '';
 * $username_is_email = true;
 *
 * If we need to define others we can do it here too.
 */

$username_label = '';
if ( $username_is_email ) {
	$username_label = esc_html__( 'Email Address:', 'front-end-login' );
} else {
	$username_label = esc_html__( 'Username:', 'front-end-login' );
}

/**
 * Output
 *
 * Here is the HTML output, this can be styled however.
 * Do not alter this file, instead duplicate it into your theme.
 */
?>

<form id="form_login" method="post" autocomplete="off">

	<?php
	// Add a filter to add controls before the username.
	do_action( MKDO_FRONT_END_LOGIN_PREFIX . '_form_login_before_username' );
	?>

	<div class="form_login__input form_login__input--username">
		<label for="username">
			<?php echo esc_html( $username_label );?>
		</label>
		<input
			type="<?php echo $username_is_email ? 'email' : 'text';?>"
			id="username"
			name="username"
			placeholder="<?php echo esc_html( $username_label );?>"
			value="<?php echo esc_attr( $username );?>"
		å/>
	</div>

	<?php
	// Add a filter to add controls before the password.
	do_action( MKDO_FRONT_END_LOGIN_PREFIX . '_form_login_before_password' );
	?>

	<div class="form_login__input form_login__input--password">
		<label for="username">
			<?php esc_html_e( 'Password:', 'front-end-login' );?>
		</label>
		<input
			type="password"
			id="password"
			name="password"
			placeholder="<?php esc_html_e( 'Password', 'front-end-login' );?>"
			value="<?php echo $password;?>"
		/>
	</div>

	<?php
	// Add a filter to add controls before the submit button.
	do_action( MKDO_FRONT_END_LOGIN_PREFIX . '_form_login_before_submit' );
	?>

	<div class="form_login__input form_login__input--submit">
		<input class="btn button form_login__button" type="submit" value="<?php esc_html_e( 'Login', 'front-end-login' );?>"/>
	</div>

	<?php
	// Add a filter to add controls before the navigation.
	do_action( MKDO_FRONT_END_LOGIN_PREFIX . '_form_login_before_navigation' );
	?>

	<nav class="form_login__navigation form_navigation" role="navigation">
		<ul>
			<li class="form_navigation__item">
				<a href="<?php echo wp_lostpassword_url(); ?>" title="<?php esc_html_e( 'Forgot Password?', 'front-end-login' );?>"><?php esc_html_e( 'Forgot Password?', 'front-end-login' );?></a>
			</li>
			<?php
			if ( get_option( 'users_can_register' ) ) {
				?>
				<li class="form_navigation__item">
					<a href="<?php echo wp_registration_url(); ?>" title="<?php esc_html_e( 'Register', 'front-end-login' );?>"><?php esc_html_e( 'Register', 'front-end-login' );?></a>
				</li>
				<?php
			}
			?>
		</ul>
	</nav>

	<?php
	// Add a filter to add controls after the form.
	do_action( MKDO_FRONT_END_LOGIN_PREFIX . '_form_login_after_form' );
	?>

	<?php
	// Render the NOnce for security.
	wp_nonce_field( 'form_login', 'form_login_nonce' );
	?>
</form>
