<?php

if (!defined("ABSPATH")) {
  exit;
}

// Filter for custom title placeholders

add_filter("enter_title_here", "cpc_filter_enter_title", 10, 2);

function cpc_filter_enter_title($title_placeholder, $post)
{
  switch ($post->post_type) {
    case "cpc_service":
      $title_placeholder = __("Enter Service Name", "catholic-parish-core");
      break;
    case "cpc_announcement":
      $title_placeholder = __("Enter Announcement Title", "catholic-parish-core");
      break;
    case "cpc_newsletter":
      $title_placeholder = __("Enter Newsletter Name", "catholic-parish-core");
      break;
    case "cpc_staff_member":
      $title_placeholder = __("Enter Parish Staff Member Name", "catholic-parish-core");
      break;
    case "cpc_church_group":
      $title_placeholder = __("Enter Church Group Name", "catholic-parish-core");
      break;
    default:
      break;
  }
  return $title_placeholder;
}

// Enqueue admin stylesheet

add_action("admin_enqueue_scripts", "cpc_enqueue_admin_styles");

function cpc_enqueue_admin_styles()
{
  $screen = get_current_screen();

  if (!$screen) return;

  $post_type = $screen->post_type;

  if (
    $post_type !== "cpc_newsletter" &&
    $post_type !== "cpc_service" &&
    $post_type !== "cpc_staff_member" &&
    $post_type !== "cpc_church_group" &&
    $screen->id !== "toplevel_page_parish-setup-guide" &&
    $screen->id !== "settings_page_cpc-parish-details"
  ) {
    return;
  }

  wp_enqueue_style(
    "cpc-admin-style",
    CPC_URL . "assets/css/admin.css",
    [],
    CPC_VERSION
  );
}

// Admin Notice

add_action("admin_notices", "cpc_notify_admin");

function cpc_notify_admin()
{
  if (wp_get_theme()->get("TextDomain") !== "catholic-parish-wordpress-theme") :
?>
    <div class="notice notice-warning">
      <p>
        <?php echo wp_kses_post(__(
          '<strong>Catholic Parish Core</strong><br />
          This plugin is a companion plugin for the Catholic Parish theme.<br />
          <a href="https://github.com/jamiewilliamsxyz/catholic-parish-wordpress-theme" rel="noopener" target="_blank">Download the theme here</a>',
          "catholic-parish-core"
        ));
        ?>
      </p>
    </div>
<?php endif;
}
