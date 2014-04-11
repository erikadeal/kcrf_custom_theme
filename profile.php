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
							<div class="userinfo threecol first clearfix">

								<?php global $userdata; get_currentuserinfo(); echo get_avatar($userdata->ID, 60); ?>

								<p>
									<?php if (current_user_can('manage_options')) { 
										echo '<a class="button" href="' . admin_url() . '">' . __('Admin') . '</a>'; } else { 
										echo '<a class="button" href="' . admin_url() . 'profile.php">' . __('Edit Profile') . '</a>'; } ?>
								</p>
								<p><a class="button" href="<?php echo admin_url();?>admin.php?page=wp-cal-add">Share an Event</a></p>
								<p><a class="button" href="<?php echo admin_url();?>post-new.php">Add a News Post</a></p>
								<p><a class="button" href="<?php echo wp_logout_url('index.php'); ?>">Log out</a></p>
							</div>
							<div class="profile ninecol last clearfix">
								<h3>My Profile</h3>
								<p><strong>Organization: </strong><?php echo $userdata->organization_name; ?></p>
								<p><strong>Date Founded: </strong><?php echo $userdata->date_founded; ?></p>
								<p><strong>Contact Person: </strong><?php echo $userdata->first_name; ?> <?php echo $userdata->last_name; ?></p>
								<p><strong>Email: </strong><?php echo $userdata->user_email; ?></p>
								<p><strong>Phone: </strong><?php echo $userdata->phone; ?></p>
								<p><strong>Address: </strong><?php echo $userdata->address_line_1; ?><br/><?php echo $userdata->address_line_2;?></p>
								<p><strong>Description: </strong><?php echo $userdata->user_description; ?></p>
								<p><strong>Services:</strong></p>
						        <p>
							        <?php 
							        	$array = $userdata->member_services;
							        	echo implode(', ', $array);
							        ?>
						        </p>
						        <p><strong>Additional Services:</strong></p>
						        <p><?php echo $userdata->additional_services; ?></p>
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
