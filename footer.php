			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="clearfix">

					<div id="footer-widgets" class="wrap clearfix">

				<!-- Left footer area -->
						<div class="fourcol first clearfix">
							<?php if ( is_active_sidebar( 'footer_1' ) ) : ?>

								<?php dynamic_sidebar( 'footer_1' ); ?>

							<?php else : ?>

								<?php // This content shows up if there are no widgets defined in the backend. ?>

								<div class="alert alert-help">
									<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
								</div>

							<?php endif; ?>
						</div>

				<!-- Center footer area -->
						<div class="fourcol clearfix">
							<?php if ( is_active_sidebar( 'footer_2' ) ) : ?>

								<?php dynamic_sidebar( 'footer_2' ); ?>

							<?php else : ?>

								<?php // This content shows up if there are no widgets defined in the backend. ?>

								<div class="alert alert-help">
									<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
								</div>

							<?php endif; ?>
						</div>

				<!-- Right footer area -->
						<div class="fourcol last clearfix">
							<?php if ( is_active_sidebar( 'footer_3' ) ) : ?>

								<?php dynamic_sidebar( 'footer_3' ); ?>

							<?php else : ?>

								<?php // This content shows up if there are no widgets defined in the backend. ?>

								<div class="alert alert-help">
									<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
								</div>

							<?php endif; ?>
						</div>
					</div>

					<nav role="navigation">
							<?php bones_footer_links(); ?>
					</nav>


				</div>

				<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html>
