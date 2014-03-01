<?php
/*
Template Name: Meetings Archive
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">

				<!-- Basic page content -->

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

				<!-- Start archive sections -->
							<div id="archive">
								<div class="sixcol first clearfix archive-section">
									<h1 class="h2">Presentations</h1>
									<ul class="archive-list">
										<li><a href="#">Presentation title</a></li>
										<li><a href="#">Presentation title</a></li>
										<li><a href="#">Presentation title</a></li>
									</ul>
								</div>
								<div class="sixcol last clearfix archive-section">
									<h1 class="h2">Statistics</h1>
									<ul class="archive-list">
										<li><a href="#">Stats handout</a></li>
										<li><a href="#">Stats handout</a></li>
										<li><a href="#">Stats handout</a></li>
									</ul>
								</div>
								<div class="sixcol first clearfix archive-section">
									<h1 class="h2">Minutes and Agendas</h1>
									<ul class="archive-list">
										<li><a href="#">Agenda</a></li>
										<li><a href="#">Agenda</a></li>
										<li><a href="#">Agenda</a></li>
									</ul>
								</div>
								<div class="sixcol last clearfix archive-section">
									<h1 class="h2">Flyers and Handouts</h1>
									<ul class="archive-list">
										<li><a href="#">Handout</a></li>
										<li><a href="#">Handout</a></li>
										<li><a href="#">Handout</a></li>
									</ul>
								</div>
							</div>
						</div>

						<?php get_sidebar( 'meetings' ); ?>

				</div>

			</div>

<?php get_footer(); ?>
