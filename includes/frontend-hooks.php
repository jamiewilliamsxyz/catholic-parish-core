<?php

if (!defined("ABSPATH")) {
  exit;
}

// Redirect single church group, staff member and newsletter CPT posts to their archive pages

add_action("template_redirect", "cpc_redirect_single_cpts");

function cpc_redirect_single_cpts()
{
  if (is_singular(array("cpc_staff_member", "cpc_church_group", "cpc_newsletter"))) {
    $archive_link = get_post_type_archive_link(get_post_type());
    wp_redirect($archive_link, 301);
    exit;
  }
}
