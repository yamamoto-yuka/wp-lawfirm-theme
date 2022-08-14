<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
  <div data-elementor-type="wp-page" data-elementor-id="156" class="elementor elementor-156">
    <section class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default single-team" data-element_type="section">
      <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-30 elementor-top-column elementor-element" data-element_type="column">
          <div class="elementor-widget-wrap elementor-container elementor-column-gap-default">
                <?php echo the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
          </div>
        </div>
        <div class="elementor-column elementor-col-70 elementor-top-column elementor-element" data-element_type="column">
          <div class="elementor-widget-wrap elementor-container elementor-column-gap-default">
            <h2><?php echo get_the_title(); ?></h2>
            <h3><?php echo do_shortcode('[acf field="title"]'); ?></h3>
            <?php echo get_the_content(); ?>
            <?php 
                $areas = get_field('areas_of_practice');
                $association = get_field('professional_associations');
                $education = get_field('education');
                if($areas != ''):
                  echo '<h3 class="text-center">Areas of Expertise</h3>';
                  echo '<div class="team-section">'.$areas.'</div>';
                endif;
            ?>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php endwhile; ?>
<?php get_footer(); ?>