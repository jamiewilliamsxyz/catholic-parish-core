<?php

if (!defined("ABSPATH")) {
  exit;
}

// Register meta boxes
add_action("add_meta_boxes", "cpc_add_meta_boxes");

function cpc_add_meta_boxes()
{
  add_meta_box(
    "cpc_newsletter_id",
    "Newsletter Info",
    "cpc_newsletter_meta_box",
    "cpc_newsletter",
    "normal"
  );

  add_meta_box(
    "cpc_staff_id",
    "Parish Staff Member Info",
    "cpc_staff_meta_box",
    "cpc_staff_member",
    "normal"
  );

  add_meta_box(
    "cpc_group_id",
    "Church Group Info",
    "cpc_group_meta_box",
    "cpc_church_group",
    "normal"
  );

  add_meta_box(
    "cpc_service_id",
    "Service Info",
    "cpc_service_meta_box",
    "cpc_service",
    "normal"
  );
}

// Meta box callbacks
function cpc_newsletter_meta_box($post)
{
  $pdf_file = get_post_meta($post->ID, "pdf_file", true);

  wp_nonce_field("cpc_save_newsletter", "cpc_newsletter_nonce");

?>
  <div class="cpc-meta-box">
    <div class="cpc-meta-box-field">
      <label for="pdf_file"><?php esc_html_e("PDF File URL", "catholic-parish-core") ?></label>
      <input type="url" name="pdf_file" required placeholder="https://example.com/file.pdf" value="<?php echo esc_attr($pdf_file); ?>" />
    </div>
  </div>
<?php
}
function cpc_staff_meta_box($post)
{
  $role = get_post_meta($post->ID, "role", true);
  $about = get_post_meta($post->ID, "about", true);
  $email = get_post_meta($post->ID, "email", true);
  $phone = get_post_meta($post->ID, "phone", true);

  wp_nonce_field("cpc_save_staff", "cpc_staff_nonce");

?>
  <div class="cpc-meta-box">
    <div class="cpc-meta-box-field">
      <label for="role"><?php esc_html_e("Role", "catholic-parish-core") ?></label>
      <input
        type="text"
        name="role"
        placeholder="<?php echo esc_attr__("Assistant Priest", "catholic-parish-core") ?>"
        value="<?php echo esc_attr($role); ?>" />
    </div>

    <div class="cpc-meta-box-field">
      <label for="about"><?php esc_html_e("About", "catholic-parish-core") ?></label>
      <textarea
        name="about"
        rows="8"
        placeholder="<?php echo esc_attr__("Brief bio of the staff/clergy member", "catholic-parish-core") ?>"><?php echo esc_textarea($about); ?></textarea>
    </div>

    <div class="cpc-meta-box-field">
      <label for="email"><?php esc_html_e("Email", "catholic-parish-core") ?></label>
      <input type="email" name="email" placeholder="john.doe@gmail.com" value="<?php echo esc_attr($email); ?>" />
    </div>

    <div class="cpc-meta-box-field">
      <label for="phone"><?php esc_html_e("Phone", "catholic-parish-core") ?></label>
      <input type="text" name="phone" placeholder="+44 1234 567890" value="<?php echo esc_attr($phone); ?>" />
    </div>
  </div>
<?php
}

function cpc_group_meta_box($post)
{
  $leader_name = get_post_meta($post->ID, "leader_name", true);
  $leader_email = get_post_meta($post->ID, "leader_email", true);
  $leader_phone = get_post_meta($post->ID, "leader_phone", true);
  $description = get_post_meta($post->ID, "description", true);
  $meeting_time = get_post_meta($post->ID, "meeting_time", true);
  $location = get_post_meta($post->ID, "location", true);

  wp_nonce_field("cpc_save_group", "cpc_group_nonce");

?>
  <div class="cpc-meta-box">
    <div class="cpc-meta-box-field">
      <label for="leader_name"><?php esc_html_e("Leader Name", "catholic-parish-core") ?></label>
      <input type="text" name="leader_name" placeholder="John Doe" value="<?php echo esc_attr($leader_name); ?>" />
    </div>

    <div class="cpc-meta-box-field">
      <label for="leader_email"><?php esc_html_e("Leader Email", "catholic-parish-core") ?></label>
      <input type="email" name="leader_email" placeholder="john.doe@gmail.com" value="<?php echo esc_attr($leader_email); ?>" />
    </div>

    <div class="cpc-meta-box-field">
      <label for="leader_phone"><?php esc_html_e("Leader Phone", "catholic-parish-core") ?></label>
      <input type="text" name="leader_phone" placeholder="+44 1234 567890" value="<?php echo esc_attr($leader_phone); ?>" />
    </div>

    <div class="cpc-meta-box-field">
      <label for="description"><?php esc_html_e("Description", "catholic-parish-core") ?></label>
      <textarea
        name="description"
        rows="8"
        placeholder="<?php echo esc_attr__("Description of the church group", "catholic-parish-core") ?>"><?php echo esc_textarea($description); ?></textarea>
    </div>

    <div class="cpc-meta-box-field">
      <label for="meeting_time"><?php esc_html_e("Meeting Time", "catholic-parish-core") ?></label>
      <input
        type="text"
        name="meeting_time"
        placeholder="18:00 <?php echo esc_attr__("every Tuesday", "catholic-parish-core") ?>"
        value="<?php echo esc_attr($meeting_time); ?>" />
    </div>

    <div class="cpc-meta-box-field">
      <label for="location"><?php esc_html_e("Location", "catholic-parish-core") ?></label>
      <input
        type="text"
        name="location"
        placeholder="<?php echo esc_attr__("Church hall", "catholic-parish-core") ?>"
        value="<?php echo esc_attr($location); ?>" />
    </div>
  </div>
<?php
}

