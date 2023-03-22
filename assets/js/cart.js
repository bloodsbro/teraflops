$(document).ready(function () {
  //product counter
  $('.plus').click(function () {
    let c = $(this).closest('.counter').find('input');
    const max = parseInt(c.attr('max'));
    const val = parseInt(c.val());

    if (val + 1 <= max) {
      c.val(val + 1);

      $(".qty").trigger("change");
      // $('button[name="update_cart"]').trigger("click");
      // $(document).trigger('wc_update_cart');
      reloadCart($(this).closest('form'));
    }
    return false;
  });
  $('.minus').click(function () {
    let c = $(this).closest('.counter').find('input');
    const min = parseInt(c.attr('min'));
    const val = parseInt(c.val());

    if (val - 1 >= min) {
      c.val(val - 1);

      $(".qty").trigger("change");
      // $('button[name="update_cart"]').trigger("click");
      // $(document).trigger('wc_update_cart');
      reloadCart($(this).closest('form'));
    }
    return false;
  });

  $('input[name="billing_delivery_type"]').change(function () {
    deliveryTypeChanged(this);
  });

  $('.checkout-next').click(function () {
    const checkoutPages = $('.cart-step');

    const page = parseInt($(this).data('page'));
    const nextPage = page + 1;

    if (!isNaN(nextPage)) {
      checkoutPages[page - 1].style.display = 'none';
      checkoutPages[nextPage - 1].style.display = '';

      const nav = $('.step-nav__text');
      for (let idx = 0; idx < 5; idx++) {
        if (page >= idx) {
          nav[idx].classList.add('active');
        } else {
          nav[idx].classList.remove('active');
        }
      }

      const form = $('.section-basket');
      if (nextPage > 1) {
        form.attr('action', form.data('action'));
        form.attr('name', form.data('name'));

        $('form[name="checkout"]').submit(function (e) {
          e.preventDefault();

          $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: form.serialize(),
          }).then(function (data) {
            $('body').html(data.replaceAll('`', '\\`'));
          });
        });
      } else {
        form.attr('action', form.data('action-init'));
        form.attr('name', form.data('name-init'));
      }

      checkoutReloadJS();
      location.hash = `page-${nextPage}`;

      if(nextPage >= 4) {
        const deliveryType = Number($('input[name="billing_delivery_type"]:checked').val());
        // 1 - Самовывоз
        // 2 - Почтовое отделение
        // 3 - Курьер

        $.ajax({
          url: myajax.url,
          method: 'post',
          dataType: 'json',
          data: {
            action: 'novapost_getPrice',
            weight: $('#cartTotalWeight').val(),
            city: $('#novapost_selectCity').val(),
            serviceType: deliveryType === 2 ? 'WarehouseWarehouse' : 'WarehouseDoors',
            cost: $('#cartTotalPrice').val(),
          }
        }).then((res) => {
          if (res.status === 'success') {
            const json = JSON.parse(res.data);
            $('#deliveryCost').text(`${json.Cost} ₴`);
          }
        });
      }

      if (nextPage === 5) {
        const deliveryType = Number($('input[name="billing_delivery_type"]:checked').val());
        // 1 - Самовывоз
        // 2 - Почтовое отделение
        // 3 - Курьер

        if (deliveryType === 1) {
          $('#deliveryCost').innerText = '0 ₴';
        }
      }
    }
  });

  $('#novapost_selectArea').change(function () {
    $.ajax({
      url: myajax.url,
      method: 'post',
      dataType: 'json',
      data: {
        action: 'novapost_getCities',
        area: $(this).val()
      }
    }).then((res) => {
      if (res.status === 'success') {
        const selector = $('#novapost_selectCity');
        selector.empty();

        const data = JSON.parse(res.data);
        selector.append(`<option value="0" selected>Оберіть місто чи село</option>`);
        data.forEach((el) => {
          selector.append(`<option value="${el.Ref}">${el.Description}</option>`);
        });
      }
    });
  });

  $('#novapost_selectCity').change(function () {
    const deliveryType = Number($('input[name="billing_delivery_type"]:checked').val());
    // 1 - Самовывоз
    // 2 - Почтовое отделение
    // 3 - Курьер

    deliveryTypeChanged(null);
    if (deliveryType !== 2) {
      return;
    }

    $.ajax({
      url: myajax.url,
      method: 'post',
      dataType: 'json',
      data: {
        action: 'novapost_getWarehouses',
        city: $(this).val()
      }
    }).then((res) => {
      if (res.status === 'success') {
        const selector = $('#novapost_selectWarehouse');
        selector.empty();

        const data = JSON.parse(res.data);
        selector.append(`<option value="0" selected>Оберіть відділення</option>`);
        data.forEach((el) => {
          selector.append(`<option value="${el.SiteKey}">${el.Description}</option>`);
        });
      }
    });
  });
});

