<?php get_header(); ?>
<section class="content" id="content">
  <div class="section section-<?php echo is_product() ? 'product' : 'catalog' ?> section-content">
    <div class="wrapper">
      <?php the_content(); ?>
    </div>
  </div>
  <?php get_footer(); ?>
</section>