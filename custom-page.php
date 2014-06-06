<?php 
/*
Template Name: Customized Page
*/
?>
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

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
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

					<!-- Customized sidebar content -->
						<div class="sidebar fourcol last clearfix">

						<!-- Get first sidebar widget if title is defined -->
							<?php
							if(get_field('sidebar_area_1_title')){ ?>

								<div class="widget">
									<h4 class="widgettitle"><?php the_field('sidebar_area_1_title'); ?></h4>
									<?php if(get_field('sidebar_area_1_text')) { ?>
										<?php the_field('sidebar_area_1_text'); ?>
									<?php }?>
								</div>

							<?php } ?>

						<!-- Get second sidebar widget if title is defined -->
							<?php
							if(get_field('sidebar_area_2_title')){ ?>

								<div class="widget">
									<h4 class="widgettitle"><?php the_field('sidebar_area_2_title'); ?></h4>
									<?php if(get_field('sidebar_area_2_text')) { ?>
										<?php the_field('sidebar_area_2_text'); ?>
									<?php }?>
								</div>

							<?php } ?>
						</div>

				</div>

			</div>

<?php get_footer(); ?>