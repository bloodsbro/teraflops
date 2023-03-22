<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!--<ul class="products columns---><?php //echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?><!--">-->

<div class="catalog-envelope">
  <aside>
    <div class="aside-item">
      <div class="price-element">
        <div class="values">
          <input type="text" id="range1">
          <input type="text" id="range2">
        </div>
        <div class="slider-inner">
          <div class="slider-wrapper">
            <div class="slider-track"></div>
            <input type="range" min="0" max="15000" value="0" id="price-slider-1" oninput="slideOne()">
            <input type="range" min="0" max="999999" value="999999" id="price-slider-2" oninput="slideTwo()">
          </div>
        </div>
      </div>
    </div>
    <?php echo do_shortcode('[woof]'); ?>
  </aside>

  <div class="catalog-content">
    <div class="product-row">