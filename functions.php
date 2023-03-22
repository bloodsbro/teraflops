<?php
require_once('functions/menu.php');
require_once('functions/woocommerce/index.php');
require_once('functions/search.php');
require_once('functions/configurator/index.php');

function teraflops_register_scripts()
{
  wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/libs/swiper/swiper-bundle.min.css');
  wp_enqueue_style('app', get_template_directory_uri() . '/assets/css/app.css');
  wp_enqueue_style('app', get_template_directory_uri() . '/style.css');

  wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri() . '/assets/libs/jquery/jquery-3.5.1.min.js', array(), '3.5.1', true);
  wp_enqueue_script('jquery');
  wp_enqueue_script('lottie', get_template_directory_uri() . '/assets/libs/lottie/lottie-player.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/libs/swiper/swiper-bundle.min.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('t_utils', get_template_directory_uri() . '/assets/js/utils.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('configurator', get_template_directory_uri() . '/assets/js/configurator.js', array('jquery', 't_utils'), '1.0.0', true);
  wp_enqueue_script('app', get_template_directory_uri() . '/assets/js/app.js', array('jquery', 't_utils'), '1.0.0', true);
  wp_enqueue_script('product', get_template_directory_uri() . '/assets/js/product.js', array('jquery', 't_utils'), '1.0.0', true);
  wp_enqueue_script('cart', get_template_directory_uri() . '/assets/js/cart.js', array('jquery', 't_utils'), '1.0.0', true);
  wp_enqueue_script('filter', get_template_directory_uri() . '/assets/js/filter.js', array('jquery', 't_utils'), '1.0.0', true);
}

function teraflops_register_ajax()
{
  wp_localize_script('app', 'myajax',
    array(
      'url' => admin_url('admin-ajax.php'),
      'nonce' => wp_create_nonce('myajax-nonce')
    )
  );
}

add_action('wp_enqueue_scripts', 'teraflops_register_scripts');
add_action('wp_enqueue_scripts', 'teraflops_register_ajax');

add_action('after_setup_theme', function () {
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support('menus');
});

function teraflops_configurator_update()
{
  check_ajax_referer('myajax-nonce', 'nonce');
  global $wpdb;

  $config_id = $_POST['config_id'];
  $category = $_POST['category'];
  $product = $_POST['product'];
  $user_id = get_current_user_id();
  $author = 0;
  $set_config_id = $config_id;

  $pc = array();
  if ($config_id) {
    $res = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "teraflops_configurator WHERE config_id = %s", $config_id), ARRAY_A);
    for ($idx = 0; $idx < count($res); $idx++) {
      $row = $res[$idx];
      $pc[$row['category']] = $row['product'];

      $author = $row['author'];
    }
  } else {
    $config_id = guidv4();
    $author = $user_id;
  }

  $pc['config_id'] = $config_id;
  if ($author == $user_id && $author != 0) {
    if (!$category || !$product) {
      wp_die(json_encode(array(
        "status" => "success",
        "data" => json_encode($pc)
      )));
    }
  } else {
    $set_config_id = guidv4();
  }

  if ($category) {
    $pc[$category] = $product;
  }

  foreach ($pc as $pc_cat => $pc_product) {
    if ($pc_cat === 'config_id') continue;

    $res = $wpdb->get_results($wpdb->prepare("SELECT ID, product FROM " . $wpdb->prefix . "teraflops_configurator WHERE config_id = %s AND category = %s AND author = %d AND author != 0 LIMIT 1", $config_id, $pc_cat, $user_id), OBJECT);
    if (!$res) {
      $wpdb->query($wpdb->prepare("INSERT INTO " . $wpdb->prefix . "teraflops_configurator (config_id, category, product, author) VALUES (%s, %s, %d, %d)", $set_config_id, $pc_cat, $pc_product, $user_id), OBJECT);
    } else {
      if ($res['product'] !== $pc_product) {
        $wpdb->query($wpdb->prepare("UPDATE " . $wpdb->prefix . "teraflops_configurator SET product = %d WHERE ID = %d LIMIT 1", $res['ID']));
      }
    }
  }

  $pc['config_id'] = $set_config_id;
  wp_die(json_encode(array(
    "status" => "success",
    "data" => json_encode($pc),
  )));
}

