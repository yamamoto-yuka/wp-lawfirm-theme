<?php
function team(){
  // WP_Query is a class defined in WordPress.
  // It allows developers to write custom queries and display posts using different parameters. 
  // It is possible for developers to directly query WordPress database.
  $query = new WP_Query(
    array(
        'post_type' => 'team',
        'post_status' => 'publish',
        'post_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order'
    )
);
$i = 1;
$str = '<div class="elementor-row staff">';
while ($query->have_posts()):
    $query->the_post();
    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'team');
    $str .= '
    <div class="elementor-column elementor-col-33 elementor-top-column elementor-element" data-element_type="column">
        <div class="team-member-info">
            <div class="image-wrapper">
              <a href="'.get_the_permalink().'"><img src="'.$thumbnail.'" alt="'.get_the_title().'"></a>
            </div>
            <h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>
            <h3>'.do_shortcode('[acf field="title"]').'</h3>
            <div>
                <a href="mailto:'.do_shortcode('[acf field="email_address"]').'" title="Email '.get_the_title().'">'.do_shortcode('[acf field="email_address"]').'</a>
            </div>
            <div>
                 <a href="tel:'.do_shortcode('[acf field="phone_number"]').'" title="Phone '.get_the_title().'">'.do_shortcode('[acf field="phone_number"]').'</a>
            </div>
          </div>
    </div>
    ';
      // If this box generate three, close the row div,
      // And create new row div
      // Then loop again
      if($i % 3 == 0):
        $str .= '</div>';
        $str .= '<div class="elementor-row staff">';
    endif;
    $i++;
endwhile;
wp_reset_postdata();
return $str;
// After looping through a separate query, 
// this function restores the $post global to the current post in the main query.
// The loop in WP_Query (the_post) changes the global variable $post,
//  so $post must be restored with wp_reset_postdata().
}


add_shortcode('team', 'team');


