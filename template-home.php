<?php
/*
Template Name: Template Home
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- <img src="<?php bloginfo('template_directory'); ?>/img/image-pince.png" alt="pince" class="icon-pince"> -->

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<header class="entry-header entry-title--home" >
						<h1 class="entry-title">
							<img src="<?php bloginfo('template_directory'); ?>/img/home/icon-home.png" alt="Icon home">
						</h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<div class="block-home-brunch">
							<img src="<?php bloginfo('template_directory'); ?>/img/home/etiquettes-brunch.png" alt="Icon brunch">
							<?php the_content(); ?>
						</div>

						<div class="block-home-cuisine">
							<?php $image_etiquette = get_field('image_etiquette'); ?>
							<img src="<?php echo $image_etiquette['url']; ?>" alt="<?php echo $image_etiquette['alt']; ?>" />
							<?php the_field('cuisine_information'); ?>
						</div>

						<div class="block-home-bottom">
							<?php the_field('bottom_information'); ?>
						</div>

					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>