if (wp_doing_ajax()) {
  add_action('wp_ajax_configurator_update', 'teraflops_configurator_update');
  add_action('wp_ajax_nopriv_configurator_update', 'teraflops_configurator_update');
}

if (wp_doing_ajax()) {
  add_action('wp_ajax_novapost_getCities', 'teraflops_novapost_getCities');
  add_action('wp_ajax_nopriv_novapost_getCities', 'teraflops_novapost_getCities');
}

if (wp_doing_ajax()) {
  add_action('wp_ajax_novapost_getWarehouses', 'teraflops_novapost_getWarehouses');
  add_action('wp_ajax_nopriv_novapost_getWarehouses', 'teraflops_novapost_getWarehouses');
}

if (wp_doing_ajax()) {
  add_action('wp_ajax_novapost_getPrice', 'teraflops_novapost_getPrice');
  add_action('wp_ajax_nopriv_novapost_getPrice', 'teraflops_novapost_getPrice');
}

function teraflops_novapost_getCities() {
  global $wpdb;

  $area = $_POST['area'];

  wp_die(json_encode(array(
    "status" => "success",
    "data" => json_encode($wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "novapost_cities WHERE `Area` = '$area'"))),
  )));
}

function teraflops_novapost_getWarehouses() {
  global $wpdb;

  $city = $_POST['city'];

  wp_die(json_encode(array(
    "status" => "success",
    "data" => json_encode($wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "novapost_warehouses WHERE `CityRef` = '$city' AND `WarehouseStatus` = 'Working'"))),
  )));
}

function teraflops_novapost_getPrice() {
  $weight = $_POST['weight'];

  try {
    $length = 0;
    $width = 0;
    $height = 0;

    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
      $product = new WC_product($cart_item['product_id']);
      if($product->has_dimensions()) {
        $length += (float)$product->get_length();
        $width += (float)$product->get_width();
        $height += (float)$product->get_height();
      }
    }

    $packResponse = novapost_request(array(
      "modelName" => "Common",
      "calledMethod" => "getPackList",
      "methodProperties" => array(
        "Lengthstring" => $length,
        "Widthstring" => $width,
        "Heightstring" => $height,
        "VolumetricWeightstring" => $length * $width * $height,
        "TypeOfPackingstring" => ""
      )
    ));
    if($packResponse->success) {
      $response = novapost_request(array(
        "modelName" => "InternetDocument",
        "calledMethod" => "getDocumentPrice",
        "methodProperties" => array(
          "CitySender" => "8d5a980d-391c-11dd-90d9-001a92567626",
          "CityRecipient" => $_POST['city'],
          "Weight" => $weight,
          "ServiceType" => $_POST['serviceType'], // WarehouseWarehouse, WarehouseDoors
          "Cost" => $_POST['cost'],
          "CargoType" => "Cargo",
          "SeatsAmount" => ceil($weight / 30),
          "PackRef" => $packResponse->data[0]->Ref,
          "PackCount" => 1,
          "CargoDescription" => "5b89dbcd-33e9-11e3-b441-0050568002cf"
        ),
      ));
      if ($response->success) {
        wp_die(json_encode(array(
          "status" => "success",
          "data" => json_encode($response->data),
          "packs" => json_encode($packResponse),
        )));
      } else {
        wp_die(json_encode(array(
          "status" => "error",
          "data" => json_encode($response),
        )));
      }
    } else {
      wp_die(json_encode(array(
        "status" => "error",
        "data" => json_encode($packResponse),
      )));
    }
  } catch (Exception $e) {}
}

if (!wp_next_scheduled('novapost_update_areas')) {
  wp_schedule_event(time(), 'monthly', 'novapost_update_areas');
}

if (!wp_next_scheduled('novapost_update_cities')) {
  wp_schedule_event(time(), 'daily', 'novapost_update_cities');
}

if (!wp_next_scheduled('novapost_update_warehouses')) {
  wp_schedule_event(time(), 'daily', 'novapost_update_warehouses');
}

