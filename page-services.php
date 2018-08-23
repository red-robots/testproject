<?php
/**
 * Template Name: Services
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
                    $services = get_field('capabilities', 'option');
                    $image = get_field('service-image');
                
                if( !empty($image) ): ?>
                    <div class="image"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div>
                <?php endif; ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>

                    <!-- // get_template_part( 'template-parts/content', 'page' );

                // check if the repeater field has rows of data -->
				<?php if( have_rows('capabilities') ): ?>
				
					<div class="capabilities"><?php
                    // loop through the rows of data
                    while ( have_rows('capabilities') ) : the_row(); ?>
                        <div>
							<!-- // display a sub field value -->
							<i class="<?php the_sub_field('service-icon') ?> fa-5x">
                            <h3 class="bold"><?php the_sub_field('service-title'); ?></h3>
                            <p><?php the_sub_field('service-description'); ?></p>
						</div>
                    <?php
                    endwhile;
                    ?> </div> <?php

                else :

                // no rows found

                endif;

                endwhile; // End of the loop.
                ?>
            </article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();