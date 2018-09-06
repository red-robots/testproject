<?php
/**
 * Template Name: Challenge
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

get_header();
	$parallax = get_field('parallax');
?>

<!-- <div class="green"></div> -->
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">
			
			<?php
			$aboutimage = get_field('image-about');

				if( !empty($aboutimage) ): ?>
					<div class="image"><img src="<?php echo $aboutimage['url']; ?>" alt="<?php echo $aboutimage['alt']; ?>" /></div>
				<?php endif; ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
				<!-- .entry-header -->

                <?php
                    $wp_query = new WP_Query();
                    $wp_query->query(array(
                    'post_type'=>'custom_post_type',
                    'posts_per_page' => 10,
                    'paged' => $paged,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'custom_taxonomy', // your custom taxonomy
                            'field' => 'slug',
                            'terms' => array( 'green', 'blue' ) // the terms (categories) you created
                        )
                    )
                ));
                if ($wp_query->have_posts()) : ?>
                <?php while ($wp_query->have_posts()) : ?>
                <?php $wp_query->the_post(); ?>	
                    
                    <li><?php the_title(); ?></li>
                    
                <?php endwhile;  ?>
                <div class="clear"></div>
                <?php 
                // references pagination function in your functions.php file
                    pagi_posts_nav(); ?>	
                
                <?php endif; // end of the loop. ?>			

				<div class="entry-content">
					<?php
						the_content();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'acstarter' ),
							'after'  => '</div>',
						) );
					?>
				</div>
				<!-- .entry-content -->
				
			</article><!-- #post-## -->

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
