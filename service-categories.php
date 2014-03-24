<?php
/*
Template Name: Services Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="twelvecol clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>

								</header>

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
									</article>

							<?php endif; ?>

					<!-- Start grid of categories -->

							<div class="categories-grid">

								<?php
									$field_key = "field_53025fd551115";
									$field = get_field_object($field_key);

									if( $field )
									{
									   foreach( $field['choices'] as $k => $v )
									        {
									        	echo '<div class="fourcol clearfix">';
									            echo '<h2 class="cat-title">' . $v . '</h2>';

									            $args = array(
														'role' => 'forum_member',
														'meta_query' => array(
															array(
																'key' => 'member_services',
																'value' =>  $v, //Remember the double quotes!
																'compare' => 'LIKE')
															)
														);

													$user_query = new WP_User_Query( $args );
													// User Loop

													foreach ( $user_query->results as $user ) 
														{
														echo '<div class="member-excerpt"><p><a href="' . home_url() . '/?author=' . $user->ID . '">' . $user->organization_name . '</a></p>';

														//if ($user->user_url){
														//	echo '<p>Website: <a href="' . $user->user_url . '">' . $user->user_url . '</a></p>';
														//}

														//echo '<p>Contact: <a href="mailto:' . $user->user_email . '">' . $user->first_name . '&nbsp;' . $user->last_name . '</a></p>';

														echo '</div>';
													}

									           echo '</div>';
									        }
									}
								?>

							</div>

						</div>

				</div>

			</div>

<?php get_footer(); ?>
