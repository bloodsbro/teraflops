<div class="delivery-step cart-step" data-id="3" style="display: none">
  <div class="radio-row">
    <ul>
      <?php the_field('delivery-type') ?>
      <li>
        <label class="radio">
          <input type="radio" name="billing_delivery_type" value="1">
          <span class="checkmark"></span>
          Самовивіз
        </label>
      </li>
      <li>
        <label class="radio">
          <input type="radio" name="billing_delivery_type" value="2">
          <span class="checkmark"></span>
          Поштове відділення
        </label>
      </li>
      <li>
        <label class="radio">
          <input type="radio" name="billing_delivery_type" value="3">
          <span class="checkmark"></span>
          Кур'єр.
        </label>
      </li>
    </ul>
  </div>
  <section id="billingOutPost" style="display: none; text-align: center">
    Київ, адреса самомвивизу, д23
  </section>
  <section id="billingSelectPost" style="display: none">
    <div class="delivery-row">
      <label class="radio-large">
        <input type="radio" name="billing_delivery_company" value="1">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/del1.png" alt="">
      </label>
      <p>Або</p>
      <label class="radio-large">
        <input type="radio" name="billing_delivery_company" value="2">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/del2.png" alt="">
      </label>
    </div>
    <div class="form">
      <div class="form-group-wrapper">
        <div class="form-group">
          <span>Область<i>*</i></span>
          <select id="novapost_selectArea" name="billing_address_1" class="form-control">
            <option value="0" selected>Оберіть область</option>
            <?php foreach(getAreas() as $area): ?>
            <option value="<?php echo $area->Ref ?>">
              <?php echo $area->Description; ?>
            </option>
            <?php endforeach; ?>
          </select>

          <span>Місто чи село<i>*</i></span>
          <select id="novapost_selectCity" name="billing_address_2" class="form-control">
            <option value="0" selected>Спочатку оберіть область</option>
          </select>

          <section id="delivery_summary">

          </section>

<!--          <input type="hidden" name="billing_address_2" class="form-control" value="">-->
<!--          <input type="hidden" name="billing_city" class="form-control" value="Запоріжжя">-->
<!--          <input type="hidden" name="billing_state" class="form-control" value="UA30">-->
<!--          <input type="hidden" name="billing_postcode" class="form-control" value="69067">-->

          <input type="hidden" name="shipping_method[0]" value="free_shipping:1" class="shipping_method" />
          <input type="hidden" name="payment_method" value="bacs" class="payment_method" />
        </div>
      </div>
      <button type="button" class="btn btn-orange checkout-next" data-page="3">
        Продовжити
      </button>
    </div>
  </section>
</div>
