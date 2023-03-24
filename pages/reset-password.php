<?php
/*
Template Name: reset-password
Template Post Type: page
*/
?>
<?php get_header(); ?>
<section class="content">
    <div class="section section-top login-top reset-top">
        <div class="login-page section section-main">
          <h2 class="login-title">Reset your password</h2>
        

          <p class="login-reset__text">
              Enter your email and we'll send you instructions on how to reset your password.
          </p>

          <form class="login-form reset-form" action="submit">
            <div class="login-input__wrap">
              <label class="login-label" for="email">Email<span class="danger-text">*</span></label>
              <input id="email" type="text" class="login-input" />
            </div>
          </form>

          <button class="login-button btn btn-gradient btn-main medium">Send instructions</button>

          <div class="reset-footer">
          <h4 class="login-footer__title">
            <span>Go back to</span>
            <a href="#">Login page</a>
          </h4>
        </div>
        </div>
    </div>
</section>