add_action('novapost_update_cities', 'updateCities', 10, 0);
add_action('novapost_update_areas', 'updateAreas', 10, 0);
add_action('novapost_update_warehouses', 'updateWarehouses', 10, 0);
function updateAreas()
{
  $data['modelName'] = 'Address';
  $data['calledMethod'] = 'getAreas';

  try {
    $response = novapost_request($data);
    if ($response->success) {
      global $wpdb;
      foreach($response->data as $data) {
        $wpdb->query($wpdb->prepare("INSERT INTO " . $wpdb->prefix . "novapost_areas (Ref, AreasCenter, DescriptionRu, Description) VALUES (%s, %s, %s, %s)", $data->Ref, $data->AreasCenter, $data->DescriptionRu, $data->Description));
      }
    }
  } catch (Exception $e) {}
}

function updateCities()
{
  $data['modelName'] = 'Address';
  $data['calledMethod'] = 'getCities';

  try {
    $response = novapost_request($data);
    if ($response->success) {
      global $wpdb;
      foreach($response->data as $data) {
        $wpdb->query($wpdb->prepare("INSERT INTO " . $wpdb->prefix . "novapost_cities (Ref, Description, DescriptionRu, Area, SettlementType, CityID, SettlementTypeDescription, SettlementTypeDescriptionRu) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", $data->Ref, $data->Description, $data->DescriptionRu, $data->Area, $data->SettlementType, $data->CityID, $data->SettlementTypeDescription, $data->SettlementTypeDescriptionRu));
      }
    }
  } catch (Exception $e) {}
}

function updateWarehouses()
{
  $data['modelName'] = 'Address';
  $data['calledMethod'] = 'getWarehouses';

  try {
    $response = novapost_request($data);
    if ($response->success) {
      global $wpdb;
      foreach($response->data as $data) {
        $wpdb->query($wpdb->prepare("INSERT INTO " . $wpdb->prefix . "novapost_warehouses (SiteKey,`Description`,DescriptionRu,ShortAddress,ShortAddressRu,Phone,TypeOfWarehouse,Ref,`Number`,CityRef,CityDescription,CityDescriptionRu,SettlementRef,SettlementDescription,SettlementAreaDescription,SettlementRegionsDescription,SettlementTypeDescription,SettlementTypeDescriptionRu,Longitude,Latitude,PostFinance,BicycleParking,PaymentAccess,POSTerminal,InternationalShipping,SelfServiceWorkplacesCount,TotalMaxWeightAllowed,PlaceMaxWeightAllowed,SendingLimitationsOnDimensions,ReceivingLimitationsOnDimensions,ReceptionReception,Delivery,`Schedule`,DistrictCode,WarehouseStatus,WarehouseStatusDate,CategoryOfWarehouse,RegionCity,WarehouseForAgent,MaxDeclaredCost,DenyToSelect,PostMachineType,PostalCodeUA,OnlyReceivingParcel,WarehouseIndex) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", $data->SiteKey,$data->Description,$data->DescriptionRu,$data->ShortAddress,$data->ShortAddressRu,$data->Phone,$data->TypeOfWarehouse,$data->Ref,$data->Number,$data->CityRef,$data->CityDescription,$data->CityDescriptionRu,$data->SettlementRef,$data->SettlementDescription,$data->SettlementAreaDescription,$data->SettlementRegionsDescription,$data->SettlementTypeDescription,$data->SettlementTypeDescriptionRu,$data->Longitude,$data->Latitude,$data->PostFinance,$data->BicycleParking,$data->PaymentAccess,$data->POSTerminal,$data->InternationalShipping,$data->SelfServiceWorkplacesCount,$data->TotalMaxWeightAllowed,$data->PlaceMaxWeightAllowed,json_encode($data->SendingLimitationsOnDimensions),json_encode($data->ReceivingLimitationsOnDimensions),json_encode($data->Reception),json_encode($data->Delivery),json_encode($data->Schedule),$data->DistrictCode,$data->WarehouseStatus,$data->WarehouseStatusDate,$data->CategoryOfWarehouse,$data->RegionCity,$data->WarehouseForAgent,$data->MaxDeclaredCost,$data->DenyToSelect,$data->PostMachineType,$data->PostalCodeUA,$data->OnlyReceivingParcel,$data->WarehouseIndex));
      }
    }
  } catch (Exception $e) {}
}

