<?php

if (!defined("ABSPATH")) {
  exit;
}

// Register Parish Details Settings Page

add_action("admin_menu", "cpc_add_parish_details_settings_page");

function cpc_add_parish_details_settings_page()

{
  add_options_page(
    __("Parish Details", "catholic-parish-core"),
    __("Parish Details", "catholic-parish-core"),
    "manage_options",
    "cpc-parish-details",
    "cpc_render_parish_details_settings_page",
  );
}

// Render Parish Details Settings Page

function cpc_render_parish_details_settings_page()
{
  if (!current_user_can("manage_options")) return;

?>
  <div class="cpc-details-settings-page wrap">
    <header>
      <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
      <p>
        <?php esc_html_e("The parish details you enter below can be displayed via shortcodes. Additionally, if you have installed the Catholic Parish theme, the details will also appear in the Contact Page template details card and the footer.", "catholic-parish-core"); ?>
      </p>
    </header>

    <main>
      <section>
        <form action="options.php" method="post">
          <?php
          settings_fields("cpc_parish_details");
          do_settings_sections("cpc-parish-details");
          submit_button(__("Save Parish Details", "catholic-parish-core"));
          ?>
        </form>
      </section>

      <hr />

      <section>
        <h2><?php esc_html_e("Available Shortcodes", "catholic-parish-core") ?></h2>
        <ul>
          <li><code>[parish_phone]</code></li>
          <li><code>[parish_email]</code></li>
          <li><code>[parish_church_address]</code></li>
          <li><code>[parish_office_address]</code></li>
          <li><code>[parish_office_hours]</code></li>
          <li><code>[parish_details]</code> <em>- <?php esc_html_e("inserts all the above details", "catholic-parish-core"); ?></em></li>
        </ul>
        <p class="cpc-details-settings-section-subtext description">
          <?php esc_html_e("Shortcodes allow you to add parish details into pages or posts via the editor.", "catholic-parish-core"); ?>
        </p>
      </section>

    </main>

    <footer>
      <a href="https://github.com/jamiewilliamsxyz/catholic-parish-core" target="_blank" rel="noopener"><?php esc_html_e("Plugin GitHub repository", "catholic-parish-core"); ?></a>
      <a href="https://github.com/jamiewilliamsxyz/catholic-parish-wordpress-theme" target="_blank" rel="noopener"><?php esc_html_e("Theme GitHub repository", "catholic-parish-core"); ?></a>
    </footer>
  </div>
  <?php
}

// Register Parish Details Section, Settings & Fields

add_action("admin_init", "cpc_register_details_settings");

function cpc_register_details_settings()
{
  // Add Details Section
  add_settings_section(
    "cpc_parish_details_section",
    __("Parish Details", "catholic-parish-core"),
    "cpc_parish_details_section_callback",
    "cpc-parish-details",
  );

  // Details Section - Callback
  function cpc_parish_details_section_callback()
  {
    echo '<p class="cpc-details-settings-section-subtext description">' . esc_html__("Enter your parish details below.", "catholic-parish-core") . "</p>";
  }

  // Phone
  register_setting(
    "cpc_parish_details",
    "cpc_parish_phone",
    array(
      "type" => "string",
      "sanitize_callback" => "sanitize_text_field",
    )
  );

  add_settings_field(
    "cpc_parish_phone",
    __("Phone Number", "catholic-parish-core"),
    "cpc_parish_phone_field_callback",
    "cpc-parish-details",
    "cpc_parish_details_section"
  );

  function cpc_parish_phone_field_callback()
  {
    $value = get_option("cpc_parish_phone");
  ?>
    <input
      type="text"
      name="cpc_parish_phone"
      value="<?php echo esc_attr($value); ?>"
      placeholder="+44 1234 567890" />
  <?php
  }

  // Email
  register_setting(
    "cpc_parish_details",
    "cpc_parish_email",
    array(
      "type" => "string",
      "sanitize_callback" => "sanitize_email",
    )
  );

  add_settings_field(
    "cpc_parish_email",
    __("Email Address", "catholic-parish-core"),
    "cpc_parish_email_field_callback",
    "cpc-parish-details",
    "cpc_parish_details_section"
  );

  function cpc_parish_email_field_callback()
  {
    $value = get_option("cpc_parish_email");
  ?>
    <input
      type="email"
      name="cpc_parish_email"
      value="<?php echo esc_attr($value); ?>"
      placeholder="john.doe@gmail.com" />
  <?php
  }

  // Church Address
  register_setting(
    "cpc_parish_details",
    "cpc_parish_church_address",
    array(
      "type" => "string",
      "sanitize_callback" => "sanitize_textarea_field",
    )
  );

  add_settings_field(
    "cpc_parish_church_address",
    __("Church Address", "catholic-parish-core"),
    "cpc_parish_church_address_field_callback",
    "cpc-parish-details",
    "cpc_parish_details_section"
  );

  function cpc_parish_church_address_field_callback()
  {
    $value = get_option("cpc_parish_church_address");
  ?>
    <textarea
      name="cpc_parish_church_address"
      rows="4"
      placeholder="33 <?php esc_attr_e("Church Street, Springfield", "catholic-parish-core"); ?>"><?php echo esc_attr($value); ?></textarea>
  <?php
  }

  // Office Address
  register_setting(
    "cpc_parish_details",
    "cpc_parish_office_address",
    array(
      "type" => "string",
      "sanitize_callback" => "sanitize_textarea_field",
    )
  );

  add_settings_field(
    "cpc_parish_office_address",
    __("Office Address", "catholic-parish-core"),
    "cpc_parish_office_address_field_callback",
    "cpc-parish-details",
    "cpc_parish_details_section"
  );

  function cpc_parish_office_address_field_callback()
  {
    $value = get_option("cpc_parish_office_address");
  ?>
    <textarea
      name="cpc_parish_office_address"
      rows="4"
      placeholder="22 <?php esc_attr_e("Office Street, Springfield", "catholic-parish-core"); ?>"><?php echo esc_textarea($value); ?></textarea>
  <?php
  }

  // Office Hours
  register_setting(
    "cpc_parish_details",
    "cpc_parish_office_hours",
    array(
      "type" => "string",
      "description" => "Parish office opening hours",
      "sanitize_callback" => "sanitize_textarea_field",
    )
  );

  add_settings_field(
    "cpc_parish_office_hours",
    __("Office Opening Hours", "catholic-parish-core"),
    "cpc_parish_office_hours_field_callback",
    "cpc-parish-details",
    "cpc_parish_details_section"
  );

  function cpc_parish_office_hours_field_callback()
  {
    $value = get_option("cpc_parish_office_hours");
  ?>
    <textarea
      name="cpc_parish_office_hours"
      rows="4"
      placeholder="<?php echo esc_attr__("Monday", "catholic-parish-core") . "-" . esc_attr__("Friday", "catholic-parish-core"); ?> 9:00-13:00"><?php echo esc_textarea($value); ?></textarea>
<?php
  }
}