function cpc_service_meta_box($post)
{
  $service_description = get_post_meta($post->ID, "service_description", true);
  $service_occurrences = get_post_meta($post->ID, "service_occurrences", true);

  wp_nonce_field("cpc_save_service", "cpc_service_nonce");

?>
  <div class="cpc-meta-box">
    <div class="cpc-meta-box-field">
      <label for="service_description"><?php esc_html_e("Description", "catholic-parish-core") ?></label>
      <textarea
        name="service_description"
        rows="8"
        placeholder="<?php echo esc_attr__("Description and information about the service", "catholic-parish-core") ?>"><?php echo esc_textarea($service_description); ?></textarea>
    </div>

    <?php
    $service_occ_placeholder = sprintf(
      "%s: 18:00 - 19:00\n%s: 9:30 - 10:00\n%s: 9:30 - 9:55",
      esc_html__("Monday", "catholic-parish-core"),
      esc_html__("Saturday", "catholic-parish-core"),
      esc_html__("Sunday", "catholic-parish-core")
    );
    ?>

    <div class="cpc-meta-box-field">
      <label for="service_occurrences"><?php esc_html_e("Occurrences", "catholic-parish-core") ?></label>
      <textarea
        name="service_occurrences"
        rows="8"
        placeholder="<?php echo esc_attr($service_occ_placeholder) ?>"><?php echo esc_textarea($service_occurrences); ?></textarea>
    </div>
  </div>
<?php
}

// Save meta box data
add_action("save_post", "cpc_save_meta_boxes");

function cpc_save_meta_boxes($post_id)
{
  if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) return;

  // Newsletter
  if (
    isset($_POST["cpc_newsletter_nonce"]) &&
    wp_verify_nonce($_POST["cpc_newsletter_nonce"], "cpc_save_newsletter")
  ) {
    if (isset($_POST["pdf_file"])) {
      update_post_meta(
        $post_id,
        "pdf_file",
        esc_url_raw($_POST["pdf_file"])
      );
    }
  }

  // Parish Staff Member
  if (
    isset($_POST["cpc_staff_nonce"]) &&
    wp_verify_nonce($_POST["cpc_staff_nonce"], "cpc_save_staff")
  ) {
    if (isset($_POST["role"])) {
      update_post_meta(
        $post_id,
        "role",
        sanitize_text_field($_POST["role"])
      );
    }

    if (isset($_POST["about"])) {
      update_post_meta(
        $post_id,
        "about",
        sanitize_textarea_field($_POST["about"])
      );
    }

    if (isset($_POST["email"])) {
      update_post_meta(
        $post_id,
        "email",
        sanitize_email($_POST["email"])
      );
    }

    if (isset($_POST["phone"])) {
      update_post_meta(
        $post_id,
        "phone",
        sanitize_text_field($_POST["phone"])
      );
    }
  }

  // Church group
  if (
    isset($_POST["cpc_group_nonce"]) &&
    wp_verify_nonce($_POST["cpc_group_nonce"], "cpc_save_group")
  ) {
    if (isset($_POST["leader_name"])) {
      update_post_meta(
        $post_id,
        "leader_name",
        sanitize_text_field($_POST["leader_name"])
      );
    }

    if (isset($_POST["leader_email"])) {
      update_post_meta(
        $post_id,
        "leader_email",
        sanitize_email($_POST["leader_email"])
      );
    }

    if (isset($_POST["leader_phone"])) {
      update_post_meta(
        $post_id,
        "leader_phone",
        sanitize_text_field($_POST["leader_phone"])
      );
    }

    if (isset($_POST["description"])) {
      update_post_meta(
        $post_id,
        "description",
        sanitize_textarea_field($_POST["description"])
      );
    }

    if (isset($_POST["meeting_time"])) {
      update_post_meta(
        $post_id,
        "meeting_time",
        sanitize_text_field($_POST["meeting_time"])
      );
    }

    if (isset($_POST["location"])) {
      update_post_meta(
        $post_id,
        "location",
        sanitize_text_field($_POST["location"])
      );
    }
  }

  // Service
  if (
    isset($_POST["cpc_service_nonce"]) &&
    wp_verify_nonce($_POST["cpc_service_nonce"], "cpc_save_service")
  ) {
    if (isset($_POST["service_description"])) {
      update_post_meta(
        $post_id,
        "service_description",
        sanitize_text_field($_POST["service_description"])
      );
    }

    if (isset($_POST["service_occurrences"])) {
      update_post_meta(
        $post_id,
        "service_occurrences",
        wp_kses_post($_POST["service_occurrences"])
      );
    }
  }
}
