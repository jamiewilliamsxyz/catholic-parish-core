<?php

add_action("template_redirect", "cpc_handle_contact_form");

function cpc_handle_contact_form()
{
  if (empty($_POST["cpc_contact_form_submitted"])) return;

  if (
    !isset($_POST["cpc_contact_form_nonce"]) ||
    !wp_verify_nonce($_POST["cpc_contact_form_nonce"], "cpc_send_contact_email")
  ) {
    cpc_redirect_with_status("error");
  }

  $contact_name = sanitize_text_field($_POST["contact_name"]);
  $contact_email = sanitize_email($_POST["contact_email"]);
  $contact_subject = sanitize_text_field($_POST["contact_subject"]);
  $contact_message = sanitize_textarea_field($_POST["contact_message"]);

  if (!$contact_name || !$contact_email || !$contact_subject || !$contact_message) {
    cpc_redirect_with_status("error");
  }

  $to = get_option("admin_email");
  $body = "Name: $contact_name\nEmail: $contact_email\n\nMessage:\n$contact_message";
  $headers = "Reply-To: $contact_name <$contact_email>";

  $email_sent = wp_mail($to, $contact_subject, $body, $headers);

  if ($email_sent) {
    cpc_redirect_with_status("success");
  } else {
    cpc_redirect_with_status("error");
  }
}

// Redirect back to referring page with form submission status
function cpc_redirect_with_status($status) // "success" or "error"
{
  wp_redirect(add_query_arg("cpc_contact_status", $status, wp_get_referer()), 303);
  exit;
}
