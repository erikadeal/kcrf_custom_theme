<?php
/*
Post format for meetings
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('eightcol first clearfix'); ?> role="article">

								<header class="article-header">

									<h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
									<p class="byline vcard"><?php
										printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span>.', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( __( 'F jS, Y', 'bonestheme' ) ), bones_get_the_author_posts_link(), get_the_term_list( $post->ID, 'custom_cat', ' ', ', ', '' ) );
									?></p>

								</header>

								<section class="entry-content">

									<?php the_content(); ?>

								</section>
							</article>

							<div class="documents fourcol last clearfix">
								<!-- Presentations -->
									<?php 
										if( have_rows('presentations') ): ?>

										<h3>Presentation documents</h3>
										 
										 <?php
										   while ( have_rows('presentations') ) : the_row(); ?>
										 
										        <p><a href="<?php the_sub_field('upload_file');?>"><?php the_sub_field('title');?></a></p>
										 
										   <?php endwhile;
										 
											else :
											 
											    continue;
											 
										endif; 
									?>
								<!-- Statistics -->
								<?php 
										if( have_rows('statistics') ): ?>

										<h3>Statistics and Data</h3>
										 
										 <?php
										   while ( have_rows('statistics') ) : the_row(); ?>
										 
										        <p><a href="<?php the_sub_field('upload_file');?>"><?php the_sub_field('title');?></a></p>
										 
										   <?php endwhile;
										 
											else :
											 
											    continue;
											 
										endif; 
									?>

								<!-- Flyers and Handouts -->
								<?php 
										if( have_rows('flyers_and_handouts') ): ?>

										<h3>Flyers and Handouts</h3>
										 
										 <?php
										   while ( have_rows('flyers_and_handouts') ) : the_row(); ?>
										 
										        <p><a href="<?php the_sub_field('upload_file');?>"><?php the_sub_field('title');?></a></p>
										 
										   <?php endwhile;
										 
											else :
											 
											    continue;
											 
										endif; 
									?>

								<!-- Minutes and Agendas -->
								<?php 
										if( have_rows('minutes_and_agendas') ): ?>

										<h3>Minutes and Agendas</h3>
										 
										 <?php
										   while ( have_rows('minutes_and_agendas') ) : the_row(); ?>
										 
										        <p><a href="<?php the_sub_field('upload_file');?>"><?php the_sub_field('title');?></a></p>
										 
										   <?php endwhile;
										 
											else :
											 
											    continue;
											 
										endif; 
									?>

							</div>

							<?php endwhile; ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

				</div>

			</div>

<?php get_footer(); ?>
