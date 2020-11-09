<?php 
get_header();
if ( have_posts() ) {
    echo "<ul>";
	while ( have_posts() ) {
        the_post(); ?>
        <li> <a href=<?php the_permalink()?> ><?php the_title()?> </a> </li>
        <?php
    } // end while
    echo "</ul>";
    wp_pagenavi();
} // end if
get_footer();
?>
