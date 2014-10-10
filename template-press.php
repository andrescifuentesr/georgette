<?php
/*
Template Name: Template Press
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- <img src="<?php bloginfo('template_directory'); ?>/img/image-pince.png" alt="pince" class="icon-pince"> -->

			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

			<?php
				$args = array(
					'post_type' 		=> 'presse', 		//Costum type Proyectos			
					'order'				=> 'DESC',			// List in ascending order
					'orderby'			=> 'menu_order',	// List them in their menu order
					'posts_per_page'	=>   -1, 			// Show the last one
				);

				$QueryPresse = new WP_Query($args);
			?>
			<div class="grid">

				<?php /* Start the Loop */ ?>
				<?php while ($QueryPresse->have_posts()) : $QueryPresse->the_post(); ?><!--
				--><div class="module-presse">
						
						<?php
							if ( get_field('detail_image_presse') ) {
								$link = get_field('detail_image_presse');
							} elseif ( get_field('link_presse') ) {
								$link = get_field('link_presse');
								$target = "target='_blank'";
							}
						?>

						<a class="fancybox" href="<?php echo $link; ?>"  <?php echo $target; ?> >
							<?php $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'imgPresse' ); ?>
							<?php echo '<img src="' . $image_src[0]  . '"  />'; ?>
						</a>
						<div class="module-presse-texte">
							<h3><?php the_title(); ?></h3>
							<p><?php the_field('date_presse') ?></p>
							<a class="fancybox lire-suite" href="<?php echo $link; ?>">En savoir plus</a>
						</div>
					</div><!--
				--><?php endwhile; // end of the loop. ?>
			</div><?php /* .grid */ ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>