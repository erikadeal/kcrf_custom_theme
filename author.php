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
