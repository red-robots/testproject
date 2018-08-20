<?php
/**
 * Template Name: Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

		<?php
			while ( have_posts() ) : the_post();
			$homeimage = get_field('homeimage');

				if( !empty($homeimage) ): ?>
					<div class="image"><img src="<?php echo $homeimage['url']; ?>" alt="<?php echo $homeimage['alt']; ?>" /></div>
				<?php endif; ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
				
				<div>
					<i class="fab fa-facebook-f"></i>
					<i class="fab fa-instagram"></i>
					<i class="fab fa-twitter"></i>
				</div>
			</article>


				

            </article><!-- #post-## -->

            <?php
                endwhile; // End of the loop.
            ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
// get_footer();
