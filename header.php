<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title>Teraflops</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width">
  <link rel="icon" href="<?php bloginfo('template_url'); ?>/assets/img/favicon.png">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<video muted="" loop="" preload="auto" autoplay=""
       poster="<?php bloginfo('template_url'); ?>/assets/img/main-poster.jpg">
  <source src="<?php bloginfo('template_url'); ?>/assets/video/main-video.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
<div class="content-envelope">
  <header>
    <a href="/" class="logo">
      <?php
      $logo = get_custom_logo();
      if($logo) echo $logo; else { ?>
      <img src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg" alt="">
      <?php } ?>
    </a>
    <?php wp_nav_menu(array(
      "menu" => "primary",
      "menu_class" => "main-nav",
      "container" => false,
    )); ?>
    <?php get_search_form() ?>
<!--    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart">-->
<!--      <svg id="Компонент_37_1" data-name="Компонент 37 – 1" xmlns="http://www.w3.org/2000/svg"-->
<!--           xmlns:xlink="http://www.w3.org/1999/xlink" width="26.833" height="26.833" viewBox="0 0 26.833 26.833">-->
<!--        <defs>-->
<!--          <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">-->
<!--            <stop offset="0" stop-color="#7e7eff"/>-->
<!--            <stop offset="1" stop-color="#64c1ff"/>-->
<!--          </linearGradient>-->
<!--        </defs>-->
<!--        <path id="Контур_7" data-name="Контур 7"-->
<!--              d="M10.05,25.466a2.683,2.683,0,1,0,2.683,2.683A2.671,2.671,0,0,0,10.05,25.466ZM2,4V6.683H4.683L9.507,16.86,7.7,20.147a2.728,2.728,0,0,0-.329,1.295,2.683,2.683,0,0,0,2.683,2.683h16.1V21.442H10.62a.332.332,0,0,1-.335-.335.319.319,0,0,1,.04-.161l1.2-2.187h10a2.692,2.692,0,0,0,2.348-1.382l4.8-8.707a1.3,1.3,0,0,0,.168-.644,1.342,1.342,0,0,0-1.342-1.342H7.655L6.381,4ZM23.466,25.466A2.683,2.683,0,1,0,26.15,28.15,2.671,2.671,0,0,0,23.466,25.466Z"-->
<!--              transform="translate(-2 -4)" fill="url(#linear-gradient)"/>-->
<!--      </svg>-->
<!--    </a>-->
    <?php echo do_shortcode('[woo-minicart]'); ?>
    <?php if(is_user_logged_in()): ?>
    <a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="user">
      <img src="<?php echo get_avatar_url(get_current_user_id()); ?>" alt="">
    </a>
    <?php endif; ?>
    <a href="#" class="menu-icon">
      <span>Меню</span>
    </a>
  </header>
  <div class="hamburger">
    <span class="line"></span>
    <span class="line"></span>
    <span class="line"></span>
  </div>
  <div class="left-menu">
    <ul class="left-menu__categories">
      <?php
      $args = array(
        'taxonomy' => 'product_cat',
      );
      $terms = get_terms($args);
      foreach ($terms as $term):
        ?>
        <li>
          <a href="<?php echo get_site_url() ?>/product-category/<?php echo $term->slug ?>/">
            <?php
            $file = get_template_directory_uri() . "/assets/img/terms/$term->slug.svg";
            ?>
            <?php echo file_get_contents($file); ?>
            <span><?php echo $term->name ?></span>
          </a>
        </li>
      <?php
      endforeach;
      ?>
    </ul>
  </div>
  <div class="mob-nav">
    <?php get_search_form(); ?>
    <?php wp_nav_menu(array(
      "menu" => "primary",
      "menu_class" => "main-nav",
      "container" => false,
    )); ?>
  </div>