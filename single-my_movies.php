<?php 
get_header();
//get_sidebar();
if ( have_posts() ) {
	while ( have_posts() ) {
        include('template-parts/post/content-my_movies-post.php');
        } // end while
        wp_pagenavi();
} // end if
get_footer();
?>