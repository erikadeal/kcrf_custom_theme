				<div id="news_sidebar" class="sidebar fourcol last sidebar-box clearfix" role="complementary">

					<?php if ( is_active_sidebar( 'members_sidebar' ) ) : ?>

						<?php dynamic_sidebar( 'members_sidebar' ); ?>

					<?php else : ?>

						<?php // This content shows up if there are no widgets defined in the backend. ?>

						<div class="alert alert-help">
							<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>