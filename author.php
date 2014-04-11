<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="profile eightcol first clearfix" role="main">

						    <?php
						    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
						    ?>

						    <h2><?php echo $curauth->organization_name; ?></h2>
						    <div class="org-info">
						    	<h4 class="profile-section-title">About <?php echo $curauth->organization_name; ?></h4>
						        <p><?php echo $curauth->user_description; ?></p>

						        <h4 class="profile-section-title">Services</h4>
						        <p>
							        <?php 
							        	$array = $curauth->member_services;
							        	echo implode(', ', $array);
							        ?>
						        </p>

						        <?php if($curauth->additional_services){ ?>
							        <h4 class="profile-section-title">Additional Services</h4>
							        <p><?php echo $curauth->additional_services; ?></p>
							   	<?php }?>
						    </div>

						    <h4 class="profile-section-title">Recent News &amp; Events</h4>

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

					<div class="sidebar fourcol last clearfix contact-box" role="complimentary">

						<h4 class="widgettitle">Contact Details</h4>

						<h4 class="profile-section-title">Contact Person</h4>
				        <p><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></p>

				        <h4 class="profile-section-title">Email</h4>
				        <p><?php echo $curauth->user_email; ?></p>

				        <h4 class="profile-section-title">Phone</h4>
				        <p><?php echo $curauth->phone; ?></p>

				        <h4 class="profile-section-title">Address</h4>
				        <p><?php echo $curauth->address_line_1; ?></p>
				        <p><?php echo $curauth->address_line_2; ?></p>

				        <h4 class="profile-section-title">Website</h4>
						<p><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p>

						</div>
					</div>

				</div>

<?php get_footer(); ?>
