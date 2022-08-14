<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<div data-elementor-type="wp-page" data-elementor-id="156" class="elementor elementor-156">
  <section class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default content" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element" data-element_type="column">
        <div class="elementor-widget-wrap elementor-container elementor-column-gap-default">
            <h1><?php echo get_the_title();?></h1>
            <h2><?php echo do_shortcode('[acf field="blurb"]');?></h2>
            <?php echo get_the_content();?>
            <h3 class="text-center">Request A Consultation</h3>
            <p class="text-center">You can complete the following form to request consultation</p>
            <?php echo do_shortcode('[fluentform id="3"]');?>
        </div>
      </div>
    </div>
  </section>
</div>
<?php endwhile;?>
<?php get_footer(); ?>