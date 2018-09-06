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
            $servicesimage = get_field('image-services');

                if( !empty($servicesimage) ): ?>
                    <div class="image"><img src="<?php echo $servicesimage['url']; ?>" alt="<?php echo $servicesimage['alt']; ?>" /></div>
                <?php endif; ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>

                    <!-- loop for services cards -->
					<?php 
						$i = 0;
						$contact = array();
						$loop = new WP_Query ( array( 
							'post_type' => 'services',
							'posts_per_page' => 9,
							'paged' => $paged
						));
						if ( $loop->have_posts() ) : 
						?>
						<div class="card-container">
							<h1>What We Offer</h1>
							<div class="services-grid">		
								<?php while ($loop->have_posts() ) : $loop->the_post();								
									$image = get_field('service-image');
									$description = get_field('service-description');
									// echo "<pre>";
									// print_r($image);
									// echo "</pre>";

								?>
								
							<!-- GET TEMPLATE PART -->

								<div class="plan">
									<!-- Icon -->
									<?php if (!empty($image)) { ?>
                                        <i class="icon fas <?php echo $image; ?> fa-3x" ></i>
                                    <?php } ?>
                                    <div>
                                        <!-- Title -->
                                        <h2><?php echo get_the_title(); ?></h2>
                                        <!-- Description -->
                                        <?php if (!empty($description)) { ?>
                                            <p><?php echo $description; ?></p>
                                        <?php } ?>
                                    </div>
								</div>
								<?php
									// reset array
									$contact = array();
									endwhile;
									wp_reset_postdata();
								?>
							</div>
						</div>
					<?php
					else :
						esc_html_e( 'No services!', 'text-domain' );
					endif;
					?>				

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
