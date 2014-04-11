<?php
/*
Template Name: Member Directory
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>

								</header>

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section>

							</article>

							<?php endwhile; ?>

							<?php endif; ?>
							
					<!-- Start member directory loop -->
							<?php
							    $blogusers = get_users('role=forum_member');
							    foreach ($blogusers as $user) {
							        echo '<p><a href="' . home_url() . '/?author=' . $user->ID . '">' . $user->organization_name . '</a></p>';
							    }
							?>

							<h3>Other Participants</h3>

					<!-- Start participant loop -->
							<?php
							    $blogusers = get_users('role=forum_participant');
							    foreach ($blogusers as $user) {

							    	if ($user->organization_name ) {
							        	echo '<p>' . $user->organization_name . '</p>';
							        	echo '<p class="participant-details"><strong>Email: </strong>' . $user->user_email . '</p>';
							        	echo '<p class="participant-details"><strong>Phone: </strong>' . $user->phone. '</p>';
							        } 
							        else {
							        	echo '<p>' . $user->first_name . ' ' . $user->last_name . '</p>';
							        	echo '<p class="participant-details"><strong>Email: </strong>' . $user->user_email . '</p>';
							        	echo '<p  class="participant-details"><strong>Phone: </strong>' . $user->phone. '</p>';
							        }
							    }
							?>

						</div>

					<div class="fourcol last clearfix">
						<h4 class="widgettitle">Join the Forum</h4>
						<p>Information about dues and sign-up here</p>
					</div>
					
				</div>

			</div>

<?php get_footer(); ?>
