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
                    'post_type'=> 'customers',
                    'posts_per_page' => 10,
                    'paged' => $paged,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'customer_type', // your custom taxonomy
                            'field' => 'slug',
                            'terms' => array( 'early', 'late', 'on-time' ) // the terms (categories) you created
                        )
                    )
                ));

                if ($wp_query->have_posts()) : ?>
                <h3>Customers:</h3>
                    <?php while ($wp_query->have_posts()) : ?>
                        <?php $wp_query->the_post(); ?>	
                            
                            <div>
                                <h3 class="titles"><?php the_title(); ?></h3>
                                <div>
                                    <div class="taxonomies">
                                        <?php the_taxonomies(); ?>
                                    </div>                                
                                </div>
                            </div>

                        <?php endwhile;  ?>
                    <div class="clear"></div>
                <?php 
                // references pagination function in your functions.php file
                    pagi_posts_nav(); ?>	
                
                <?php endif; // end of the loop. ?>
                
                <?php
                    $wp_query = new WP_Query();
                    $wp_query->query(array(
                    'post_type'=> 'employees',
                    'posts_per_page' => 10,
                    'paged' => $paged,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'staff_type', // your custom taxonomy
                            'field' => 'slug',
                            'terms' => array( 'board', 'boss', 'kitchen-staff', 'manager' ) // the terms (categories) you created
                        )
                    )
                ));

                if ($wp_query->have_posts()) : ?>
                <h3>Staff:</h3>
                    <?php while ($wp_query->have_posts()) : ?>
                        <?php $wp_query->the_post(); ?>	
                            
                            <div>
                                <h3 class="titles"><?php the_title(); ?></h3>
                                <div>
                                    <div class="taxonomies">
                                        <?php the_taxonomies(); ?>
                                    </div>                                
                                </div>
                            </div>

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
