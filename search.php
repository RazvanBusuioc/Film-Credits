<?php 
get_header();
//get_sidebar();
 if ( have_posts() ) {
	/* translators: Search query. */
	echo "<h1>";
	printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' );
	echo "</h1>";
}else{
	echo "<h1>";
	printf( __( 'Nothing found for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' );
	echo "</h1>";
} 
if ( have_posts() ) {
	?>
	<br>
    <div class="container">
    <div class="row">
    <?php
	while ( have_posts() ) {
        include('template-parts/post/content-excerpt.php');
    } // end while
    ?>
    </div>
    </div>
    <br>
	<?php
	wp_pagenavi();
}
get_footer();
?>