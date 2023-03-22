<?php
/*
Template Name: configurator
Template Post Type: page
*/
?>
<?php get_header(); ?>
<script>
  window['divider-installments'] = <?php echo get_field('divider-installments'); ?>
</script>
<section class="content" id="content">
  <div class="section section-about section-content">
    <div class="wrapper">
      <p class="inner-title">
        Конфігуратор
      </p>
      <div class="default-content">
        <?php the_content(); ?>
      </div>
    </div>
    <form class="configurator-envelope" id="configurator-form">
      <div class="wrapper">
        <div class="configurator-left">
          <div class="configurator-item">
            <p>Процесор</p>
            <div class="configurator-item__img">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/c1.svg" alt="">
            </div>
          </div>
          <div class="configurator-item">
            <p>Охолодження</p>
            <div class="configurator-item__img">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/c2.svg" alt="">
            </div>
          </div>
          <div class="configurator-item">
            <p>Материнська плата</p>
            <div class="configurator-item__img">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/c3.svg" alt="">
            </div>
          </div>
          <div class="configurator-item">
            <p>Оперативна пам'ять</p>
            <div class="configurator-item__img">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/c4.svg" alt="">
            </div>
          </div>
          <div class="configurator-item">
            <p>Відеокарта</p>
            <div class="configurator-item__img">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/c5.svg" alt="">
            </div>
          </div>
          <div class="configurator-item">
            <p>Жорсткий диск</p>
            <div class="configurator-item__img">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/c6.svg" alt="">
            </div>
          </div>
          <div class="configurator-item">
            <p>Твердотільний накопичувач</p>
            <div class="configurator-item__img">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/c7.svg" alt="">
            </div>
          </div>
          <div class="configurator-item">
            <p>DVD-привід</p>
            <div class="configurator-item__img">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/c8.svg" alt="">
            </div>
          </div>
          <div class="configurator-item">
            <p>Корпус для ПК</p>
            <div class="configurator-item__img">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/c9.svg" alt="">
            </div>
          </div>
          <div class="configurator-item">
            <p>Блок живлення</p>
            <div class="configurator-item__img">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/c10.svg" alt="">
            </div>
          </div>
          <div class="configurator-item">
            <p>Звукова карта</p>
            <div class="configurator-item__img">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/c11.svg" alt="">
            </div>
          </div>
          <div class="configurator-item">
            <p>Миша</p>
            <div class="configurator-item__img">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/c12.svg" alt="">
            </div>
          </div>
          <div class="configurator-item">
            <p>Клавіатура</p>
            <div class="configurator-item__img">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/c13.svg" alt="">
            </div>
          </div>
          <div class="configurator-item">
            <p>Монітор</p>
            <div class="configurator-item__img">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/c14.svg" alt="">
            </div>
          </div>
          <div class="configurator-item">
            <p>Гарнітура</p>
            <div class="configurator-item__img">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/c15.svg" alt="">
            </div>
          </div>
        </div>
        <div class="configurator-middle">
          <?php while(have_rows('fileds')): the_row() ?>
          <div class="configurator-middle__item">
            <p>
              <?php echo get_sub_field('name') ?>
            </p>
            <div class="default-dropdown">
              <input type="hidden" name="<?php echo get_sub_field('category') ?>">
              <div class="dropdown-inner">
                <span class="dropdown-text">
                  Не обрано
                </span>
                <div class="dropdown-content">
                  <div class="content-overflow">
                    <div class="content-inner">
                      <ul id="configurator-<?php echo get_sub_field('category') ?>-list">
                        <?php echo get_configurator_product_html(get_sub_field('category'), get_sub_field('category-worlds')); ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="configurator-middle__img">
              <img src="<?php echo get_sub_field('photo') ?>" alt="">
            </div>
          </div>
          <?php endwhile; ?>
        </div>
        <div class="configurator-right">
          <a href="#" class="detail-btn">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/detail-ico.svg" alt="">
          </a>
          <div class="form-group-wrapper">
            <div class="form-group">
              <span>Пошук конфігурації за номером</span>
              <input id="configurator-id" class="form-control">
            </div>
          </div>
          <div class="conf-main-img">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/conf-img.svg" alt="">
          </div>
          <div class="conf-product-price">
            <div class="left-side">
              <p id="configurator-price">0 UAH</p>
              <span>
                <span id="configurator-price-month">0 UAH</span>/в місяць
                <img src="<?php bloginfo('template_url'); ?>/assets/img/tooltip-ico.svg" alt="">
             </span>
            </div>
            <a href="#" class="delete">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/trash-ico.svg" alt="">
            </a>
          </div>
          <div class="configurator-bottom">
            <a id="configurator-buy" class="btn btn-orange">
              Купити зараз
            </a>
            <a id="configurator-wishlist" class="btn btn-gradient">
              У бажане
              <img src="<?php bloginfo('template_url'); ?>/assets/img/fav-img-btn.svg" alt="">
            </a>
          </div>
          <div class="configurator-detail-info">
            <a href="#" class="close">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/close-info.svg" alt="">
            </a>
            <p>Основні рекомендації для конфігуратора</p>
            <div class="default-content">
              <p>Наші фахівці пропонують почати збірку системного блоку з вибору процесора (CPU). Для цього в
                конфігуратор вбудований
                в конфігуратор інтегрований модуль онлайн перевірки сумісності компонентів. Тому, визначившись з
                процесором
                визначившись з процесором, вам будуть запропоновані тільки сумісні з ним комплектуючі. Це значно
                спростить і прискорить процес складання.</p>
              <p>Розглянемо ще один приклад, ви перейшли в конфігуратор з каталогу або картки товару, в цьому
                випадку, всі встановлені елементи в конфігурації автозаповнюються. Ви хочете вибрати іншу
                материнську плату або процесор з іншим сокетом, але не знайшли його в доступному списку. У цьому
                випадку слід вийняти і процесор, і материнську плату, вибрати вузол, який вас цікавить
                (бажано процесор) і програма залишить тільки сумісні з ним компоненти.</p>
              <p>Ви зібрали комп'ютер, але все одно хочете дізнатися думку фахівця - не проблема. Зробіть дзвінок
                дзвінок на безкоштовний номер +38 800 354 12 кнопка конфігурації, у вікні, що відкрилося, скопіюйте
                номер конфігурації і скажіть його менеджеру, ваша збірка стане доступною для нього.</p>
              <p>Також для вас ми підібрали ряд рекомендованих конфігурацій, збалансованих за ціною та
                продуктивності встановлених елементів.</p>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <?php get_footer(); ?>
</section>

