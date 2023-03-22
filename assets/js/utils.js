function addToCart(p_id) {
  return $.get('/?post_type=product&add-to-cart=' + p_id);
}

function addToWishlist(p_id) {
  return $.get('/?add_to_wishlist=' + p_id);
}