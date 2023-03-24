<?php
/*
Template Name: confirm-reset-password
Template Post Type: page
*/
?>
<?php get_header(); ?>
<section class="content">
    <div class="section section-top login-top reset-top">
        <div class="login-page section section-main">
          <h2 class="login-title">Reset your password</h2>

          <form class="login-form" action="submit">
            <div class="login-input__wrap">
              <label class="login-label" for="email">Email<span class="danger-text">*</span></label>
              <input id="email" type="text" class="login-input" />
            </div>

            <p class="login-reset__text confirm">
              Choose a new password. Make sure it's strong!
            </p>
            <div class="login-input__wrap">
              <label class="login-label" for="password">Password<span class="danger-text">*</span></label>
              <input id="password" type="password" class="login-input" />
            </div>
            <div class="login-input__wrap mb-0">
              <label class="login-label" for="confirmPassword">Confirm password<span class="danger-text">*</span></label>
              <input id="confirmPassword" type="password" class="login-input" />
            </div>
          </form>

          <ul class="confirm-credetials__list">
            <li class="confirm-credetials__item">- A minimum of 10 characters</li>
            <li class="confirm-credetials__item">- At least one lowercase letter</li>
            <li class="confirm-credetials__item">- At least one uppercase letter</li>
          </ul>

          <button class="login-button btn btn-gradient btn-main medium">Reset password</button>

          <div class="reset-footer">
          <h4 class="login-footer__title">
            <span>Know your password?</span>
            <a href="/login">Try logging In.</a>
          </h4>
        </div>
        </div>
    </div>
</section>
