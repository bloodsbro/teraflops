<?php
/*
Template Name: register
Template Post Type: page
*/
?>
<?php get_header(); ?>
<section class="content">
  <div class="section section-top login-top">
    <div class="login-page section section-main">
        <h2 class="login-title">Start tracking your purchases</h2>
        <form class="login-form grid-2" action="submit">
          <div class="login-input__wrap">
            <label class="login-label" for="email">Email<span class="danger-text">*</span></label>
            <input id="email" type="text" class="login-input" />
          </div>
          <div class="login-input__wrap">
            <label class="login-label" for="password"
              >Password<span class="danger-text">*</span></label
            >
            <input id="password" type="password" class="login-input" />
          </div>
          <div class="login-input__wrap">
            <label class="login-label" for="password"
              >Password<span class="danger-text">*</span></label
            >
            <input id="password" type="password" class="login-input" />
          </div>
          <div class="login-input__wrap">
            <label class="login-label" for="password"
              >Password<span class="danger-text">*</span></label
            >
            <input id="password" type="password" class="login-input" />
          </div>
        </form>

        <ul class="confirm-credetials__list register-credetials__list">
            <li class="confirm-credetials__item">- A minimum of 10 characters</li>
            <li class="confirm-credetials__item">- At least one lowercase letter</li>
            <li class="confirm-credetials__item">- At least one number</li>
            <li class="confirm-credetials__item">- At least one uppercase letter</li>
        </ul>

        <button class="login-button btn btn-gradient btn-main medium">Create account</button>

        <div class="login-social">
          <h3 class="login-social__title">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/login/line.svg" class="login-line">
            <span>Or sign in with</span>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/login/line.svg" class="login-line right">
          </h3>
          <ul class="login-social__list">
            <li class="login-social__item">
              <a href="#" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/login/fb-icon.svg" alt="fb">
              </a>
            </li>
            <li class="login-social__item">
              <a href="#" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/login/google-icon.svg" alt="google">
              </a>
            </li>
            <li class="login-social__item">
              <a href="#" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/login/apple-icon.svg" alt="apple">
              </a>
            </li>
          </ul>
        </div>

        <div class="login-footer">
          <h4 class="login-footer__title">
            <span>Have an account?</span>
            <a href="/login">Sign in</a>
          </h4>
        </div>
    </div>
  </div>
</section>
