# 🔌 Catholic Parish Core

This project is a **companion WordPress plugin** built to provide the core features for the Catholic Parish theme. Separating certain features follows WordPress best practises, ensures content portability and stops data loss if the user decides to switch to another theme.

⚠️ **Designed to work with the [Catholic Parish WordPress Theme](https://github.com/jamiewilliamsxyz/catholic-parish-wordpress-theme)** _- The theme README has a demo site, more images and covers the entire project in depth, both theme and plugin_

## 🧰 Tech Stack

![WordPress](https://img.shields.io/badge/WordPress-%23117AC9.svg?style=for-the-badge&logo=WordPress&logoColor=white) <br />
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) <br />
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white) <br />
![CSS](https://img.shields.io/badge/css-%23663399.svg?style=for-the-badge&logo=css&logoColor=white)

## 📌 Purpose

- Provides **structured CPTs and taxonomies** for Catholic parish needs
- Allows **portability of content** and reduces dependency of a single theme
- Follows **best security practices** when handling user input, nonce verification and with capability checks

## 🚀 Features

### Custom Post Types

- Announcement
- Service
- Newsletter
- Parish Staff
- Church Group
  _Each comes with its own custom Meta Boxes_

### Custom Taxonomies

- Parish Staff Type
- Church Group Type

### Shortcodes

- `[parish_phone]`
- `[parish_email]`
- `[parish_church_address]`
- `[parish_office_address]`
- `[parish_office_hours]`
- `[parish_details]`

### Hook & APIs Used

- Action hook for admin notice when the theme is missing
- Filter hook to replace "Add CPT" placeholder text
- WordPress Settings and Options APIs for Parish Details settings page

### Security Practices

- Input sanitisation and output escaping
- Capability checks
- Nonce verification for handling contact form submissions

### Installation

1. Download this repository
2. Rename the folder to `catholic-parish-core`
3. Upload to WordPress plugins
4. Activate the plugin via WordPress

## 🖼️ Screenshots

### Add Parish Staff - Custom Post Type Admin UI

<img src="./assets/images/screenshots/add-parish-staff.png" alt="Admin UI for adding a Parish Staff custom post type with custom meta boxes" width="800" />

### Parish Details - Custom Settings Page

<img src="./assets/images/screenshots/parish-details-settings.png" alt="Custom admin settings page for entering Parish Details" width="600" />
