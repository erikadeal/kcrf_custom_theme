				<div id="meetings_sidebar" class="sidebar fourcol last clearfix" role="complementary">

					<?php if ( is_active_sidebar( 'meetings_sidebar' ) ) : ?>

						<?php dynamic_sidebar( 'meetings_sidebar' ); ?>

					<?php else : ?>

						<?php // This content shows up if there are no widgets defined in the backend. ?>

						<div class="alert alert-help">
							<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>