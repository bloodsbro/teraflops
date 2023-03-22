<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */
?>
<?php get_header(); ?>
<section class="content" id="content">
  <div class="section section-<?php echo is_product() ? 'product' : 'catalog' ?> section-content">
    <div class="wrapper">
      <?php woocommerce_content(); ?>
    </div>
  </div>
  <?php get_footer(); ?>
</section>

