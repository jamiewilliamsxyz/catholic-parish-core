<?php

/*
 * Plugin Name: Catholic Parish Core
 * Plugin URI: https://github.com/jamiewilliamsxyz/catholic-parish-core
 * Description: A WordPress companion plugin that holds the functionality and logic for the catholic-parish-wordpress-theme. Designed for local Catholic parishes to manage mass times, announcements, parish information and more with minimal complexity
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: Jamie Williams
 * Author URI: https://github.com/jamiewilliamsxyz
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Update URI: https://github.com/jamiewilliamsxyz/catholic-parish-core
 * Text Domain: catholic-parish-core
 * Domain Path: /languages
*/

if (!defined("ABSPATH")) {
  exit;
}

define("CPC_PATH", plugin_dir_path(__FILE__));
define("CPC_URL", plugin_dir_url(__FILE__));
define("CPC_VERSION", "1.0.0");

require_once CPC_PATH . "inc/cpts.php";
require_once CPC_PATH . "inc/taxonomies.php";
require_once CPC_PATH . "inc/meta-boxes.php";
require_once CPC_PATH . "inc/admin-hooks.php";
require_once CPC_PATH . "inc/frontend-hooks.php";
require_once CPC_PATH . "inc/contact-form-handler.php";
require_once CPC_PATH . "inc/admin-settings.php";
require_once CPC_PATH . "inc/shortcodes.php";

// Activation Hook
register_activation_hook(__FILE__, "cpc_activate_plugin");

function cpc_activate_plugin()
{
  // Registering CPTs and taxonomies so permalinks work
  cpc_register_cpts();
  cpc_register_taxonomies();
  flush_rewrite_rules();
}

// Deactivation Hook
register_deactivation_hook(__FILE__, "cpc_deactivate_plugin");

function cpc_deactivate_plugin()
{
  register_activation_hook(__FILE__, "cpc_activate_plugin");
}
