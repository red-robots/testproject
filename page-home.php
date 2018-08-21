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
			$description = get_field('description');

				if( !empty($homeimage) ): ?>
					<div class="image"><img src="<?php echo $homeimage['url']; ?>" alt="<?php echo $homeimage['alt']; ?>" /></div>
				<?php endif; ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
				<header class="entry-header">
					<?php the_title( '<h1 class="home-title">', '</h1>' ); ?>
				</header>

				<div class="home-description"><?php echo $description ?></div>
				
				<div class="home-icons">
					<a class="icons" href=#><i class="fab fa-facebook-f fa-lg"></i></a>
					<a class="icons" href=#><i class="fab fa-instagram fa-lg"></i></a>
					<a class="icons" href=#><i class="fab fa-twitter fa-lg"></i></a>
				</div>

            </article><!-- #post-## -->

            <?php
                endwhile; // End of the loop.
            ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
// get_footer();
