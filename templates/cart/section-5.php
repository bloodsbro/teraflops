<div class="basket-envelope cart-step" data-id="5" style="display: none">
  <div class="basket-content">
<!--    --><?php //wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
<!--    <button type="submit" style="display: none" class="button" name="update_cart" value="--><?php //esc_attr_e( 'Update cart', 'woocommerce' ); ?><!--">--><?php //esc_html_e( 'Update cart', 'woocommerce' ); ?><!--</button>-->

    <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item): ?>
      <?php $product = $cart_item['data']; ?>
      <div class="basket-content__item">
        <div class="basket-content__top">
          <a href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ) ?>" class="remove-item">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/close-info.svg" alt="">
          </a>
          <div class="product-left">
            <div class="basket-item__img">
              <?php $source = wp_get_attachment_image_src(get_post_thumbnail_id($cart_item['product_id']), 'single-post-thumbnail') ?>
              <img src="<?php  echo $source[0]; ?>" data-id="<?php echo $cart_item['product_id']; ?>">
            </div>
            <p>
              <?php echo $product->get_name() ?>
            </p>
          </div>
          <div class="product-left">
            <span><?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($product), $cart_item, $cart_item_key); ?></span>
            <?php
//
//            if ($product->is_sold_individually()) {
//              $min_quantity = 1;
//              $max_quantity = 1;
//            } else {
//              $min_quantity = 0;
//              $max_quantity = $product->get_max_purchase_quantity();
//            }
//
//            $product_quantity = woocommerce_quantity_input(
//              array(
//                'input_name' => "cart[{$cart_item_key}][qty]",
//                'input_value' => $cart_item['quantity'],
//                'max_value' => $max_quantity,
//                'min_value' => $min_quantity,
//                'product_name' => $product->get_name(),
//              ),
//              $product,
//              false
//            );
//
//            echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
            ?>
            <a class="basket-item__dropdown" style="cursor:pointer;">
              <svg xmlns="http://www.w3.org/2000/svg" width="29" height="20" viewBox="0 0 29 20">
                <g id="Сгруппировать_2694" data-name="Сгруппировать 2694" transform="translate(-0.18)">
                  <rect id="Прямоугольник_126" data-name="Прямоугольник 126" width="29" height="20"
                        transform="translate(0.18)" fill="none"/>
                  <path id="Контур_20641" data-name="Контур 20641"
                        d="M-218.592-310.345h2.379l9.515,9.515,9.515-9.515h2.379L-206.7-298.451l-11.894-11.894"
                        transform="translate(221.592 314.345)" fill="#fff"/>
                </g>
              </svg>
            </a>
          </div>
        </div>
        <div class="basket-content__info">
          <div class="inner">
            <p>Характеристики:</p>
            <ul>
              <?php echo get_single_product_attributes_html($product, '<li>', '</li>', '<p>', '</p>', '<span>', '</span>'); ?>
            </ul>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <div class="confirmation-info">
      <div class="confirmation-info__item">
        <p>Контактна інформація</p>
        <ul>
          <li id="billing_first_name_output"><b id="billing_last_name_output"></b></li>
          <li id="billing_phone_output"></li>
          <li id="billing_email_output"></li>
        </ul>
      </div>
      <div class="confirmation-info__item">
        <p>Інформація про доставку</p>
        <ul>
          <li id="billing_delivery_type_output"></li>
          <li id="billing_delivery_company_output"></li>
          <li id="billing_address_1_output"></li>
          <li id="billing_address_2_output"></li>
          <li id="billing_postcode_output"></li>
        </ul>
      </div>
      <div class="confirmation-info__item">
        <p>Інформація про сплату</p>
        <ul>
          <li id="billing_payment_method_output"></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="basket-order">
    <p class="basket-order__title">
      Ваше замовлення
    </p>
    <ul>
      <li>
        <p>Товари (<?php echo WC()->cart->get_cart_contents_count() ?> шт.)</p>
        <span><?php wc_cart_totals_subtotal_html() ?></span>
      </li>
      <li>
        <p>Промо код</p>
        <span>Не застосованний</span>
      </li>
    </ul>
    <ul>
      <li>
        <p>Доставка</p>
        <span id="deliveryCost">loading<?php // wc_cart_totals_shipping_html() ?></span>
      </li>
      <li>
        <p>Усього</p>
        <span><?php wc_cart_totals_order_total_html() ?></span>
      </li>
    </ul>
    <label class="check">
      <input type="checkbox">
      <span class="checkmark"></span>
      Я даю згоду на обробку персональних даних,
      а також з умовами договору оферти.
    </label>
    <button type="submit" class="btn btn-orange">
      Замовити
    </button>
  </div>
</div>
