<?php
/*
Template Name: contacts
Template Post Type: page
*/
?>
<?php get_header(); ?>
<section class="content" id="content">
  <div class="section section-contacts">
    <div class="wrapper">
      <p class="inner-title">
        Contacts
      </p>
      <div class="contacts-envelope">
        <div class="contacts-envelope__left">
          <form class="form" method="post">
            <?php echo do_shortcode('[contact-form-7 id="133" title="Контактна форма"]') ?>
          </form>
        </div>
        <div class="contacts-envelope__right">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer(); ?>
</section>

