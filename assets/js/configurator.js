$(document).ready(function () {
  $('#configurator-id').change(() => {
    location.hash = $('#configurator-id').val();
    configurator_set(null, null);
  });

  if(location.hash) {
    configurator_set(null, null);
  }

  $('#configurator-buy').click(async function () {
    let inputs = $('#configurator-form input[name]');
    for (let idx = 0; idx < inputs.length; idx++) {
      const product = Number($(inputs[idx]).data('product'));
      if (!isNaN(product)) {
        await addToCart(product);
      }
    }

    location.href = '/cart';
  });

  $('#configurator-wishlist').click(async function () {
    let inputs = $('#configurator-form input[name]');
    for (let idx = 0; idx < inputs.length; idx++) {
      const product = Number($(inputs[idx]).data('product'));
      if (!isNaN(product)) {
        await addToWishlist(product);
      }
    }

    location.href = '/wishlist';
  });
});

let socket_selected = '';
let socket_needed = '';

function configurator_update() {
  let price = 0;
  let inputs = $('#configurator-form input[name]');
  for (let idx = 0; idx < inputs.length; idx++) {
    const tryPrice = Number($(inputs[idx]).data('price'));
    if (!isNaN(tryPrice)) {
      price += tryPrice;
    }
  }
  $('#configurator-price').text(`${price} UAH`);
  $('#configurator-price-month').text(`${Math.ceil(price / window['divider-installments'])} UAH`);
}

function configurator_set(type, value, update = true) {
  console.log('configurator_set', type, value);
  if(type !== null) {
    const socket = value.extra;

    if (type === 'motherboard') {
      socket_needed = socket;

      if (socket_selected !== '' && socket_needed !== socket_selected) {
        $('input[name="processors"]').val('');
      }
    }

    if (type === 'processors') {
      socket_selected = socket;

      let list = $('#configurator-motherboard-list a');
      for (let idx = 0; idx < list.length; idx++) {
        $(list[idx])[0].style.display = $(list[idx]).data('extra') !== socket_selected ? 'none' : 'inherit';
      }

      if (socket_needed !== '' && socket_selected !== socket_needed) {
        const input = $('input[name="motherboard"]');
        input.val('');
        // TODO: remove .dropdown-text sel
      }
    }
  }

  if(update) {
    $.ajax({
      url: myajax.url,
      method: 'post',
      dataType: 'json',
      data: {
        action: 'configurator_update',
        category: type ? type : '',
        product: value ? value.product : '',
        nonce: myajax.nonce,
        config_id: location.hash ? location.hash.substr(1) : ''
      }
    }).then((res) => {
      if(res.status === 'success') {
        const data = JSON.parse(res.data);
        location.hash = data.config_id;
        $('#configurator-id').val(data.config_id);

        for (const [key, value] of Object.entries(data)) {
          if(data.hasOwnProperty(key)) {
            const input = $(`input[name="${key}"]`);
            const elem = $(`#configurator-${key}-list li>a[data-product="${value}"]`);
            const text = elem.text();

            input.val(text);
            input.data(elem.data());

            $(input).closest('.default-dropdown').find('.dropdown-text').text(text);

            configurator_set(key, value, false);
          }
        }

        configurator_update();
      }
      console.log(res, res.status, JSON.parse(res.data));
    }).catch((err) => {
      console.error(err);
    })
  }
}

