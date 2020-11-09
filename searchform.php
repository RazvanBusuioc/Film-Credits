<form class="form-inline mr-auto" id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <input class="form-control mr-sm-2" type="text" name="s" placeholder="Search" aria-label="Search" value="<?php echo get_search_query(); ?>">
  <button class=" text-dark btn btn-outline-success btn-rounded btn-sm my-0" type="submit" value="Search">Search</button>
</form>