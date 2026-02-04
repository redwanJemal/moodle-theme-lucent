<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Lucent maintenance layout — branded maintenance mode page.
 *
 * @package    theme_lucent
 * @copyright  2025 Lucent Theme
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$bodyattributes = $OUTPUT->body_attributes(['lucent-maintenance-page']);

echo $OUTPUT->doctype(); ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php echo $OUTPUT->standard_head_html(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body <?php echo $bodyattributes; ?>>

<?php echo $OUTPUT->standard_top_of_body_html(); ?>

<div class="lucent-maintenance-container">
    <div class="lucent-maintenance-bg">
        <div class="lucent-error-orb lucent-error-orb-1"></div>
        <div class="lucent-error-orb lucent-error-orb-2"></div>
        <div class="lucent-error-grid"></div>
    </div>

    <div class="lucent-maintenance-content">
        <div class="lucent-maintenance-spinner">
            <div class="lucent-spinner-ring"></div>
            <div class="lucent-spinner-ring lucent-spinner-ring-2"></div>
            <svg class="lucent-spinner-icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
            </svg>
        </div>

        <h1 class="lucent-maintenance-title"><?php echo get_string('maintenance_title', 'theme_lucent'); ?></h1>
        <p class="lucent-maintenance-message"><?php echo get_string('maintenance_message', 'theme_lucent'); ?></p>

        <div class="lucent-maintenance-main-content">
            <?php echo $OUTPUT->main_content(); ?>
        </div>

        <div class="lucent-maintenance-footer">
            <span>© <?php echo date('Y'); ?> <?php echo format_string($SITE->shortname); ?></span>
        </div>
    </div>
</div>

<?php echo $OUTPUT->standard_end_of_body_html(); ?>

</body>
</html>
