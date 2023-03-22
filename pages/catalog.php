<?php
/*
Template Name: catalog
Template Post Type: page
*/
?>
<?php get_header(); ?>
<section class="content" id="content">
  <div class="section section-catalog section-content">
    <div class="wrapper">
      <ul class="breadcrumbs">
        <?php woocommerce_breadcrumb(); ?>
      </ul>
      <div class="catalog-envelope">
        <div class="mob-filter-btn btn btn-gradient">
          <img src="<?php bloginfo('template_url'); ?>/assets/img/filter-ico.svg" alt="">
          Фільтер
        </div>
        <aside>
          <?php echo do_shortcode('[yith_wcan_filters slug="default-preset"]'); ?>
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
          <div class="aside-item">
            <div class="default-dropdown">
              <div class="dropdown-inner">
                <div class="check dropdown-text">
                  <input type="checkbox" checked>
                  <i>Processor</i>
                  <span class="checkmark"></span>
                  <small>12345</small>
                </div>
                <div class="dropdown-content">
                  <label class="check">
                    <input type="checkbox">
                    <i>Processor</i>
                    <span class="checkmark"></span>
                    <small>12345</small>
                  </label>
                  <label class="check">
                    <input type="checkbox">
                    <i>Processor</i>
                    <span class="checkmark"></span>
                    <small>12345</small>
                  </label>
                  <label class="check">
                    <input type="checkbox">
                    <i>Processor</i>
                    <span class="checkmark"></span>
                    <small>12345</small>
                  </label>
                  <label class="check">
                    <input type="checkbox">
                    <i>Processor</i>
                    <span class="checkmark"></span>
                    <small>12345</small>
                  </label>
                  <label class="check">
                    <input type="checkbox">
                    <i>Processor</i>
                    <span class="checkmark"></span>
                    <small>12345</small>
                  </label>
                  <label class="check">
                    <input type="checkbox">
                    <i>Processor</i>
                    <span class="checkmark"></span>
                    <small>12345</small>
                  </label>
                  <label class="check">
                    <input type="checkbox">
                    <i>Processor</i>
                    <span class="checkmark"></span>
                    <small>12345</small>
                  </label>
                  <label class="check">
                    <input type="checkbox">
                    <i>Processor</i>
                    <span class="checkmark"></span>
                    <small>12345</small>
                  </label>
                </div>
              </div>
            </div>
          </div>
        </aside>
        <div class="catalog-content">
          <?php echo do_shortcode('[products limit="12" paginate="true"]'); ?>
