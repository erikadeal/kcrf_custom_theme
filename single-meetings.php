<?php
/*
Post format for meetings
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" role="main" class="meeting clearfix">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('eightcol first clearfix'); ?> role="article">

								<header class="article-header">

									<h2 class="meeting-title custom-post-type-title"><?php the_title(); ?></h2>
									<p class="byline vcard"><?php
										printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>.', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( __( 'F jS, Y', 'bonestheme' ) ), bones_get_the_author_posts_link(), get_the_term_list( $post->ID, 'custom_cat', ' ', ', ', '' ) );
									?></p>

								</header>

								<section class="entry-content">

									<?php the_content(); ?>

								</section>
							</article>

							<div class="fourcol last clearfix sidebar-box">

								<h4 class="widgettitle">Meeting Documents</h4>

								<!-- Presentations -->
									<?php 
										if( have_rows('presentations') ): ?>

										<h4 class="box-title-gray">Presentation documents</h4>
										 
										 <?php
										   while ( have_rows('presentations') ) : the_row(); ?>
										 
										        <p><a href="<?php the_sub_field('upload_file');?>"><?php the_sub_field('title');?></a></p>
										 
										   <?php endwhile;
											 
										endif; 
									?>
								<!-- Statistics -->
								<?php 
										if( have_rows('statistics') ): ?>

										<h4 class="box-title-gray">Statistics and Data</h4>
										 
										 <?php
										   while ( have_rows('statistics') ) : the_row(); ?>
										 
										        <p><a href="<?php the_sub_field('upload_file');?>"><?php the_sub_field('title');?></a></p>
										 
										   <?php endwhile;
											 
										endif; 
									?>

								<!-- Flyers and Handouts -->
								<?php 
										if( have_rows('flyers_and_handouts') ): ?>

										<h4 class="box-title-gray">Flyers and Handouts</h4>
										 
										 <?php
										   while ( have_rows('flyers_and_handouts') ) : the_row(); ?>
										 
										        <p><a href="<?php the_sub_field('upload_file');?>"><?php the_sub_field('title');?></a></p>
										 
										   <?php endwhile;
											 
										endif; 
									?>

								<!-- Minutes and Agendas -->
								<?php 
										if( have_rows('minutes_and_agendas') ): ?>

										<h4 class="box-title-gray">Minutes and Agendas</h4>
										 
										 <?php
										   while ( have_rows('minutes_and_agendas') ) : the_row(); ?>
										 
										        <p><a href="<?php the_sub_field('upload_file');?>"><?php the_sub_field('title');?></a></p>
										 
										   <?php endwhile;
											 
										endif; 
									?>

							<?php endwhile; ?>

							</div>

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
