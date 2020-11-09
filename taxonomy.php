<?php 
get_header();
//get_sidebar();
if ( have_posts() ) {
    echo "<h1>" . ucfirst(get_queried_object()->slug) . " Movies </h1>";
    ?>
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
} // end if
get_footer();
?>