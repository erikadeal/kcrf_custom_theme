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
							    	$url = get_author_posts_url( $user->ID, $user->user_nicename );
							        echo '<p><a href="' . $url . '">' . $user->organization_name . '</a></p>';
							    }
							?>

							<h3 class="sub-list">Participants</h3>

					<!-- Start participant loop -->
							<?php
							    $blogusers = get_users('role=forum_participant');
							    foreach ($blogusers as $user) { ?>

							    <div class="participant">

							    <?php 
							    	if ($user->organization_name ) {
							        	echo '<p class="participant-name">' . $user->organization_name . '</p>';
							        } 
							        else {
							        	echo '<p class="participant-name">' . $user->first_name . ' ' . $user->last_name . '</p>';
							        }

							        echo '<div class="contact-info">';
							        if($user->organization){
							        	echo '<p><strong>Organization: </strong>' . $user->organization. '</p>';
							    	}

							        echo '<p><strong>Email: </strong>' . $user->user_email . '</p>';

							        if($user->phone){
							        	echo '<p><strong>Phone: </strong>' . $user->phone. '</p>';
							    	}

							    	if($user->user_url){
							        	echo '<p><strong>Website: </strong>' . $user->user_url. '</p>';
							    	}
							    	
							        echo '</div>';

							        ?>

							        </div>
							    <?php } ?>

						</div>

					<?php get_sidebar('members'); ?>
					
				</div>

			</div>

<?php get_footer(); ?>
