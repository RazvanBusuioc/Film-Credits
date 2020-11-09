<?php 
get_header();
//get_sidebar();
if ( have_posts() ) {
	while ( have_posts() ) {
        include('template-parts/post/content-post.php');
	} // end while
} // end if
?>
<?php 
wp_pagenavi();
get_footer();
?>