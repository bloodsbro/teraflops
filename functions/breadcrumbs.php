]<?php
function breadcrumbs()
{
  $separator = '</li><li><a>';
  $url = get_template_directory_uri() . '/assets/img/home-br-ico.svg';

  echo '<li><a href="' . site_url() . '"><img src="' . $url . '" alt="">Головна</a>';

  if (!is_front_page()) {
    echo $separator;

    if (is_page()) {
      the_title();
    } elseif (is_category()) {
      single_cat_title();
    } elseif (is_tag()) {
      single_tag_title();
    }

    echo "</a></li>";
  }
}