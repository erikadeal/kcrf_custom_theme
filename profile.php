<?php
/*
Template Name: Profile
*/
acf_form_head();
wp_deregister_style('wp-admin-css');
get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" role="main" class="clearfix">
	
					<?php if ( is_user_logged_in() ) { ?>

						<div class="logged_in">
							<h3>Welcome, <?php echo $user_identity; ?></h3>
							<a href="<?php echo wp_logout_url('index.php'); ?>">Log out</a>
						</div>

						<div id="profile-sections" class="clearfix">
							<nav role="navigation">
								<ul class="tabs">
									<li><a href="#profile">My Profile</a></li>
									<li><a href="#news">Add News Post</a></li>
									<li><a href="#events">Add an Event</a></li>
								</ul>
							</nav>

							<div id="profile" class="tab">
								<?php
								global $current_user;
								$options = array(
									'post_id'  => 'user_' .$current_user->ID, // post id to get field groups from and save data to
								);

								acf_form( $options ); ?>
							</div>

							<div id="news" class="tab">

							<p>This tab will contain a form for creating a news post.</p>
 
							</div>

							<div id="events" class="tab">
								<p>This is the third tab</p>
							</div>
					</div>

					

					<?php } else { // if user is not logged in ?>

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

							<p><a href="<?php echo home_url();?>/register">Don't have an account yet?</a>  |  <a href="<?php echo home_url();?>/password">Forgot your password or username?</a></p>
						</div>

						<?php } ?>
					</div>
					
				</div>

			</div>

<?php get_footer(); ?>
