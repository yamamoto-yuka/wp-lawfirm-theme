<?php
function practice_areas(){
  // WP_Query is a class defined in WordPress.
  // It allows developers to write custom queries and display posts using different parameters. 
  // It is possible for developers to directly query WordPress database.
    $query = new WP_Query(
        array(
            'post_type' => 'practice-areas',
            'post_status' => 'publish',
            'post_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'menu_order'
        )
  );
$i=1;
$str = '<div class="elementor-row">';
while ($query->have_posts()):
      $query->the_post();
      $str .= '
      <div class="elementor-column elementor-col-33 elementor-top-column elementor-element" data-element_type="column" ">
          <div class="practice-area-box homepage-services">
            <div class="content">
                <a class="icon" href="'.get_the_permalink().'"><i aria-hidden="true" class="'.do_shortcode('[acf field="icon"]').'"></i></a>
                <h3 class="title">'.get_the_title().'</h3>
                <p class="description">'.do_shortcode('[acf field="blurb"]').'</p>
            </div>
          </div>
      </div>
      ';
      // If this box generate three, close the row div,
      // And create new row div
      // Then loop again
      if($i % 3 == 0):
        $str .= '</div>';
        $str .= '<div class="elementor-row">';
      endif;
      $i++;
endwhile;
// After looping through a separate query, 
// this function restores the $post global to the current post in the main query.
// The loop in WP_Query (the_post) changes the global variable $post,
//  so $post must be restored with wp_reset_postdata().
wp_reset_postdata();
return $str;
}


add_shortcode('practice_areas', 'practice_areas');
