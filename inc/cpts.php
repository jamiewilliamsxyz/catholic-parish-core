<?php

if (!defined("ABSPATH")) {
  exit;
}

// Register CPTs

add_action("init", "cpc_register_cpts");

function cpc_register_cpts()
{
  $service_labels = array(
    "name" => _x("Services", "post type general name", "catholic-parish-core"),
    "singular_name" => _x("Service", "post type singular name", "catholic-parish-core"),
    "add_new" => __("Add New", "catholic-parish-core"),
    "add_new_item" => __("Add New Service", "catholic-parish-core"),
    "edit" => __("Edit", "catholic-parish-core"),
    "edit_item" => __("Edit Service", "catholic-parish-core"),
    "new_item" => __("New Service", "catholic-parish-core"),
    "view" => __("View", "catholic-parish-core"),
    "view_item" => __("View Service", "catholic-parish-core"),
    "search_items" => __("Search Services", "catholic-parish-core"),
    "not_found" => __("No Services found", "catholic-parish-core"),
    "not_found_in_trash" => __("No Services found in Trash", "catholic-parish-core"),
    "parent" => __("Parent Service:", "catholic-parish-core"),
  );

  register_post_type("cpc_service", array(
    "labels" => $service_labels,
    "description" => __("Parish services", "catholic-parish-core"),
    "menu_icon" => "dashicons-calendar-alt",
    "supports" => array("title"),
    "show_ui" => true,
  ));

  $announcement_labels = array(
    "name" => _x("Announcements", "post type general name", "catholic-parish-core"),
    "singular_name" => _x("Announcement", "post type singular name", "catholic-parish-core"),
    "add_new" => __("Add New", "catholic-parish-core"),
    "add_new_item" => __("Add New Announcement", "catholic-parish-core"),
    "edit" => __("Edit", "catholic-parish-core"),
    "edit_item" => __("Edit Announcement", "catholic-parish-core"),
    "new_item" => __("New Announcement", "catholic-parish-core"),
    "view" => __("View", "catholic-parish-core"),
    "view_item" => __("View Announcement", "catholic-parish-core"),
    "search_items" => __("Search Announcements", "catholic-parish-core"),
    "not_found" => __("No Announcements found", "catholic-parish-core"),
    "not_found_in_trash" => __("No Announcements found in Trash", "catholic-parish-core"),
    "parent" => __("Parent Announcement:", "catholic-parish-core"),
  );

  register_post_type("cpc_announcement", array(
    "labels" => $announcement_labels,
    "description" => __("Parish announcements and notices", "catholic-parish-core"),
    "menu_icon" => "dashicons-megaphone",
    "public" => true,
    "has_archive" => true,
    "rewrite" => array("slug" => "announcements"),
    "supports" => array("title", "editor", "excerpt", "thumbnail"),
  ));

  $newsletter_labels = array(
    "name" => _x("Newsletters", "post type general name", "catholic-parish-core"),
    "singular_name" => _x("Newsletter", "post type singular name", "catholic-parish-core"),
    "add_new" => __("Add New", "catholic-parish-core"),
    "add_new_item" => __("Add New Newsletter", "catholic-parish-core"),
    "edit" => __("Edit", "catholic-parish-core"),
    "edit_item" => __("Edit Newsletter", "catholic-parish-core"),
    "new_item" => __("New Newsletter", "catholic-parish-core"),
    "view" => __("View", "catholic-parish-core"),
    "view_item" => __("View Newsletter", "catholic-parish-core"),
    "search_items" => __("Search Newsletters", "catholic-parish-core"),
    "not_found" => __("No Newsletters found", "catholic-parish-core"),
    "not_found_in_trash" => __("No Newsletters found in Trash", "catholic-parish-core"),
    "parent" => __("Parent Newsletter:", "catholic-parish-core"),
  );

  register_post_type("cpc_newsletter", array(
    "labels" => $newsletter_labels,
    "description" => __("Parish newsletters", "catholic-parish-core"),
    "menu_icon" => "dashicons-media-document",
    "public" => true,
    "has_archive" => true,
    "rewrite" => array("slug" => "newsletters"),
    "supports" => array("title"),
  ));

  $staff_member_labels = array(
    "name" => _x("Parish Staff", "post type general name", "catholic-parish-core"),
    "singular_name" => _x("Parish Staff Member", "post type singular name", "catholic-parish-core"),
    "add_new" => __("Add New", "catholic-parish-core"),
    "add_new_item" => __("Add New Parish Staff Member", "catholic-parish-core"),
    "edit" => __("Edit", "catholic-parish-core"),
    "edit_item" => __("Edit Parish Staff Member", "catholic-parish-core"),
    "new_item" => __("New Parish Staff Member", "catholic-parish-core"),
    "view" => __("View", "catholic-parish-core"),
    "view_item" => __("View Parish Staff Member", "catholic-parish-core"),
    "search_items" => __("Search Parish Staff", "catholic-parish-core"),
    "not_found" => __("No Parish Staff found", "catholic-parish-core"),
    "not_found_in_trash" => __("No Parish Staff found in Trash", "catholic-parish-core"),
    "parent" => __("Parent Parish Staff Member:", "catholic-parish-core"),
  );

  register_post_type("cpc_staff_member", array(
    "labels" => $staff_member_labels,
    "description" => __("Information about parish staff and clergy members", "catholic-parish-core"),
    "menu_icon" => "dashicons-businessperson",
    "public" => true,
    "has_archive" => true,
    "rewrite" => array("slug" => "staff"),
    "supports" => array("title", "thumbnail"),
  ));

  $church_group_labels = array(
    "name" => _x("Church Groups", "post type general name", "catholic-parish-core"),
    "singular_name" => _x("Church Group", "post type singular name", "catholic-parish-core"),
    "add_new" => __("Add New", "catholic-parish-core"),
    "add_new_item" => __("Add New Church Group", "catholic-parish-core"),
    "edit" => __("Edit", "catholic-parish-core"),
    "edit_item" => __("Edit Church Group", "catholic-parish-core"),
    "new_item" => __("New Church Group", "catholic-parish-core"),
    "view" => __("View", "catholic-parish-core"),
    "view_item" => __("View Church Group", "catholic-parish-core"),
    "search_items" => __("Search Church Groups", "catholic-parish-core"),
    "not_found" => __("No Church Groups found", "catholic-parish-core"),
    "not_found_in_trash" => __("No Church Groups found in Trash", "catholic-parish-core"),
    "parent" => __("Parent Church Group:", "catholic-parish-core"),
  );

  register_post_type("cpc_church_group", array(
    "labels" => $church_group_labels,
    "description" => __("Information about the parish groups", "catholic-parish-core"),
    "menu_icon" => "dashicons-groups",
    "has_archive" => true,
    "public" => true,
    "rewrite" => array("slug" => "church-groups"),
    "supports" => array("title"),
  ));
}
