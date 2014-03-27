<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">

						    <?php
						    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
						    ?>

						    <h2><?php echo $curauth->organization_name; ?></h2>
						    <div class="org-info">
						        <p><strong>Website:</strong> <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p>
						        <p><strong>Contact:</strong> <a href="<?php echo $curauth->user_email; ?>"><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></a></p>
						        <p><strong>About:</strong></p>
						        <p><?php echo $curauth->user_description; ?></p>
						    </div>

						    <h3>Recent News &amp; Events:</h3>

						    <ul>
						<!-- The Loop -->

						    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						        <li>
						            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
						            <?php the_title(); ?></a>,
						            <?php the_time('d M Y'); ?> in <?php the_category('&');?>
						        </li>

						    <?php endwhile; else: ?>
						        <p><?php _e('This member has not posted any events or news items.'); ?></p>

						    <?php endif; ?>

						<!-- End Loop -->

						    </ul>
						</div>

					<div class="sidebar fourcol last clearfix" role="complimentary">

						<h4>All Members</h4>

							<?php
							    $blogusers = get_users('role=forum_member');
							    foreach ($blogusers as $user) {
							        echo '<p><a href="' . home_url() . '/?author=' . $user->ID . '">' . $user->organization_name . '</a></p>';
							    }
							?>

						</div>
					</div>

				</div>

<?php get_footer(); ?>