<!--          <div class="product-row">-->
<!--            --><?php
//            $args = array(
//              'post_type'      => 'product',
//              'posts_per_page' => 10
//            );
//
//            $loop = new WP_Query( $args );
//
//            while ( $loop->have_posts() ) : $loop->the_post();
//              global $product;
//              ?>
<!--              <div class="product-col">-->
<!--                <div class="product" data-url="--><?php //echo get_permalink() ?><!--">-->
<!--                  <div class="product-img">-->
<!--                    --><?php //woocommerce_get_product_thumbnail() ?>
<!--                    <img src="--><?php //bloginfo('template_url'); ?><!--/assets/img/img-hover.png" class="hover-img" alt="">-->
<!--                  </div>-->
<!--                  <div class="product-body">-->
<!--                    <p class="product-body__name">-->
<!--                      --><?php //echo get_the_title() ?>
<!--                    </p>-->
<!--                    <div class="product-body__info">-->
<!--                      <div class="product-body__description" style="height: 0px;">-->
<!--                        <div class="description-inner">-->
<!--                          <ul>-->
<!--                            <li>-->
<!--                              <a href="#">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="20.502" height="19.567"-->
<!--                                     viewBox="0 0 20.502 19.567">-->
<!--                                  <path id="Контур_20636" data-name="Контур 20636"-->
<!--                                        d="M10.214.441,12.53,5.1a.8.8,0,0,0,.6.437l5.185.749a.8.8,0,0,1,.528.307.769.769,0,0,1-.084,1.031L15,11.259a.76.76,0,0,0-.226.7l.9,5.128a.786.786,0,0,1-.652.892.862.862,0,0,1-.516-.08L9.888,15.478a.779.779,0,0,0-.742,0L4.494,17.912a.811.811,0,0,1-1.077-.33.792.792,0,0,1-.081-.5l.9-5.128a.787.787,0,0,0-.226-.7L.232,7.621a.786.786,0,0,1,0-1.115.91.91,0,0,1,.452-.223L5.87,5.534a.813.813,0,0,0,.6-.437L8.784.441a.784.784,0,0,1,.458-.4.8.8,0,0,1,.61.044A.817.817,0,0,1,10.214.441Z"-->
<!--                                        transform="translate(0.75 0.755)" fill="#ffcf5a" stroke="#ffcf5a"-->
<!--                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"-->
<!--                                        fill-rule="evenodd"></path>-->
<!--                                </svg>-->
<!--                              </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                              <a href="#">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="20.502" height="19.567"-->
<!--                                     viewBox="0 0 20.502 19.567">-->
<!--                                  <path id="Контур_20636" data-name="Контур 20636"-->
<!--                                        d="M10.214.441,12.53,5.1a.8.8,0,0,0,.6.437l5.185.749a.8.8,0,0,1,.528.307.769.769,0,0,1-.084,1.031L15,11.259a.76.76,0,0,0-.226.7l.9,5.128a.786.786,0,0,1-.652.892.862.862,0,0,1-.516-.08L9.888,15.478a.779.779,0,0,0-.742,0L4.494,17.912a.811.811,0,0,1-1.077-.33.792.792,0,0,1-.081-.5l.9-5.128a.787.787,0,0,0-.226-.7L.232,7.621a.786.786,0,0,1,0-1.115.91.91,0,0,1,.452-.223L5.87,5.534a.813.813,0,0,0,.6-.437L8.784.441a.784.784,0,0,1,.458-.4.8.8,0,0,1,.61.044A.817.817,0,0,1,10.214.441Z"-->
<!--                                        transform="translate(0.75 0.755)" fill="#ffcf5a" stroke="#ffcf5a"-->
<!--                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"-->
<!--                                        fill-rule="evenodd"></path>-->
<!--                                </svg>-->
<!--                              </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                              <a href="#">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="20.502" height="19.567"-->
<!--                                     viewBox="0 0 20.502 19.567">-->
<!--                                  <path id="Контур_20636" data-name="Контур 20636"-->
<!--                                        d="M10.214.441,12.53,5.1a.8.8,0,0,0,.6.437l5.185.749a.8.8,0,0,1,.528.307.769.769,0,0,1-.084,1.031L15,11.259a.76.76,0,0,0-.226.7l.9,5.128a.786.786,0,0,1-.652.892.862.862,0,0,1-.516-.08L9.888,15.478a.779.779,0,0,0-.742,0L4.494,17.912a.811.811,0,0,1-1.077-.33.792.792,0,0,1-.081-.5l.9-5.128a.787.787,0,0,0-.226-.7L.232,7.621a.786.786,0,0,1,0-1.115.91.91,0,0,1,.452-.223L5.87,5.534a.813.813,0,0,0,.6-.437L8.784.441a.784.784,0,0,1,.458-.4.8.8,0,0,1,.61.044A.817.817,0,0,1,10.214.441Z"-->
<!--                                        transform="translate(0.75 0.755)" fill="#ffcf5a" stroke="#ffcf5a"-->
<!--                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"-->
<!--                                        fill-rule="evenodd"></path>-->
<!--                                </svg>-->
<!--                              </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                              <a href="#">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="20.502" height="19.567"-->
<!--                                     viewBox="0 0 20.502 19.567">-->
<!--                                  <path id="Контур_20636" data-name="Контур 20636"-->
<!--                                        d="M10.214.441,12.53,5.1a.8.8,0,0,0,.6.437l5.185.749a.8.8,0,0,1,.528.307.769.769,0,0,1-.084,1.031L15,11.259a.76.76,0,0,0-.226.7l.9,5.128a.786.786,0,0,1-.652.892.862.862,0,0,1-.516-.08L9.888,15.478a.779.779,0,0,0-.742,0L4.494,17.912a.811.811,0,0,1-1.077-.33.792.792,0,0,1-.081-.5l.9-5.128a.787.787,0,0,0-.226-.7L.232,7.621a.786.786,0,0,1,0-1.115.91.91,0,0,1,.452-.223L5.87,5.534a.813.813,0,0,0,.6-.437L8.784.441a.784.784,0,0,1,.458-.4.8.8,0,0,1,.61.044A.817.817,0,0,1,10.214.441Z"-->
<!--                                        transform="translate(0.75 0.755)" fill="#ffcf5a" stroke="#ffcf5a"-->
<!--                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"-->
<!--                                        fill-rule="evenodd"></path>-->
<!--                                </svg>-->
<!--                              </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                              <a href="#">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="20.502" height="19.567"-->
<!--                                     viewBox="0 0 20.502 19.567">-->
<!--                                  <path id="Контур_20640" data-name="Контур 20640"-->
<!--                                        d="M10.214.441,12.53,5.1a.8.8,0,0,0,.6.437l5.185.749a.8.8,0,0,1,.528.307.769.769,0,0,1-.084,1.031L15,11.259a.76.76,0,0,0-.226.7l.9,5.128a.786.786,0,0,1-.652.892.862.862,0,0,1-.516-.08L9.888,15.478a.779.779,0,0,0-.742,0L4.494,17.912a.811.811,0,0,1-1.077-.33.792.792,0,0,1-.081-.5l.9-5.128a.787.787,0,0,0-.226-.7L.232,7.621a.786.786,0,0,1,0-1.115.91.91,0,0,1,.452-.223L5.87,5.534a.813.813,0,0,0,.6-.437L8.784.441a.784.784,0,0,1,.458-.4.8.8,0,0,1,.61.044A.817.817,0,0,1,10.214.441Z"-->
<!--                                        transform="translate(0.75 0.755)" fill="none" stroke="#ffcf5a"-->
<!--                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"-->
<!--                                        fill-rule="evenodd"></path>-->
<!--                                </svg>-->
<!--                              </a>-->
<!--                            </li>-->
<!--                          </ul>-->
<!--                          <p>-->
<!--                            --><?php //the_content(); ?>
<!--                          </p>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      <p class="product-body__price">-->
<!--                        --><?php //woocommerce_template_single_price() ?><!-- UAH-->
<!--                      </p>-->
<!--                    </div>-->
<!--                    <div class="product-body__bottom">-->
<!--                      <a href="#">-->
<!--                        <img src="--><?php //bloginfo('template_url'); ?><!--/assets/img/fav-ico.svg" alt="">-->
<!--                      </a>-->
<!--                      <a href="" class="btn btn-gradient">-->
<!--                        Buy-->
<!--                      </a>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            --><?php
//            endwhile;
//
//            wp_reset_query();
//            ?>
<!--          </div>-->
          <div class="catalog-pagination">
            <p>
              1-12 of 48
              <a href="#">8 more products</a>
            </p>
            <a href="#">Open all</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer() ?>
</section>