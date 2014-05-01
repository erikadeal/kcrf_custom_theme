<?php
/*
Template Name: Static Front Page
*/
?>

<?php get_header(); ?>

			<div id="home-content">

			<!-- Banner image -->

			<div id="banner">

				<?php 
					$image = get_field('banner_image');
					if( !empty($image) ): ?>

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

				<?php endif; ?>

			<!-- Image caption -->
				<?php
					$caption = get_field('image_caption');
					if( !empty($caption) ): ?>

					<p id="banner-message"><?php echo $caption; ?></p>
				<?php endif; ?>

			<!-- Image credit -->
				<?php
					$credit = get_field('image_credit');
					if( !empty($credit) ): ?>

					<p id="image-credit">Image credit: <?php echo $credit; ?></p>
				<?php endif; ?>

			</div>

				<div id="inner-content" class="wrap clearfix">

						<div id="main" role="main">

				<!-- Start front page widgets -->

							<div class="widgets-row">

								<div id="home1" class="home-widget fourcol first clearfix">
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

								<div id="home2" class="home-widget fourcol clearfix">
									<h2 class="widget-header">Meetings</h2>

										<?php if ( is_active_sidebar( 'home_2' ) ) : ?>

											<?php dynamic_sidebar( 'home_2' ); ?>

										<?php else : ?>

											<?php // This content shows up if there are no widgets defined in the backend. ?>

											<div class="alert alert-help">
												<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
											</div>

										<?php endif; ?>
								</div>

								<div id="home3" class="home-widget fourcol last clearfix">
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
