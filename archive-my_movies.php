<?php 
get_header();
//get_sidebar();
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
} // end if
get_footer();
?>
