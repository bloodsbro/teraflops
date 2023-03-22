<?php
/*
Template Name: guarantee
Template Post Type: page
*/
?>
<?php get_header(); ?>
<section class="content" id="content">
  <div class="section section-guarantee section-content">
    <div class="wrapper">
      <p class="inner-title">
        Інформація про доставку
      </p>
      <div class="content-image-wrapper">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/guar-img.png" alt="">
      </div>
      <div class="default-content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
  <?php get_footer(); ?>
</section>