function deliveryTypeChanged(el) {
  if (el !== null) {
    $('#billingSelectPost')[0].style.display = $(el).val() !== '1' ? 'block' : 'none';
    $('#billingOutPost')[0].style.display = $(el).val() !== '1' ? 'none' : 'block';
  }

  if ($('#novapost_selectCity').val() !== '0') {
    const deliveryType = Number($('input[name="billing_delivery_type"]:checked').val());
    const elem = $('#delivery_summary');
    elem.empty();

    if (deliveryType !== 2) {
      elem.append(`
<span>Адреса<i>*</i></span>
<input name="billing_postcode" class="form-control" type="text" placeholder="Введіть адресу" />
      `);
    } else {
      elem.append(`
<span>Відділення<i>*</i></span>
<select id="novapost_selectWarehouse" name="billing_postcode" class="form-control">
  <option value="0" selected>Оберіть відділення</option>
</select>
      `);
    }
  }
}

function reloadCart(form) {
  // $.ajax({
  //   type: "POST",
  //   url: form.attr('action'),
  //   data: form.serialize(),
  // }).then(function (data) {
  //   $('body').html(data.replaceAll('`', '\\`'));
  // });
  //
  form.submit();
}

function checkoutReloadJS() {
//basket item
  $('.basket-content__item').each(function () {
    var blockHeight = $(this).innerHeight();
    $(this).closest('.basket-content__item').find('.basket-content__info .inner').css('padding-top', blockHeight);
  });

  $('*[name^="billing_"]').each(function () {
    const el = $(this);
    const name = el.attr('name');

    if (name.indexOf('output') === -1) {
      const out_container = $(`#${name}_output`);
      if (out_container.length > 0) {
        switch (name) {
          case 'billing_delivery_type': {
            out_container[0].innerHTML = ['Не обрано', 'Самовивіз', 'Поштове відділення', 'Кур\'єр'][$(`input[name="${name}"]:checked`).val()];
            break;
          }
          case 'billing_delivery_company': {
            out_container[0].innerHTML = ['Не обрано', 'Нова Пошта', 'Укр Пошта'][$(`input[name="${name}"]:checked`).val()];
            break;
          }
          case 'billing_address_1':
          case 'billing_address_2':
          case 'billing_postcode': {
            const deliveryType = Number($('input[name="billing_delivery_type"]:checked').val());
            // 1 - Самовывоз
            // 2 - Почтовое отделение
            // 3 - Курьер

            if (deliveryType === 2) {
              out_container[0].innerHTML = $('option[value="' + el[0].value + '"]').text().trim();
            } else {
              out_container[0].innerHTML = el[0].value;
            }
            break;
          }
          default: {
            out_container[0].innerHTML = el[0].value;
            break;
          }
        }

        console.log(name, out_container[0].innerHTML);
      }
    }
  });
}

checkoutReloadJS();

$(window).on('resize', function () {
  $('.basket-content__item').each(function () {
    var blockHeight = $(this).innerHeight();
    console.log(blockHeight);
    $(this).closest('.basket-content__item').find('.basket-content__info .inner').css('padding-top', blockHeight);
  });
});

$('.basket-item__dropdown').click(function () {
  $(this).toggleClass('toggled');
  $(this).closest('.basket-content__item').toggleClass('active');
  $(this).closest('.basket-content__item').find('.basket-content__info').slideToggle();
});

