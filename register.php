<?php
/*
Template Name: Registration Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="twelvecol clearfix" role="main">

					<?php global $user_ID, $user_identity; get_currentuserinfo(); if (!$user_ID) { //check to see if user is logged in ?>

						<div id="authentication">

							<h1>Register</h1>

							<p>If you come to meetings and want to share your contact and service information with other members,
							feel free to register for an account on the website. If you are not sure about your membership status
							or want to learn more about becoming a member, please visit our <a href="<?php echo home_url();?>/members">Members page</a>.</p>

							<p>You will receive an email with your login information once an administrator has approved your request.</p>
							
							<form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="wp-user-form">
								<div class="username">
									<label for="user_login"><?php _e('Username'); ?>: </label>
									<input type="text" name="user_login" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" />
								</div>
								<div class="password">
									<label for="user_email"><?php _e('Your Email'); ?>: </label>
									<input type="text" name="user_email" value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="25" id="user_email" />
								</div>
								<div class="login_fields">
									<?php do_action('register_form'); ?>
									<input type="submit" name="user-submit" value="<?php _e('Register'); ?>" class="user-submit" />
									<?php $register = $_GET['register']; if($register == true) { echo '<p>You will receive approval from an administrator soon.</p>'; } ?>
									<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?register=true" />
									<input type="hidden" name="user-cookie" value="1" />
								</div>
							</form>

							<p><a href="<?php echo home_url();?>/login">Already have an account?</a>  |  <a href="<?php echo home_url();?>/password">Forgot your password or username?</a>
						</div>


						<?php } else { // if user is logged in ?>

						<div class="logged_in">
							<h3>Welcome, <?php echo $user_identity; ?></h3>
							<div class="usericon">
								<?php global $userdata; get_currentuserinfo(); echo get_avatar($userdata->ID, 60); ?>

							</div>
							<div class="userinfo">
								<p>You&rsquo;re logged in as <strong><?php echo $user_identity; ?></strong></p>
								<p>
									<a class="button" href="<?php echo wp_logout_url('index.php'); ?>">Log out</a>  
									<?php if (current_user_can('manage_options')) { 
										echo '<a class="button" href="' . admin_url() . '">' . __('Admin') . '</a>'; } else { 
										echo '<a class="button" href="' . admin_url() . 'profile.php">' . __('Edit Profile') . '</a>'; } ?>
								</p>
							</div>
						</div>

						<?php } ?>
					</div>
					
				</div>

			</div>

<?php get_footer(); ?>
