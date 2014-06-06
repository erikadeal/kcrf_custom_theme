<?php
/*
Template Name: Member Directory
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">

						<!-- Show content of page -->

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
								//Get "Forum Member" users
								$args = array('role'=>'forum_member', 'fields'=>'all_with_meta');
							    $users = get_users($args);

							    //Function for sorting users by organization
							    function sort_members($a, $b){
								  return (strtolower($a->organization) < strtolower($b->organization)) ? -1 : 1;
								}

								//Sort users by organization
								usort($users, "sort_members");

							    //Display name and URL to profile page
							    foreach ($users as $user) {
							    	$url = get_author_posts_url( $user->ID, $user->user_nicename );
							        echo '<p><a href="' . $url . '">' . $user->organization . '</a></p>';
							    }
							?>

					<!-- Start participant loop -->

							<h3 class="sub-list">Participants</h3>

							<?php
							    $blogusers = get_users('role=forum_participant');
							    foreach ($blogusers as $user) { ?>

							    <div class="participant">

							    <?php 
							    	//Check if participant has entered organization name
							    	if ($user->organization ) {
							        	echo '<p class="participant-name">' . $user->organization . '</p>';
							        } 
							        //If not, display their name
							        else {
							        	echo '<p class="participant-name">' . $user->first_name . ' ' . $user->last_name . '</p>';
							        }

							        //Check for remaining contact fields and display if they are filled out

							        echo '<div class="contact-info">';

							        if ($user->organization ) {
							        	echo '<p><strong>Name: </strong>' . $user->first_name . ' ' . $user->last_name . '</p>';
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

				<!-- Retrieve members sidebar from sidebar-members.php -->
				
					<?php get_sidebar('members'); ?>
					
				</div>

			</div>

<?php get_footer(); ?>
