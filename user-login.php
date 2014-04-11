<?php
/*
Template Name: Login Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="twelvecol clearfix" role="main">

					<?php global $user_ID, $user_identity; get_currentuserinfo(); if (!$user_ID) { //check to see if user is logged in ?>

						<div id="authentication">

							<h1>Log in</h1>
							
							<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form">
								<div class="username">
									<label for="user_login"><?php _e('Username'); ?>: </label>
									<input type="text" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="11" />
								</div>
								<div class="password">
									<label for="user_pass"><?php _e('Password'); ?>: </label>
									<input type="password" name="pwd" value="" size="20" id="user_pass" tabindex="12" />
								</div>
								<div class="login_fields">
									<div class="rememberme">
										<label for="rememberme">
											<input type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" tabindex="13" /> Remember me
										</label>
									</div>
									<?php do_action('login_form'); ?>
									<input type="submit" name="user-submit" value="<?php _e('Login'); ?>" tabindex="14" class="user-submit" />
									<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
									<input type="hidden" name="user-cookie" value="1" />
								</div>
							</form>

							<p><a href="<?php echo home_url();?>/register">Don't have an account yet?</a>  |  <a href="<?php echo home_url();?>/password">Forgot your password or username?</a>
						</div>


						<?php } else { // if user is logged in ?>

						<h3>Welcome, <?php echo $user_identity; ?></h3>

						<p>Please visit your <a href="<?php echo home_url()?>/profile">profile page</a> to manage your account.</p>

						<?php } ?>
					</div>
					
				</div>

			</div>

<?php get_footer(); ?>
