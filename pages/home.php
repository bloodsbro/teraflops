<?php
/*
Template Name: home
Template Post Type: post, page, product
*/
?>
<?php get_header(); ?>
<section class="content" id="content">
  <div class="section section-main">
    <div class="top-screen">
      <img src="<?php bloginfo('template_url'); ?>/assets/img/main-screen-img.jpg" alt="">

      <div class="top-screen__nav">
        <?php if (!is_user_logged_in()): ?>
          <a href="<?php echo esc_url(wp_login_url()); ?>" class="btn btn-blue">
            Авторизація
          </a>
        <?php else: ?>
          <a href="<?php echo wc_get_page_permalink('myaccount'); ?>" class="btn btn-blue">
            <?php echo wp_get_current_user()->first_name ?>
          </a>
        <?php endif; ?>
        <div>
          <?php
          if (is_user_logged_in()) {
            ?>
            <img class="user" src="<?php echo get_avatar_url(get_current_user_id()); ?>" alt="">
            <?php
          } else {
            ?>
            <img src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg" alt="">
            <?php
          } ?>
        </div>
        <?php if (!is_user_logged_in()): ?>
          <a href="<?php echo esc_url(wp_registration_url()); ?>" class="btn btn-gradient">
            Реєстрація
          </a>
        <?php else: ?>
          <a href="<?php echo esc_url(wp_logout_url()); ?>" class="btn btn-gradient">
            Вихід
          </a>
        <?php endif; ?>
      </div>
    </div>
    <h1>Коли комп'ютер - це мистецтво!</h1>
    <div class="description">
      Інтернет-магазин Tera Flops займається продажем комплектуючих для ПК, обслуговуванням комп'ютерів, а також
      самостійним продажем вживаних комплектуючих.
    </div>
    <a href="/contacts" class="btn btn-gradient btn-main">
      Зв'яжіться з нами
    </a>
  </div>
  <div class="section section-top">
    <p class="section-title">
      Наш топ
    </p>
    <div class="product-slider swiper">
      <div class="product-row swiper-wrapper">
        <?php
        $query = new WP_Query(array(
          'posts_per_page' => 3,
          'post_type' => 'product',
          'post_status' => 'publish',
          'ignore_sticky_posts' => 1,
          'meta_key' => 'total_sales',
          'orderby' => 'meta_value_num',
          'order' => 'DESC',
          'meta_query' => array(
            array(
              'key' => '_stock_status',
              'value' => 'instock'
            )
          )
        ));

        if ($query->have_posts()) :
          while ($query->have_posts()) :
            $query->the_post();
            global $product;

            echo get_product_html(null, 'swiper-slide');
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
  <div class="section section-cases">
    <p class="section-title">
      Наші кейси
    </p>
    <div class="case-slider swiper">
      <div class="swiper-wrapper">

        <?php
        $myposts = get_posts([
          'numberposts' => -1,
          'category_name' => 'Слайдер'
        ]);

        if ($myposts) {
          foreach ($myposts as $post) {
            setup_postdata($post);
            ?>
            <div class="swiper-slide">
              <div class="case-img">
                <?php the_post_thumbnail(
                  array(362, 201),
                ); ?>
              </div>
              <div class="case-description">
                <div class="case-description__head">
                  <p><?php the_title(); ?></p>
                  <a href="<?php the_permalink() ?>" class="btn btn-gradient"
                     title="Ссылка на: <?php the_title_attribute(); ?>">
                    Читати
                  </a>
                </div>
                <div class="case-description__body">
                  <p><?php the_excerpt(); ?></p>
                </div>
              </div>
            </div>
            <?php
          }
        }

        wp_reset_postdata();

        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
  <div class="section section-news">
    <p class="section-title">
      Наші новини
    </p>
    <div class="news-slider swiper">
      <div class="swiper-wrapper">
        <?php
        $myposts = get_posts([
          'numberposts' => -1,
          'category_name' => 'news'
        ]);

        if ($myposts) {
          foreach ($myposts as $post) {
            setup_postdata($post);
            ?>
            <a href="<?php the_permalink() ?>" class="swiper-slide" title="Ссылка на: <?php the_title_attribute(); ?>">
              <div class="news-img">
                <?php the_post_thumbnail(
                  array(357, 385),
                ); ?>
              </div>
              <div class="news-info">
                <p class="news-info__title">
                  <?php the_title(); ?>
                </p>
                <div class="news-info__description">
                  <p><?php the_excerpt(); ?></p>
                </div>
              </div>
            </a>
            <?php
          }
        }

        wp_reset_postdata();

        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
  <?php get_footer() ?>
</section>