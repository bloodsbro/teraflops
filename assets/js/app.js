$(document).ready(function () {

  //hamburger
  $('.hamburger').click(function () {
    $(this).toggleClass('is-active');
    $('.left-menu').toggleClass('opened');
    $('body').toggleClass('hidden');
    $('.mob-nav').removeClass('opened');
  });
  $('.menu-icon').click(function () {
    $('.mob-nav').toggleClass('opened');
    $('.left-menu').removeClass('opened');
    $('.hamburger').removeClass('is-active');
  });

  //product
  $('.product').on('mouseenter', function () {
    var descrHeight = $(this).find('.description-inner').outerHeight();
    $(this).find('.product-body__description').css('height', descrHeight);
  });
  $('.product').on('mouseleave', function () {
    $(this).find('.product-body__description').css('height', '0');
  });

  //fix scroll position
  $('.content').scroll(function () {
    sessionStorage.scrollTop = $(this).scrollTop();
  });
  if (sessionStorage.scrollTop != "undefined") {
    $('.content').scrollTop(sessionStorage.scrollTop);
  }

  //contact info
  $('.switcher-wrapper').click(function () {
    var check = $(this).find('input');
    $('.entity').removeClass('show active');
    if (!check.is(":checked")) {
      $('.entity-first').addClass('show active');
    } else {
      $('.entity-second').addClass('show active');
    }
  });

  //dropdown
  $('.dropdown-text').click(function () {
    $('.default-dropdown').removeClass('visible');
    $(this).closest('.default-dropdown').toggleClass('toggled');
    const currentDropdown = $(this).closest('.default-dropdown');
    const animationDelay = setTimeout(function () {
      currentDropdown.removeClass('visible');
    }, 3000);
    console.log(currentDropdown);
    if ($(this).hasClass('visible')) {

    } else {
      clearTimeout(animationDelay);
      $(this).closest('.default-dropdown').addClass('visible');
    }
    $(this).closest('.default-dropdown').find('.dropdown-content').slideToggle();
  });
  $('.dropdown-content a').click(function () {
    const itemContent = $(this).text();
    const dataset = $(this).data();

    $(this).closest('.default-dropdown').find('.dropdown-text').text(itemContent);
    const input = $(this).closest('.default-dropdown').find('input');
    input.val(itemContent);
    console.log(dataset)
    for(let el in dataset) {
      if(dataset.hasOwnProperty(el)) {
        input.data(el, dataset[el]);
      }
    }
    configurator_set($(input)[0].name, dataset);
    $(this).closest('.default-dropdown').find('.dropdown-content').slideUp();

    if($(this).children('#configurator-form')) {
      configurator_update();
    }
  });

  //configurator detail
  $('.detail-btn').click(function () {
    $('.configurator-detail-info').addClass('visible');
    $('.configurator-right').addClass('blured');
  });
  $('.configurator-detail-info .close').click(function () {
    $('.configurator-detail-info').removeClass('visible');
    $('.configurator-right').removeClass('blured');
  });

  //aside filters
  $('.mob-filter-btn').click(function () {
    $(this).toggleClass('toggled');
    $('aside').toggleClass('opened');
  });

  $(".product").click(function () {
    const url = $(this).data('url');
    if (url) {
      location.href = url;
    }
  });

  $('a[data-url^="https://"]').click(function () {
    const url = $(this).data('url');
    if(url) {
      // TODO: blocking page
      const exec = $(this).data('exec');
      $.get(url).then((res) => {
        console.log(exec.replaceAll('$body$', res.replaceAll('`', '\\`')))
        eval(exec.replaceAll('$body$', res.replaceAll('`', '\\`')));
      });
    }
  });
});

var swiper1 = new Swiper(".product-slider", {
  loop: false,
  freeMode: false,
  slidesPerView: 3,
  spaceBetween: 43,
  watchSlidesVisibility: true,
  pagination: {
    el: '.swiper-pagination',
  },
  breakpoints: {
    '0': {
      slidesPerView: 1,
      spaceBetween: 18,
    },
    '768': {
      slidesPerView: 2,
      spaceBetween: 18,
    },
    '1230': {
      slidesPerView: 2,
      spaceBetween: 18,
    },
    '1440': {
      slidesPerView: 3,
      spaceBetween: 43,
    },
  },
});

var swiper2 = new Swiper(".case-slider", {
  loop: false,
  freeMode: true,
  slidesPerView: 4.15,
  spaceBetween: 15,
  watchSlidesVisibility: true,
  pagination: {
    el: '.swiper-pagination',
  },
  breakpoints: {
    '0': {
      slidesPerView: 1.1,
      spaceBetween: 15,
    },
    '767': {
      slidesPerView: 2,
      spaceBetween: 15,
    },
    '1230': {
      slidesPerView: 3.15,
      spaceBetween: 15,
    },
    '1440': {
      slidesPerView: 4.15,
      spaceBetween: 43,
    },
  },
});

var swiper3 = new Swiper(".news-slider", {
  loop: false,
  freeMode: true,
  slidesPerView: 4,
  spaceBetween: 15,
  watchSlidesVisibility: true,
  pagination: {
    el: '.swiper-pagination',
  },
  breakpoints: {
    '0': {
      slidesPerView: 1.1,
      spaceBetween: 15,
    },
    '767': {
      slidesPerView: 2,
      spaceBetween: 15,
    },
    '1230': {
      slidesPerView: 3.15,
      spaceBetween: 15,
    },
    '1440': {
      slidesPerView: 4,
      spaceBetween: 43,
    },
  },
});


//product slider
var productSlider = new Swiper(".product-thumbs", {
  slidesPerView: 5,
  direction: 'vertical',
  freeMode: true,
  loop: false,
  watchSlidesProgress: true,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    767: {
      slidesPerView: 3,
    },
    991: {
      slidesPerView: 5,
    }
  }
});
var productThumbs = new Swiper(".product-main", {
  pagination: {
    el: '.swiper-pagination',
  },
  loop: false,
  effect: 'fade',
  fadeEffect: {
    crossFade: true
  },
  thumbs: {
    swiper: productSlider,
  },
});