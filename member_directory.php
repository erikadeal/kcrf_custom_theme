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

							<?php
								$display_admins = false;
								$order_by = 'display_name'; // 'nicename', 'email', 'url', 'registered', 'display_name', or 'post_count'
								$role = 'forum_member'; // 'subscriber', 'contributor', 'editor', 'author' - leave blank for 'all'
								$hide_empty = false; // hides authors with zero posts

								if(!empty($display_admins)) {
									$blogusers = get_users('orderby='.$order_by.'&role='.$role);
								} 

								else {
									$admins = get_users('role=administrator');
									$exclude = array();
									foreach($admins as $ad) {
										$exclude[] = $ad->ID;
									}
									$exclude = implode(',', $exclude);
									$blogusers = get_users('exclude='.$exclude.'&orderby='.$order_by.'&role='.$role);
								}

								$authors = array();

								foreach ($blogusers as $bloguser) {
									$user = get_userdata($bloguser->ID);
									if(!empty($hide_empty)) {
										$numposts = count_user_posts($user->ID);
										if($numposts < 1) continue;
									}
									$authors[] = (array) $user;
								}

								echo '<ul class="contributors">';
								foreach($authors as $author) {
									$display_name = $author['data']->display_name;
									$author_profile_url = get_author_posts_url($author['ID']);

									echo '<li><a href="', $author_profile_url, '">', $display_name, '</a></li>';
								}
								echo '</ul>';
								?>

						</div>

				</div>

			</div>

<?php get_footer(); ?>
