<?php
add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
  add_theme_support('woocommerce');
  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');
}

remove_action('woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20);
add_action('woocommerce_proceed_to_checkout', function () {
  echo '
  <a href="/checkout" class="btn btn-orange">
    Продовжити
  </a>
  ';
});

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open');
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash');
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail');
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title');
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price');
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating');
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close');
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

function get_product_cart_html($product)
{
  $cart = WC()->cart->generate_cart_id($product->get_id());
  if (WC()->cart->find_product_in_cart($cart)) {
    return '
      <a href="' . esc_url(wc_get_cart_remove_url($cart)) . '" class="btn btn-gradient">
          Видалити з кошика
      </a>';
  } else {
    return '
      <a href="' . esc_url($product->add_to_cart_url()) . '" data-product="' . $product->get_id() . '" class="btn btn-gradient add-product-cart">
        Додати у кошик
      </a>';
  }
}

function single_product_add_to_cart_html(): string
{
  global $product;
  $html = '';

  $cart = WC()->cart->generate_cart_id($product->get_id());
  if (WC()->cart->find_product_in_cart($cart)) {
    $html .= '
        <a href="/cart" class="btn btn-orange">
          Перейти до кошика
        </a>
  ';
  } else {
    $html .= '
        <a href="' . esc_url($product->add_to_cart_url()) . '" data-product="' . $product->get_id() . '" class="btn btn-orange add-product-cart">
          Додати у кошик
        </a>
  ';
  }

  return $html;
}

function get_rating_html($rating): string
{
  $html = '';

  for ($idx = 0; $idx < 5; $idx++) {
    $color = $rating >= $idx + 1 ? "#ffcf5a" : "none";
    $html .= '

    <li>
      <a href="' . esc_url(rating) . '">
        <svg xmlns="http://www.w3.org/2000/svg" width="20.502" height="19.567" viewBox="0 0 20.502 19.567">
          <path d="M10.214.441,12.53,5.1a.8.8,0,0,0,.6.437l5.185.749a.8.8,0,0,1,.528.307.769.769,0,0,1-.084,1.031L15,11.259a.76.76,0,0,0-.226.7l.9,5.128a.786.786,0,0,1-.652.892.862.862,0,0,1-.516-.08L9.888,15.478a.779.779,0,0,0-.742,0L4.494,17.912a.811.811,0,0,1-1.077-.33.792.792,0,0,1-.081-.5l.9-5.128a.787.787,0,0,0-.226-.7L.232,7.621a.786.786,0,0,1,0-1.115.91.91,0,0,1,.452-.223L5.87,5.534a.813.813,0,0,0,.6-.437L8.784.441a.784.784,0,0,1,.458-.4.8.8,0,0,1,.61.044A.817.817,0,0,1,10.214.441Z" transform="translate(0.75 0.755)" fill="' . $color . '" stroke="#ffcf5a" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd"></path>
        </svg>
      </a>
    </li>
    ';
  }

  return $html;
}

function get_product_html($product = null, $addClasses = ''): string
{
  if ($product == null) {
    global $product;
  }

  $secondImageUrl = get_field("hover-photo", $product->get_id()) ? get_field("hover-photo", $product->get_id())['url'] : '';

  return ('
      <a href="' . esc_url($product->get_permalink()) . '">
        <div class="product-col ' . $addClasses . '">
          <div class="product">
              <div class="product-img">
                ' . $product->get_image(array(186, 186)) . '
                <img class="hover-img" src="' . $secondImageUrl . '" alt="" width="186" height="186" />
              </div>
              <div class="product-body">
                  <p class="product-body__name">
                    ' . $product->get_formatted_name() . '
                  </p>
                  <div class="product-body__info">
                      <div class="product-body__description" style="height: 0px;">
                          <div class="description-inner">
                              <ul>
                                ' . get_rating_html($product->get_average_rating()) . '
                              </ul>
                              <p>
                                ' . get_the_excerpt($product) . '
                              </p>
                          </div>
                      </div>
                      <p class="product-body__price">
                        ' . $product->get_price_html() . '
                      </p>
                  </div>
                  <div class="product-body__bottom">
                      <a href="#">
                          <img src="' . get_template_directory_uri() . '/assets/img/fav-ico.svg" alt="">
                      </a>
                      ' . get_product_cart_html($product) . '
                  </div>
              </div>
          </div>
        </div>
      </a>
  ');
}

add_action('woocommerce_before_shop_loop_item', function () {
  echo get_product_html(null);
});

class iWC_Orderby_Stock_Status
{

  public function __construct()
  {
    // Check if WooCommerce is active
    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
      add_filter('posts_clauses', array($this, 'order_by_stock_status'), 2000);
    }
  }

  public function order_by_stock_status($posts_clauses)
  {
    global $wpdb;
    // only change query on WooCommerce loops
    if (is_woocommerce() && (is_shop() || is_product_category() || is_product_tag())) {
      $posts_clauses['join'] .= " INNER JOIN $wpdb->postmeta istockstatus ON ($wpdb->posts.ID = istockstatus.post_id) ";
      $posts_clauses['orderby'] = " istockstatus.meta_value ASC, " . $posts_clauses['orderby'];
      $posts_clauses['where'] = " AND istockstatus.meta_key = '_stock_status' AND istockstatus.meta_value <> '' " . $posts_clauses['where'];
    }
    return $posts_clauses;
  }
}

new iWC_Orderby_Stock_Status;


remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash');
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images');
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title');
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating');
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price');
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt');
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart');
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta');
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing');
remove_action('woocommerce_single_product_summary', 'WC_Structured_Data::generate_product_data');
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs');
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display');
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products');

function get_related_products_html(): string
{
  global $product;
  $related = wc_get_related_products($product->get_id(), 4);
  $html = '';

  if(count($related) > 0) {
    $html .= '<div class="product-also">
                  <p class="product-also__title">Схожі товари</p>
                  <div class="product-row">
              ';
    foreach ($related as $productId) {
      $html .= get_product_html(wc_get_product($productId));
    }

    $html .= '</div></div>';
  }

  return $html;
}

function get_single_product_photos_html(): string
{
  global $product;
  $html = '';
  $photos = get_field('product-photos', $product->get_id());
  if (!is_array($photos)) {
    $photos = array();
  }

  $source = wp_get_attachment_image_src(get_post_thumbnail_id($product->get_id()), 'full');
  array_unshift($photos, $source[0]);

  foreach ($photos as $url) {
    $html .= '
      <div class="swiper-slide">
        <img src="' . $url . '" alt="">
      </div>
    ';
  }

  return $html;
}

function get_single_product_attributes_html($product = null, $wrapStart = '<div class="char-col">', $wrapEnd = '</div>', $elemTag = '<p>', $elemTagEnd = '</p>', $elemTagValueStart = '<p>', $elemTagValueEnd = '</p>'): string
{
  if ($product == null) {
    global $product;
  }
  $html = '';

  $formatted_attributes = array('name' => '', 'value' => '');
  $attributes = $product->get_attributes();

  foreach ($attributes as $attr => $attr_deets) {
    $attribute_label = wc_attribute_label($attr);
    $formatted_attributes['name'] = urldecode($attribute_label);
    if (isset($attributes[$attr]) || isset($attributes['pa_' . $attr])) {
      $attribute = isset($attributes[$attr]) ? $attributes[$attr] : $attributes['pa_' . $attr];
      if ($attribute['is_taxonomy']) {
        $formatted_attributes['value'] = implode(', ', wc_get_product_terms($product->get_id(), $attribute['name'], array('fields' => 'names')));
      } else {
        $formatted_attributes['value'] = $attribute['value'];
      }
    }

    $html .=
      $wrapStart .
      $elemTag . $formatted_attributes['name'] . $elemTagEnd .
      $elemTagValueStart . $formatted_attributes['value'] . $elemTagValueEnd
      . $wrapEnd;
  }

  return $html;
}

function get_performance_pc_html(): string
{
  global $product;
  $html = '';

  $terms = get_the_terms($product->get_id(), 'product_cat');
  if ($terms) {
    foreach ($terms as $term) {
      if ($term->slug == 'computers') {
        if (have_rows('performance')) {
          $html .= '
          <div class="product-body__item">
            <p class="product-item__title">
                Швидкодія:
            </p>
          ';

          while (have_rows('performance')) {
            the_row();

            $img = get_sub_field('image');
            $name = get_sub_field('name');
            $fps = get_sub_field('fps');

            $html .= '
          <div class="product-item__performance">
              <div class="perf-img">
                  <img src="' . $img["url"] . '" alt="' . $img["alt"] . '">
              </div>
              <div class="perf-percent" style="width: calc(min(100%, '. $fps . '%) - 92px);">
                  <p>' . $name . '</p>
                  <span>' . $fps . ' FPS</span>
              </div>
          </div>
          ';
          }

          $html .= '</div>';
        }
      }
    }
  }

  return $html;
}

function get_single_product_html(): string
{
  global $product;
  return ('
        <div class="product-envelope">
          <div class="product-envelope__left">

              <!-- DUPLICATE -->
              <div class="product-headings mobile">
                  <div class="product-headings__name">
                      <p>' . $product->get_name() . '</p>
                      <div class="rating">
                          <p>' . $product->get_rating_count() . '</p>
                          <ul>
                              ' . get_rating_html($product->get_average_rating()) . '
                          </ul>
                      </div>
                  </div>
                  <div class="product-headings__detail">
                      <p>' . $product->get_price_html() . '</p>
                      <p>Монтаж: <img src="' . get_template_directory_uri() . '/assets/img/install-ico.svg" alt=""></p>
                      <p>Поділитися: <img src="' . get_template_directory_uri() . '/assets/img/share-ico.svg" alt=""></p>
                      <p><a href="/contacts" style="display: inherit">Питання: <img src="' . get_template_directory_uri() . '/assets/img/question-ico.svg" alt=""></a></p>
                      <p>ID: ' . $product->get_sku() . '</p>
                  </div>
              </div>
              <!-- DUPLICATE -->

              <div class="product-slider">
                  <div class="product-thumbs">
                      <div class="swiper-wrapper">
                        ' . get_single_product_photos_html() . '
                      </div>
                  </div>
                  <div class="product-main">
                      <div class="swiper-wrapper">
                          ' . get_single_product_photos_html() . '
                      </div>
                  </div>
                  <div class="swiper-pagination"></div>
              </div>
              ' . get_related_products_html() . '
          </div>
          <div class="product-envelope__right">
              <div class="product-headings">
                  <div class="product-headings__name">
                      <p>' . $product->get_name() . '</p>
                      <div class="rating">
                          <p>' . $product->get_rating_count() . '</p>
                          <ul>
                              ' . get_rating_html($product->get_average_rating()) . '
                          </ul>
                      </div>
                  </div>
                  <div class="product-headings__detail">
                      <p>' . $product->get_price_html() . '</p>
                      <p>Монтаж: <img src="' . get_template_directory_uri() . '/assets/img/install-ico.svg" alt=""></p>
                      <p>Поділитися: <img src="' . get_template_directory_uri() . '/assets/img/share-ico.svg" alt=""></p>
                      <p><a href="/contacts" style="display: inherit">Питання: <img src="' . get_template_directory_uri() . '/assets/img/question-ico.svg" alt=""></a></p>
                      <p>ID: ' . $product->get_sku() . '</p>
                  </div>
              </div>
              <div class="product-body">
                  <div class="product-body__characteristics">
                    ' . get_single_product_attributes_html() . '
                  </div>
                  <div class="default-content">
                     ' . get_the_content() . '
                  </div>
                  <div class="product-body__btns">
                      ' . single_product_add_to_cart_html() . '
                      ' . do_shortcode("[ti_wishlists_addtowishlist product_id='" . $product->get_id() . "' variation_id='0']") . '
                  </div>
                  ' . get_performance_pc_html() . '
                  <div class="product-body__item">
                      <p class="product-item__title">
                          З цим товаром також купують:
                      </p>
                      <div class="product-also__row">
                          <div class="product-also__col">
                              <div class="product">
                                  <div class="product-img">
                                      <img src="' . get_template_directory_uri() . '/assets/img/catalog-img1.png" alt="">
                                      <img src="' . get_template_directory_uri() . '/assets/img/img-hover.png" class="hover-img" alt="">
                                  </div>
                                  <div class="product-body">
                                      <p class="product-body__name">
                                          Maximum Gaming i9 13900KF RTX 4080 64Gb
                                      </p>
                                      <div class="product-body__info">
                                          <p class="product-body__price">
                                              161498 UAH
                                          </p>
                                      </div>
                                      <div class="product-body__bottom">
                                          <a href="#">
                                              <img src="' . get_template_directory_uri() . '/assets/img/fav-ico.svg" alt="">
                                          </a>
                                          <a href="" class="btn btn-gradient">
                                              Buy
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="product-also__col">
                              <div class="product">
                                  <div class="product-img">
                                      <img src="' . get_template_directory_uri() . '/assets/img/catalog-img1.png" alt="">
                                      <img src="' . get_template_directory_uri() . '/assets/img/img-hover.png" class="hover-img" alt="">
                                  </div>
                                  <div class="product-body">
                                      <p class="product-body__name">
                                          Maximum Gaming i9 13900KF RTX 4080 64Gb
                                      </p>
                                      <div class="product-body__info">
                                          <p class="product-body__price">
                                              161498 UAH
                                          </p>
                                      </div>
                                      <div class="product-body__bottom">
                                          <a href="#">
                                              <img src="' . get_template_directory_uri() . '/assets/img/fav-ico.svg" alt="">
                                          </a>
                                          <a href="" class="btn btn-gradient">
                                              Buy
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  ');
}

add_action('woocommerce_single_product_summary', function () {
  echo get_single_product_html();
});

add_filter('woocommerce_show_page_title', '__return_null');