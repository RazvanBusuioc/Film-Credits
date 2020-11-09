<?php 
get_header();
//get_sidebar();

$connected = new WP_Query( [
    'relationship' => [
        'id'   => 'movies_to_directors',
        'to' => get_the_ID(),
    ],
    'nopaging'     => true,
] );
if( $connected->have_posts() ){   ?>
    <div class="movies">
        <div class="h3">
            <?php _e('Movies directed by <strong>', 'text_domain'); ?> <?php the_title(); echo "</strong>:" ?>
        </div>
        <ul>
            <?php while ( $connected->have_posts() ) { $connected->the_post();                    
		echo "<div class='col-12 mb-3 col-sm-6 col-md-4'>";
                get_template_part('template-parts/my_movies/content', 'excerpt');
                echo "<li><a href='". get_the_permalink() ."'><h5>". get_the_title() ."</h5></a></li>";
		echo "</div>";
			
		} wp_reset_postdata();  ?>
        </ul>
        </div>
    </div>
  <?php }
get_footer();
?>