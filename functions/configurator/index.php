<?php

function get_configurator_product_html($category, $num): string
{
  $html = '';

  $query = new WP_Query(array(
    'posts_per_page' => -1,
    'post_type' => 'product',
    'post_status' => 'publish',
    'ignore_sticky_posts' => 1,
    'meta_key' => 'total_sales',
    'orderby' => 'title',
    'order' => 'DESC',
    'product_cat' => $category,
    'meta_query' => array(
      array(
        'key' => '_stock_status',
        'value' => 'instock'
      )
    )
  ));

  if ($query->have_posts()) :
    $lastTitle = '';
    while ($query->have_posts()) :
      $query->the_post();
      global $product;

      $title = $product->get_name();
      $arr = explode (' ', $title, $num + 2);
      $manufacturer = strtoupper($arr[$num]);
      $title = $arr[$num + 1];

      if($manufacturer !== $lastTitle) {
        $html .= "<p data-manufacturer-title='" . $manufacturer . "'>$manufacturer</p>";
        $lastTitle = $manufacturer;
      }

      $html .= "<li><a data-product='" . $product->get_id() . "' data-price='" . $product->get_price() . "' data-extra='" . $product->get_attribute('socket') . "'>" . $title . "</a></li>";
    endwhile;
    wp_reset_postdata();
  endif;

  return $html;
}