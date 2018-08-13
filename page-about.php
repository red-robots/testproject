<?php
/**
 * Template Name: About
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

<div class="green"></div>
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">
			
			<?php
				$aboutimage = get_field('image-about');

					if( !empty($aboutimage) ): ?>
						<div class="image"><img src="<?php echo $aboutimage['url']; ?>" alt="<?php echo $aboutimage['alt']; ?>" /></div>
					<?php endif; 
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
				<!-- .entry-header -->

				<div class="too"></div>

					<!-- <?php
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail( 'full' );
						}
					?> -->

					<div class="parallax-window" data-parallax="scroll" 
					data-image-src="<?php echo $parallax['url'];?>" alt="<?php echo $parallax['alt']; ?>"></div>

					<!-- loop for employee cards -->
					<?php 
						$i = 0;
						$contact = array();
						$loop = new WP_Query ( array( 
							'post_type' => 'employees',
							'posts_per_page' => 9,
							'paged' => $paged
						));
						if ( $loop->have_posts() ) : 
						?>
						<div class="card-container">
							<h1>Staff</h1>
							<div class="pricing-grid">		
								<?php while ($loop->have_posts() ) : $loop->the_post();								
									$title = get_field('title');
									$linkedin = get_field('linkedIn');
									$email = get_field('email');
									$phone = get_field('phone');
									$headshot = get_field('photo');
									$contact[] = $linkedin;
									$contact[] = $email;
									$contact[] = $phone;
									// echo "<pre>";
									// print_r($parallax);
									// echo "</pre>";

								?>
								
							<!-- GET TEMPLATE PART -->

								<div class="plan">
								<!-- <img src="http://localhost:8888/bellaworks/testproject/wp-content/uploads/2018/07/michael-frattaroli-234665-unsplash.jpg" /> -->
									<!-- Headshot -->
									<?php if (!empty($headshot)) { ?>
										<img class="headshot" src="<?php echo $headshot['url'];?>" alt="<?php echo $headshot['alt']; ?>"/>						
									<?php } else { ?>
										<i class="avatar fas fa-portrait fa-10x"></i>
									<?php } ?>
									<!-- Name -->
									<h2><?php echo get_the_title(); ?></h2>
									<!-- <div class="border"></div> -->
									<ul class="features">
										<!-- Position -->
										<?php if (!empty($title)) { ?>
											<li><?php echo $title; ?></li>
										<?php } ?>
										<!-- Contact -->
										<?php if (!empty($contact)) ?>
									</ul>			
									<div class="cta">
										<!-- Email -->
										<?php if (!empty($email)) { ?>
											<div href="mailto:<?php echo $email; ?>"><i class="fas fa-envelope" href="<?php echo $email; ?>"></i></div>
										<?php } ?>
										<!-- Phone -->
										<?php if (!empty($phone)) { ?>
											<div href="tel:+1<?php echo $phone ?>"><i class="fas fa-phone" href="<?php echo $phone; ?>"></i></div>
										<?php } ?>
										<!-- linkedIn -->
										<?php if (!empty($linkedin)) { ?>
											<div href="<?php echo $linkedin; ?>"><i class="fas fa-briefcase" href="<?php echo $linkedin; ?>"></i></div>
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
						<section class="test">
							<div class="sample js-blocks">
								<p>akjfnksjdafb</p>
							</div>
							<div class="sample js-blocks">
								<p>akjfnksjdafb</p>
								<p>akjfnksjdafb</p>
								<p>akjfnksjdafb</p>
								<p>akjfnksjdafb</p>
							</div>
							<div class="sample js-blocks">
								<p>akjfnksjdafb</p>
							</div>
						</section>
					<?php
					else :
						esc_html_e( 'No employees!', 'text-domain' );
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
