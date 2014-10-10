<?php
/*
Template Name: Template Menu
*/

get_header(); ?>

	<div id="primary" class="content-area template-api">
		<main id="main" class="site-main api-menu" role="main">

			<!-- <img src="<?php bloginfo('template_directory'); ?>/img/image-pince.png" alt="pince" class="icon-pince"> -->

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<?php the_content(); ?>

					<?php get_template_part( 'content', 'menu1001' ); ?>

					<?php 
						$menu = array(ID_CARTE);			

						if(isset($menu)) {
							foreach ($menu as $currentmenu)
							{
								list($tmpmenu, $menurest) = getMenu($currentmenu);
								echo displayMenuWeb($tmpmenu, $resto);
							}
						}
					?>

				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>