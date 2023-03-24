<?php
function get_cart_page_html($page = 1): string {
  return file_get_contents(get_template_directory_uri() . "/templates/cart/section-$page.php");
}