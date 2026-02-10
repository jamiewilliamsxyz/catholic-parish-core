<?php

if (!defined("WP_UNINSTALL_PLUGIN")) {
  exit;
}

$options = array(
  "phone",
  "email",
  "church_address",
  "office_address",
  "office_hours",
);

foreach ($options as $option) {
  delete_option("cpc_parish_" . $option);
}
