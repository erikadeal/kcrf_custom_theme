<?php
/*
Template Name: Meetings Archive
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="main" class="clearfix" role="main">

					<?php while (have_posts()) : the_post(); ?>

						<div class="wrap clearfix">
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="archive-title" itemprop="headline"><?php the_title(); ?></h1>

								</header>

							</article>
						</div>

							<?php endwhile; ?>

				<!-- Recent archives -->
						
						<div class="recent-archives clearfix">

							<div class="wrap clearfix">

							<?php 

							//Parameters for getting first three meetings
							$args = array('post_type'=>'meetings', 'posts_per_page'=>3);

							//Query meetings
							$meetings = new WP_Query( $args );

							while ($meetings->have_posts()) : $meetings->the_post(); 
							?>

						<!-- Single meeting displayed as one of three columns -->
							<div class="recent-meeting fourcol clearfix">

								<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

									<header class="article-header">

										<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
										<p class="byline vcard"><?php
											printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>.', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( __( 'F jS, Y', 'bonestheme' ) ), bones_get_the_author_posts_link());
										?></p>

									</header>

									<section class="entry-content clearfix">

										<?php the_excerpt(); ?>

									</section>

								</article>
							</div>

							<?php endwhile; ?>
							<?php wp_reset_postdata();?>
						<p class="meetings-link"><a href="<?php echo home_url();?>/meetings" class="all-meetings">See all meetings</a></p>
						</div>
					</div>

				<!-- Start archives by content type -->

						<div id="archive-documents" class="wrap clearfix">

					<!-- Presentations documents -->

						<div class="row clearfix">

							<div class="sixcol first clearfix">

								<h3 class="doc-cat-title">Presentations</h3>

									<?php 

										//Query meetings
										$args = array('post_type'=>'meetings');
										$presentations = new WP_Query( $args );

										echo '<ul class="meetings-cat">';

										while ($presentations->have_posts()) : $presentations->the_post(); 

											//Check for repeater field
											if( have_rows('presentations') ):
										 
										 	// loop through uploaded files
										    while ( have_rows('presentations') ) : the_row(); ?>
										 
										        <li><a href="<?php the_sub_field('upload_file');?>"><?php the_sub_field('title');?></a></li>
										 
										   <?php endwhile;
										 
											else :
											 
											    continue;
											 
											endif; 

										endwhile;

										echo '</ul>';

										?>

									<?php wp_reset_postdata();?>

							</div> 

					<!-- Statistics documents -->
						<div class="sixcol last clearfix">

							<h3 class="doc-cat-title">Statistics</h3>

								<?php 
									$args = array('post_type'=>'meetings');
									$presentations = new WP_Query( $args );

									echo '<ul class="meetings-cat">';

									while ($presentations->have_posts()) : $presentations->the_post(); 
										if( have_rows('statistics') ):
									 
									 	// loop through the rows of data
									    while ( have_rows('statistics') ) : the_row(); ?>
									 
									        <li><a href="<?php the_sub_field('upload_file');?>"><?php the_sub_field('title');?></a></li>
									 
									   <?php endwhile;
									 
										else :
										 
										    continue;
										 
										endif; 

									endwhile; 

									echo '</ul>';

									?>
								<?php wp_reset_postdata();?>

							</div>
						</div>

						<div class="row clearfix">
					<!-- Flyers and handouts -->
							<div class="sixcol first clearfix">

								<h3 class="doc-cat-title">Flyers and Handouts</h3>

								<?php 
									$args = array('post_type'=>'meetings');
									$presentations = new WP_Query( $args );

									echo '<ul class="meetings-cat">';

									while ($presentations->have_posts()) : $presentations->the_post(); 
										if( have_rows('flyers_and_handouts') ):
									 
									 	// loop through the rows of data
									    while ( have_rows('flyers_and_handouts') ) : the_row(); ?>
									 
									        <li><a href="<?php the_sub_field('upload_file');?>"><?php the_sub_field('title');?></a></li>
									 
									   <?php endwhile;
									 
										else :
										 
										    continue;
										 
										endif; 

									endwhile; 

									echo '</ul>';

									?>
								<?php wp_reset_postdata();?>

							</div>

					<!-- Minutes and agendas -->
					<div class="sixcol last clearfix">

						<h3 class="doc-cat-title">Minutes and Agendas</h3>

						<?php 
							$args = array('post_type'=>'meetings');
							$presentations = new WP_Query( $args );

							echo '<ul class="meetings-cat">';

							while ($presentations->have_posts()) : $presentations->the_post(); 
								if( have_rows('minutes_and_agendas') ):
							 
							 	// loop through the rows of data
							    while ( have_rows('minutes_and_agendas') ) : the_row(); ?>
							 
							        <li><a href="<?php the_sub_field('upload_file');?>"><?php the_sub_field('title');?></a></li>
							 
							   <?php endwhile;
							 
								else :
								 
								    continue;
								 
								endif; 

								endwhile; 

								echo '</ul>';

								?>
						<?php wp_reset_postdata();?>		

					</div>

					</div>
						
						</div>
	
					</div>

				</div>

<?php get_footer(); ?>
