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

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">
            
            <!-- pulls info for fields from WP -->
            <?php
                while ( have_posts() ) : the_post();
                    $friday = get_field('friday');
                    $saturday = get_field('saturday');
                    $sunday = get_field('sunday_new');
                    $monday = get_field('monday');
                    $tuesday = get_field('tuesday');
                    $wednesday = get_field('wednesday');                
                    $thursday = get_field('thursday');
                    // $antiSpam = antispambot( $email );
                    $image = get_field('image');
                    
                    $form = get_field('form');
                // echo "<pre>";
                // print_r ($hours);
                // echo "</pre>";

            if( !empty($image) ): ?>
                <div class="image"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div>
            <?php endif; ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header>
                <!-- .entry-header -->
                
                <!-- contact info card -->
                <div class="hours-card">
                    <ul>
                        <li>
                            <h4>Find Us</h4>
                            <p>(704) 375-0831</p>
                            </br>
                            <p>220 East Blvd. Suite 200A</p>
                            <p>Charlotte, NC 28203</p>
                            <h4>Hours</h4>
                            <ul>
                                <li>
                                    <?php if( $friday !='' ) { ?>
                                        Friday      <?php echo $friday; ?>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if( $saturday !='' ) { ?>
                                        Saturday    <?php echo $saturday; ?>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if( $sunday !='' ) { ?>
                                        Sunday      <?php echo $sunday; ?>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if( $monday !='' ) { ?>
                                        Monday      <?php echo $monday; ?>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if( $tuesday !='' ) { ?>
                                        Tuesday     <?php echo $tuesday; ?>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if( $wednesday !='' ) { ?>
                                        Wednesday   <?php echo $wednesday; ?>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if( $thursday !='' ) { ?>
                                        Thursday    <?php echo $thursday; ?>
                                    <?php } ?>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="map">
                            <h3>Location</h3>
                            <!--The div element for the map -->
                            <div id="map"></div>
                                <script>
                                    // Initialize and add the map
                                    function initMap() {
                                        // The location of Uluru
                                        var uluru = {lat: 35.2109, lng: -80.857121};
                                        // The map, centered at Uluru
                                        var map = new google.maps.Map(
                                            document.getElementById('map'), {zoom: 12, center: uluru});
                                        // The marker, positioned at Uluru
                                        var marker = new google.maps.Marker({position: uluru, map: map});
                                    }
                                </script>

                                <script async defer
                                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_MtpKZO-xgGIUegsR7ijD-mVB_51D2uM&callback=initMap">
                                </script>
                        </li>
                    </ul>             
                </div>
                <br>


    

                <div class="entry-content">
                    <?php
                        the_content();

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'acstarter' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div><!-- .entry-content -->

                <!-- <footer class="entry-footer">
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
                </footer>.entry-footer -->
            </article><!-- #post-## -->

            <?php
                endwhile; // End of the loop.
            ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();