<?php
get_header();
if (have_posts()):
    while (have_posts()) : 
        the_content();
    endwhile;
endif;
get_footer();
