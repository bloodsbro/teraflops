<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.4.0
 *
 * @var bool $readonly If the input should be set to readonly mode.
 * @var string $type The input type attribute.
 */

defined('ABSPATH') || exit;

/* translators: %s: Quantity. */
//$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'woocommerce' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'woocommerce' );

?>
  <!--<div class="quantity">-->
<?php
/**
 * Hook to output something before the quantity input field.
 *
 * @since 7.2.0
 */
//	do_action( 'woocommerce_before_quantity_input_field' );
?>
  <!--	<label class="screen-reader-text" for="--><?php //echo esc_attr( $input_id ); ?><!--">--><?php //echo esc_attr( $label ); ?><!--</label>-->
  <!--	<input-->
  <!--		type="--><?php //echo esc_attr( $type ); ?><!--"-->
  <!--		--><?php //echo $readonly ? 'readonly="readonly"' : ''; ?>
  <!--		id="--><?php //echo esc_attr( $input_id ); ?><!--"-->
  <!--		class="--><?php //echo esc_attr( join( ' ', (array) $classes ) ); ?><!--"-->
  <!--		name="--><?php //echo esc_attr( $input_name ); ?><!--"-->
  <!--		value="--><?php //echo esc_attr( $input_value ); ?><!--"-->
  <!--		title="--><?php //echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ); ?><!--"-->
  <!--		size="4"-->
  <!--		min="--><?php //echo esc_attr( $min_value ); ?><!--"-->
  <!--		max="--><?php //echo esc_attr( 0 < $max_value ? $max_value : '' ); ?><!--"-->
  <!--		--><?php //if ( ! $readonly ) : ?>
  <!--			step="--><?php //echo esc_attr( $step ); ?><!--"-->
  <!--			placeholder="--><?php //echo esc_attr( $placeholder ); ?><!--"-->
  <!--			inputmode="--><?php //echo esc_attr( $inputmode ); ?><!--"-->
  <!--			autocomplete="--><?php //echo esc_attr( isset( $autocomplete ) ? $autocomplete : 'on' ); ?><!--"-->
  <!--		--><?php //endif; ?>
  <!--	/>-->
<?php
/**
 * Hook to output something after quantity input field
 *
 * @since 3.6.0
 */
//	do_action( 'woocommerce_after_quantity_input_field' );
?>
  <!--</div>-->

<?php do_action('woocommerce_before_quantity_input_field'); ?>
  <div class="counter">
    <div class="minus">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28"
           height="28" viewBox="0 0 28 28">
        <defs>
          <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
            <stop offset="0" stop-color="#7e7eff"/>
            <stop offset="1" stop-color="#64c1ff"/>
          </linearGradient>
        </defs>
        <g id="Сгруппировать_2693" data-name="Сгруппировать 2693" transform="translate(-0.18)">
          <circle id="Эллипс_25" data-name="Эллипс 25" cx="14" cy="14" r="14" transform="translate(0.18)"
                  fill="url(#linear-gradient)"/>
          <g id="d531f85726de64c86416516d9654c026" transform="translate(7 14)">
            <path id="Контур_20647" data-name="Контур 20647" d="M1,8H15" transform="translate(-1 -8)"
                  fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  fill-rule="evenodd"/>
          </g>
        </g>
      </svg>
    </div>
    <input
        id="<?php echo esc_attr($input_id); ?>"
        class="<?php echo esc_attr(join(' ', (array)$classes)); ?>"
        readonly
        type="<?php echo esc_attr($type); ?>"
        name="<?php echo esc_attr($input_name); ?>"
        value="<?php echo esc_attr($input_value); ?>"
        min="<?php echo esc_attr($min_value); ?>"
        max="<?php echo esc_attr(0 < $max_value ? $max_value : ''); ?>"
        inputmode="<?php echo esc_attr($inputmode); ?>"
    />
    <div class="plus">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28"
           height="28" viewBox="0 0 28 28">
        <defs>
          <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
            <stop offset="0" stop-color="#7e7eff"/>
            <stop offset="1" stop-color="#64c1ff"/>
          </linearGradient>
        </defs>
        <g id="Сгруппировать_2692" data-name="Сгруппировать 2692" transform="translate(-0.18)">
          <circle id="Эллипс_25" data-name="Эллипс 25" cx="14" cy="14" r="14" transform="translate(0.18)"
                  fill="url(#linear-gradient)"/>
          <g id="d531f85726de64c86416516d9654c026" transform="translate(7 7)">
            <path id="Контур_20647" data-name="Контур 20647" d="M8,1V15M1,8H15" transform="translate(-1 -1)"
                  fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  fill-rule="evenodd"/>
          </g>
        </g>
      </svg>
    </div>
  </div>
<?php do_action('woocommerce_after_quantity_input_field'); ?>


<?php


