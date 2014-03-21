<?php
/*
Template Name: Static Front Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

				<!-- Banner image -->

					<div id="banner">
						<img src="<?php echo home_url(); ?>/wp-content/themes/kcrf_custom_theme/library/images/example_photo.jpg">
						<p id="banner-message">Supporting service providers and refugees in King County and Puget Sound</p>
					</div>

						<div id="main" role="main">

				<!-- Start front page widgets -->

							<div class="widgets-row">

								<div class="fourcol first clearfix">
									<h2 class="widget-header">Upcoming Events</h2>

										<?php if ( is_active_sidebar( 'home_1' ) ) : ?>

											<?php dynamic_sidebar( 'home_1' ); ?>

										<?php else : ?>

											<?php // This content shows up if there are no widgets defined in the backend. ?>

											<div class="alert alert-help">
												<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
											</div>

										<?php endif; ?>
								</div>

								<div class="fourcol clearfix">
									<h2 class="widget-header">Find a provider</h2>

										<?php if ( is_active_sidebar( 'home_2' ) ) : ?>

											<?php dynamic_sidebar( 'home_2' ); ?>

										<?php else : ?>

											<?php // This content shows up if there are no widgets defined in the backend. ?>

											<div class="alert alert-help">
												<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
											</div>

										<?php endif; ?>
								</div>

								<div class="fourcol last clearfix">
									<h2 class="widget-header">Become a member</h2>

										<?php if ( is_active_sidebar( 'home_3' ) ) : ?>

											<?php dynamic_sidebar( 'home_3' ); ?>

										<?php else : ?>

											<?php // This content shows up if there are no widgets defined in the backend. ?>

											<div class="alert alert-help">
												<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
											</div>

										<?php endif; ?>
								</div>

							</div>

						</div>

				</div>

			</div>

<?php get_footer(); ?>
