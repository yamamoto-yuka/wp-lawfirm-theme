<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
  <div data-elementor-type="wp-page" data-elementor-id="156" class="elementor elementor-156">
    <section class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default single-team" data-element_type="section">
      <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-30 elementor-top-column elementor-element" data-element_type="column">
          <div class="elementor-widget-wrap elementor-container elementor-column-gap-default contact-links">
            <?php echo the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
            <?php 
              $email = get_field('email_address');
              $phone = get_field('phone_number');
              if($email != ''):
                echo '<a href="mailto:'.$email.'" title="Email '.get_the_title().'"><i class="fas fa-envelope-square"></i></a>';
              endif;
              if($phone !=''):
                echo '<a href="tel:'.$phone.'" title="Call '.get_the_title().'"><i class="fas fa-phone-square"></i></a>';
              endif;
            ?>
          </div>
        </div>
        <div class="elementor-column elementor-col-70 elementor-top-column elementor-element" data-element_type="column">
          <div class="elementor-widget-wrap elementor-container elementor-column-gap-default">
            <h2><?php echo get_the_title(); ?></h2>
            <h3><?php echo do_shortcode('[acf field="title"]'); ?></h3>
            <?php echo get_the_content(); ?>
            <div class="team-member-moreinfo">
              <?php
              $areas = get_field('areas_of_practice');
              $association = get_field('professional_association');
              $education = get_field('education');
              if ($areas != '') :
                echo '<div>';
                echo '<h3>Areas of Expertize</h3>';
                echo '<div class="team-section">' . $areas . '</div>';
                echo '</div>';
              endif;
              if ($association != '') :
                echo '<div>';
                echo '<h3>Professional Association</h3>';
                echo '<div class="team-section">' . $association . '</div>';
                echo '</div>';
              endif;
              if ($education != '') :
                echo '<div>';
                echo '<h3>Education</h3>';
                echo '<div class="team-section">' . $education . '</div>';
                echo '</div>';
              endif;
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php endwhile; ?>
<?php get_footer(); ?>