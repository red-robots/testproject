<?php
/**
 * Template Name: Contact
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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            
            <!-- pulls info for fields from WP -->
            <?php
                while ( have_posts() ) : the_post();
                $name = get_field('name');
                $telephone = get_field('telephone_number');
                $email = get_field('email');
                $website = get_field('website');
                $antiSpam = antispambot( $email );
                $image = get_field('image');
                $description = get_field('description');
                $form = get_field('form');
                // echo "<pre>";
                // print_r ($image);
                // echo "</pre>";
            ?>

            <?php if( !empty($image) ): ?>
                <div class="image"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div>
            <?php endif; ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->
                <div class="too"></div>
                
                <!-- contact info card -->
                <div class="card">
                    <?php if( $name !='' ) { ?>
                        <h4 class="name"><?php echo $name; ?></h4>
                    <?php } ?>
                    <div class="center">
                        <?php if( $telephone !='' ) { ?>
                            <div class="telephone"><i class="far fa-phone"></i> <?php echo $telephone; ?></div>
                        <?php } ?>
                        <?php if( $email !='' ) { ?>
                            <div class="email"><?php echo $email; ?></div>
                        <?php } ?>
                        <?php if( $website !='' ) { ?>
                            <div class="website"><?php echo $website; ?></div>
                        <?php } ?>
                    </div>
                    <?php if( $description !='' ) { ?>
                        <div class="description"><?php echo $description; ?></div>
                    <?php } ?>
                </div>
                <br>

                <!-- <div class="container">
                    <form>
                        
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="Your name...">

                        <label for="lname">Last Name</label>
                        <input type="text" id="fname" name="lastname" placeholder="Your last name...">

                        <label for="contactemail">Email Address</label>
                        <input type="text" id="contactemail" name="cemail" placeholder="Your email address..."

                        <label for="subject">Subject</label>
                        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

                        <input type="submit" value="Submit">

                    </form>
                </div> -->

                <div class="entry-content">
                    <?php
                        the_content();

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'acstarter' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php
                        edit_post_link(
                            sprintf(
                                /* translators: %s: Name of current post */
                                esc_html__( 'Edit %s', 'acstarter' ),
                                the_title( '<span class="screen-reader-text">"', '"</span>', false )
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                    ?>
                </footer><!-- .entry-footer -->
            </article><!-- #post-## -->

            <?php
                endwhile; // End of the loop.
            ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
// get_footer();