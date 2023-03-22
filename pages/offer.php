<?php
/*
Template Name: offer
Template Post Type: page
*/
?>
<?php get_header(); ?>
<section class="content" id="content">
  <div class="section section-guarantee section-content">
    <div class="wrapper">
      <p class="inner-title">
        Договір оферти
      </p>
      <div class="content-image-wrapper">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/offer-img.png" alt="">
      </div>
      <div class="default-content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
  <?php get_footer() ?>
</section>
