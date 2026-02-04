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
 * Lucent theme lib.
 *
 * @package    theme_lucent
 * @copyright  2025 Lucent Theme
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Returns the main SCSS content.
 */
function theme_lucent_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';

    // Pre-content: variables and imports.
    $pre = file_get_contents($CFG->dirroot . '/theme/lucent/scss/pre.scss');
    // Main content.
    $main = file_get_contents($CFG->dirroot . '/theme/lucent/scss/main.scss');
    // Post-content.
    $post = file_get_contents($CFG->dirroot . '/theme/lucent/scss/post.scss');

    // Combine with boost's preset.
    $scss .= $pre;

    // Get boost's default SCSS.
    $boostscss = theme_boost_get_main_scss_content($theme);
    $scss .= $boostscss;

    $scss .= $main;
    $scss .= $post;

    return $scss;
}

/**
 * Get extra SCSS.
 */
function theme_lucent_get_extra_scss($theme) {
    $content = '';

    // Custom SCSS from settings.
    if (!empty($theme->settings->customscss)) {
        $content .= $theme->settings->customscss;
    }

    return $content;
}

/**
 * Get pre SCSS.
 */
function theme_lucent_get_pre_scss($theme) {
    $scss = '';
    $configurable = [
        'brandcolor' => ['primary'],
        'secondarycolor' => ['secondary'],
        'successcolor' => ['success'],
    ];

    foreach ($configurable as $configkey => $targets) {
        $value = isset($theme->settings->{$configkey}) ? $theme->settings->{$configkey} : null;
        if (empty($value)) {
            continue;
        }
        foreach ($targets as $target) {
            $scss .= '$' . $target . ': ' . $value . ";\n";
        }
    }

    return $scss;
}

/**
 * Serves any files associated with the theme settings.
 */
function theme_lucent_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = []) {
    if ($context->contextlevel == CONTEXT_SYSTEM && in_array($filearea, [
        'loginbg', 'logo', 'logocompact', 'favicon', 'heroimage',
        'backgroundimage', 'loginlogo',
    ])) {
        $theme = theme_config::load('lucent');
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    }
    send_file_not_found();
}
