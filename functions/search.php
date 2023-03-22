<?php

function custom_search_form($form): string
{
  return '<form role="search" method="get" class="search-form" action="' . home_url('/') . '">
    <div class="form-group-wrapper">
      <div class="form-group">
        <input type="search" class="form-control search" placeholder="Текст" value="' . get_search_query() . '" name="s">
      </div>
      <button type="submit" class="btn btn-gradient search-submit">
        Пошук
      </button>
    </div>
    
    <input type="hidden" value="product" name="post_type" id="post_type" />
  </form>';
}

add_filter('get_search_form', 'custom_search_form', 40);