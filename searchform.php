<?php
/**
 * If your form is generated using get_search_form() you do not need to do this,
 * as SearchWP Live Search does it automatically out of the box
 */
?>
<form action="/" method="get" class="search-form">
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search…" data-swplive="true" />
    <button type="submit"><i class="icon-search"></i></button>
</form>
