<?php

if (!defined("ABSPATH")) {
  exit;
}

add_action("init", "cpc_register_taxonomies");

function cpc_register_taxonomies()
{
  $church_group_type_labels = array(
    "name" => _x("Church Group Types", "taxonomy general name", "catholic-parish-core"),
    "singular_name" => _x("Church Group Type", "taxonomy singular name", "catholic-parish-core"),
    "search_items" => __("Search Church Group Types", "catholic-parish-core"),
    "all_items" => __("All Church Group Types", "catholic-parish-core"),
    "edit_item" => __("Edit Church Group Type", "catholic-parish-core"),
    "update_item" => __("Update Church Group Type", "catholic-parish-core"),
    "add_new_item" => __("Add New Church Group Type", "catholic-parish-core"),
    "new_item_name" => __("New Church Group Type Name", "catholic-parish-core"),
    "not_found" => __("No Church Group Types found", "catholic-parish-core"),
    "menu_name" => __("Church Group Types", "catholic-parish-core"),
  );

  register_taxonomy("cpc_church_group_type", "cpc_church_group", array(
    "labels" => $church_group_type_labels,
    "public" => true,
    "description" => __("Used to categorise church groups e.g. Youth, Choir, Bible Study", "catholic-parish-core"),
    "show_admin_column" => true,
    "query_var" => true,
    "rewrite" => array("slug" => "church_group_type"),
  ));

  $parish_staff_type_labels = array(
    "name" => _x("Parish Staff Types", "taxonomy general name", "catholic-parish-core"),
    "singular_name" => _x("Parish Staff Type", "taxonomy singular name", "catholic-parish-core"),
    "search_items" => __("Search Parish Staff Types", "catholic-parish-core"),
    "all_items" => __("All Parish Staff Types", "catholic-parish-core"),
    "edit_item" => __("Edit Parish Staff Type", "catholic-parish-core"),
    "update_item" => __("Update Parish Staff Type", "catholic-parish-core"),
    "add_new_item" => __("Add New Parish Staff Type", "catholic-parish-core"),
    "new_item_name" => __("New Parish Staff Type Name", "catholic-parish-core"),
    "not_found" => __("No Parish Staff Types found", "catholic-parish-core"),
    "menu_name" => __("Parish Staff Types", "catholic-parish-core"),
  );

  register_taxonomy("cpc_staff_type", "cpc_staff_member", array(
    "labels" => $parish_staff_type_labels,
    "public" => true,
    "description" => __("Used to categorise parish staff members e.g. Clergy or Non-Clergy", "catholic-parish-core"),
    "show_admin_column" => true,
    "query_var" => true,
    "rewrite" => array("slug" => "staff_type"),
  ));
}