function getAreas()
{
  global $wpdb;
  return $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "novapost_areas"), OBJECT);
}

function novapost_request($fields)
{
  $fields['apiKey'] = '319df7b5017de4df9690ebafa499fd03';

  $ch = curl_init('https://api.novaposhta.ua/v2.0/json/');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

  $result = curl_exec($ch);
  curl_close($ch);

  return json_decode($result);
}

function teraflops_delivery_cost()
{
  $type = $_POST['type'];
  $post = $_POST['post'];
  $address = $_POST['address'];

  switch ($type) {
    case 1: // Новая почта
    {
      $result = novapost_request(array(
        "modelName" => "InternetDocument",
        "calledMethod" => "getDocumentPrice"
      ));
      wp_die(array(
        "status" => "success",
        "data" => json_encode($result)
      ));
      break;
    }
    case 2: // Укр Почта
    {
      break;
    }
  }

  wp_die(json_encode(array(
    "status" => "error",
    "data" => 'Невалидные данные',
  )));
}

if (wp_doing_ajax()) {
  add_action('wp_ajax_delivery_cost', 'teraflops_delivery_cost');
  add_action('wp_ajax_nopriv_delivery_cost', 'teraflops_delivery_cost');
}

function guidv4(): string
{
  $data = random_bytes(16);
  $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // установка версии 0100
  $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // установка бит 6-7 до 10
  return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function wishlist_classes(): string
{
  return 'btn btn-gradient';
}

add_filter('yith_wcwl_add_to_wishlist_button_classes', 'wishlist_classes', 50, 0);
//
//
//function test($terms, $tax_slug)
//{
//  $hidden_terms = array();
//  if (!WOOF_REQUEST::isset('woof_shortcode_excluded_terms')) {
//    if (isset(woof()->settings['excluded_terms'][$tax_slug])) {
//      $hidden_terms = explode(',', woof()->settings['excluded_terms'][$tax_slug]);
//    }
//  } else {
//    $hidden_terms = explode(',', WOOF_REQUEST::get('woof_shortcode_excluded_terms'));
//  }
//
//  $terms = apply_filters('woof_sort_terms_before_out', $terms, 'mselect');
//
//  $html = '';
//  if (!empty($terms)) {
//    foreach ($terms as $term) {
//      $inreverse = true;
//      if (isset(woof()->settings['excluded_terms_reverse'][$tax_slug]) and woof()->settings['excluded_terms_reverse'][$tax_slug]) {
//        $inreverse = !$inreverse;
//      }
//
//      if (in_array($term['term_id'], $hidden_terms) == $inreverse) {
//        continue;
//      }
//
//      $select_id = "woof_tax_mselect_" . $tax_slug;
//      $html .= '
//<label id="' . esc_attr($select_id) . '" class="check">
//  <input type="checkbox" name="' . esc_attr(woof()->check_slug($tax_slug)) . '">
//  <i>' . esc_html(WOOF_HELPER::wpml_translate($taxonomies_info[$tax_slug])) . '</i>
//  <span class="checkmark"></span>
//  <small>' . esc_html($term['name']) . '</small>
//</label>
//  ';
//
//      if (!isset($collector[$tax_slug])) {
//        $collector[$tax_slug] = array();
//      }
//
//      $collector[$tax_slug][] = array('name' => $term['name'], 'slug' => $term['slug'], 'term_id' => $term['term_id']);
//    }
//  }
//
//  return $html;
//}
//
//function woof_print_tax($taxonomies, $tax_slug, $terms, $exclude_tax_key, $taxonomies_info, $additional_taxes, $woof_settings, $args, $counter)
//{
//  echo '
//          <div class="aside-item">
//            <div class="default-dropdown">
//              <div class="dropdown-inner">
//                <div class="check dropdown-text">
//                  <input type="checkbox" checked>
//                  <i>' . str_replace("Товар ", "", esc_html(WOOF_HELPER::wpml_translate($taxonomies_info[$tax_slug]))) . '</i>
//                  <small>Не обрано</small>
//                </div>
//                <div class="dropdown-content">
//                  ' . test($terms, $tax_slug) . '
//                </div>
//              </div>
//            </div>
//          </div>
//  ';
//}

WP_Nav_Menu_Custom_Fields::init();