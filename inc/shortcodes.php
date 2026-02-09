<?php

if (!defined("ABSPATH")) {
  exit;
}

function cpc_get_option($key)
{
  return get_option("cpc_parish_" . $key, __("Not Provided", "catholic-parish-core"));
}

add_shortcode("parish_phone", function () {
  return esc_html(cpc_get_option("phone"));
});

add_shortcode("parish_email", function () {
  return esc_html(cpc_get_option("email"));
});

add_shortcode("parish_church_address", function () {
  return nl2br(esc_html(cpc_get_option("church_address")));
});

add_shortcode("parish_office_address", function () {
  return nl2br(esc_html(cpc_get_option("office_address")));
});

add_shortcode("parish_office_hours", function () {
  return nl2br(esc_html(cpc_get_option("office_hours")));
});

add_shortcode("parish_details", function () {
  ob_start();

  $details_arr = array(
    "phone" => "Phone",
    "email" => "Email",
    "church_address" => "Church Address",
    "office_address" => "Office Address",
    "office_hours" => "Office Opening Hours"
  );

  foreach ($details_arr as $key => $title) {
    $data = cpc_get_option($key);

    echo "<p><strong>" . esc_html__($title, "catholic-parish-core") . ":</strong> "
      . nl2br(esc_html($data))
      . "</p>";
  }

  return ob_get_clean();
});
