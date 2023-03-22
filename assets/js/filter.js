let sliderOne = document.getElementById("price-slider-1");
let sliderTwo = document.getElementById("price-slider-2");
let displayValOne = document.getElementById("range1");
let displayValTwo = document.getElementById("range2");
let minGap = 0;
let sliderTrack = document.querySelector(".slider-track");
let sliderMaxValue = 0;

$(document).ready(function () {
  if (sliderTrack) {
    const minPrice = $('#min_price').data('min');
    const maxPrice = $('#max_price').data('max');

    const rangeMin = $('#price-slider-1');
    const rangeMax = $('#price-slider-2');

    rangeMin.attr('min', minPrice);
    rangeMin.attr('max', maxPrice);

    rangeMax.attr('min', minPrice);
    rangeMax.attr('max', maxPrice);

    sliderMaxValue = maxPrice;

    const url = new URL(location.href);
    const currentMinPrice = url.searchParams.get('min_price') || minPrice;
    const currentMaxPrice = url.searchParams.get('max_price') || maxPrice;

    rangeMin.val(currentMinPrice);
    rangeMax.val(currentMaxPrice);

    slideOne();
    slideTwo();
  }
});

function slideOne() {
  if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
    sliderOne.value = parseInt(sliderTwo.value) - minGap;
  }
  displayValOne.value = sliderOne.value;
  fillColor();
}

function slideTwo() {
  if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
    sliderTwo.value = parseInt(sliderOne.value) + minGap;
  }
  displayValTwo.value = sliderTwo.value;
  fillColor();
}

function fillColor() {
  percent1 = (sliderOne.value / sliderMaxValue) * 100;
  percent2 = (sliderTwo.value / sliderMaxValue) * 100;
}

displayValOne?.addEventListener("focusout", function () {
  sliderOne.value = this.value;
  fillColor();

  filterSubmit();
});

displayValTwo?.addEventListener("focusout", function () {
  sliderTwo.value = this.value;
  fillColor();

  filterSubmit();
});

let updateInterval = null;
sliderOne?.addEventListener('change', function () {
  if(updateInterval) {
    clearInterval(updateInterval);
  }
  updateInterval = setInterval(filterSubmit, 500);
});

sliderTwo?.addEventListener('change', function () {
  if(updateInterval) {
    clearInterval(updateInterval);
  }
  updateInterval = setInterval(filterSubmit, 500);
});

function filterSubmit() {
  $('#min_price').val(sliderOne.value);
  $('#max_price').val(sliderTwo.value);

  $('#min_price').closest('form').submit();
}