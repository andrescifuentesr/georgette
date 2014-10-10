<?php
/*
Template Name: Template Visite Virtuelle
*/

get_header(); ?>

	<div id="primary" class="content-area template-visite">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="bloc-visite">
					<?php the_content(); ?>
				</div>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>