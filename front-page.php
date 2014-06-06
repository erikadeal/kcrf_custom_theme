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

				//Get banner image
				$image = get_field('banner_image');

				//If uploaded, display
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

					<!-- First column -->

						<div id="home1" class="home-widget fourcol first clearfix">

						<!-- Check whether wigdets are defined in the backend-->

							<?php if ( is_active_sidebar( 'home_1' ) ) : ?>

								<?php dynamic_sidebar( 'home_1' ); ?>

							<?php else : ?>

								<?php // This shows up if there are no widgets defined in the backend. ?>

								<div class="alert alert-help">
									<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
								</div>

							<?php endif; ?>
						</div>

					<!-- Second column -->

						<div id="home2" class="home-widget fourcol clearfix">

								<?php if ( is_active_sidebar( 'home_2' ) ) : ?>

									<?php dynamic_sidebar( 'home_2' ); ?>

								<?php else : ?>

									<?php // This content shows up if there are no widgets defined in the backend. ?>

									<div class="alert alert-help">
										<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
									</div>

								<?php endif; ?>
						</div>

					<!-- Third column -->

						<div id="home3" class="home-widget fourcol last clearfix">

							<?php if ( is_active_sidebar( 'home_3' ) ) : ?>

								<?php dynamic_sidebar( 'home_3' ); ?>

							<?php else : ?>

								<?php // This content shows up if there are no widgets defined in the backend. ?>

								<div class="alert alert-help">
									<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
								</div>

							<?php endif; ?>
						</div>

					</div> <!-- End row of widgets -->

				</div> <!-- End main content -->

		</div> <!-- End #inner-content -->

	</div> <!-- End #home-content -->

<?php get_footer(); ?>
