			<footer class="footer" role="contentinfo">

				<div id="footer-widgets">
					<div class="fourcol first clearfix">
					</div>
					<div class="fourcol clearfix">
					</div>
					<div class="fourcol last clearfix">
					</div>
				</div>

				<div id="inner-footer" class="clearfix">

					<nav role="navigation">
							<?php bones_footer_links(); ?>
					</nav>

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html>
