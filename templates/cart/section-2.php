<?php $currentUser = wp_get_current_user(); ?>

<div class="contact-step cart-step" data-id="2" style="display: none">
  <input type="hidden" name="billing_country" class="form-control" value="UA">

  <div class="switcher-wrapper main">
    <label class="switch">
      <input class="switch__input" type="checkbox">
      <i class="switch__icon"></i>
      <span class="switch__span first active">Фізична особа</span>
      <span class="switch__span second">Юридична особа</span>
    </label>
  </div>
  <div class="entity entity-first active fade show form">
    <div class="form-group-wrapper">
      <div class="form-group">
        <span>Ім'я<i>*</i></span>
        <input type="text" name="billing_first_name" class="form-control" value="<?php echo $currentUser->first_name ?>">
      </div>
    </div>
    <div class="form-group-wrapper">
      <div class="form-group">
        <span>Прізвище<i>*</i></span>
        <input type="text" name="billing_last_name" class="form-control" value="<?php echo $currentUser->last_name ?>">
      </div>
    </div>
    <div class="form-group-wrapper">
      <div class="form-group">
        <span>E-Mail<i>*</i></span>
        <input type="email" name="billing_email" class="form-control" value="<?php echo $currentUser->user_email ?>">
      </div>
    </div>
    <div class="form-group-wrapper">
      <div class="form-group">
        <span>Телефон або месенджер<i>*</i></span>
        <input type="tel" name="billing_phone" class="form-control">
      </div>
    </div>
    <button type="button" class="btn btn-orange checkout-next" data-page="2">
      Продовжити
    </button>
  </div>
<!--  <div class="entity entity-second fade form">-->
<!--    <div class="form-group-wrapper">-->
<!--      <div class="form-group">-->
<!--        <span>ІПН<i>*</i></span>-->
<!--        <input type="text" name="name" class="form-control">-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="form-group-wrapper">-->
<!--      <div class="form-group">-->
<!--        <span>Ім'я контактної особи<i>*</i></span>-->
<!--        <input type="text" name="surname" class="form-control" value="--><?php //echo $currentUser->display_name ?><!--">-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="form-group-wrapper">-->
<!--      <div class="form-group">-->
<!--        <span>Розрахунковий рахунок<i>*</i></span>-->
<!--        <input type="email" name="email" class="form-control">-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="form-group-wrapper">-->
<!--      <div class="form-group">-->
<!--        <span>Назва організації<i>*</i></span>-->
<!--        <input type="text" name="billing_company" class="form-control">-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="form-group-wrapper">-->
<!--      <div class="form-group">-->
<!--        <span>E-Mail<i>*</i></span>-->
<!--        <input type="email" name="billing_email" class="form-control" value="--><?php //echo $currentUser->user_email ?><!--">-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="form-group-wrapper">-->
<!--      <div class="form-group">-->
<!--        <span>Телефон або месенджер<i>*</i></span>-->
<!--        <input type="tel" name="billing_phone" class="form-control">-->
<!--      </div>-->
<!--    </div>-->
<!--    <button type="button" class="btn btn-orange checkout-next" data-page="2">-->
<!--      Продовжити-->
<!--    </button>-->
<!--  </div>-->
</div>