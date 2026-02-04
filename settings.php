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
 * Lucent theme settings.
 *
 * @package    theme_lucent
 * @copyright  2025 Lucent Theme
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    $settings = new theme_boost_admin_settingspage_tabs('themesettinglucent', get_string('configtitle', 'theme_lucent'));

    // ── General Tab ──────────────────────────────────────────
    $page = new admin_settingpage('theme_lucent_general', get_string('generalsettings', 'theme_lucent'));

    // Brand colour.
    $name = 'theme_lucent/brandcolor';
    $title = get_string('brandcolor', 'theme_lucent');
    $description = get_string('brandcolor_desc', 'theme_lucent');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#6366f1');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Secondary colour.
    $name = 'theme_lucent/secondarycolor';
    $title = get_string('secondarycolor', 'theme_lucent');
    $description = get_string('secondarycolor_desc', 'theme_lucent');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#64748b');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Success colour.
    $name = 'theme_lucent/successcolor';
    $title = get_string('successcolor', 'theme_lucent');
    $description = get_string('successcolor_desc', 'theme_lucent');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#10b981');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // ── Appearance Tab ───────────────────────────────────────
    $page = new admin_settingpage('theme_lucent_appearance', get_string('appearance', 'theme_lucent'));

    // Logo.
    $name = 'theme_lucent/logo';
    $title = get_string('logo', 'theme_lucent');
    $description = get_string('logo_desc', 'theme_lucent');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Compact logo.
    $name = 'theme_lucent/logocompact';
    $title = get_string('logocompact', 'theme_lucent');
    $description = get_string('logocompact_desc', 'theme_lucent');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logocompact');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Favicon.
    $name = 'theme_lucent/favicon';
    $title = get_string('favicon', 'theme_lucent');
    $description = get_string('favicon_desc', 'theme_lucent');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0,
        ['maxfiles' => 1, 'accepted_types' => ['.ico', '.png']]);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dark mode toggle.
    $name = 'theme_lucent/darkmode';
    $title = get_string('darkmode', 'theme_lucent');
    $description = get_string('darkmode_desc', 'theme_lucent');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    $settings->add($page);

    // ── Login Tab ────────────────────────────────────────────
    $page = new admin_settingpage('theme_lucent_login', get_string('loginsettings', 'theme_lucent'));

    // Login background.
    $name = 'theme_lucent/loginbg';
    $title = get_string('loginbg', 'theme_lucent');
    $description = get_string('loginbg_desc', 'theme_lucent');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbg');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Login logo.
    $name = 'theme_lucent/loginlogo';
    $title = get_string('loginlogo', 'theme_lucent');
    $description = get_string('loginlogo_desc', 'theme_lucent');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginlogo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Login heading.
    $name = 'theme_lucent/loginheading';
    $title = get_string('loginheading', 'theme_lucent');
    $description = get_string('loginheading_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description,
        get_string('loginheading_default', 'theme_lucent'));
    $page->add($setting);

    // Login subheading.
    $name = 'theme_lucent/loginsubheading';
    $title = get_string('loginsubheading', 'theme_lucent');
    $description = get_string('loginsubheading_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description,
        get_string('loginsubheading_default', 'theme_lucent'));
    $page->add($setting);

    $settings->add($page);

    // ── Footer Tab ───────────────────────────────────────────
    $page = new admin_settingpage('theme_lucent_footer', get_string('footersettings', 'theme_lucent'));

    // Footer text.
    $name = 'theme_lucent/footertext';
    $title = get_string('footertext', 'theme_lucent');
    $description = get_string('footertext_desc', 'theme_lucent');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $page->add($setting);

    $settings->add($page);

    // ── Advanced Tab ─────────────────────────────────────────
    $page = new admin_settingpage('theme_lucent_advanced', get_string('advancedsettings', 'theme_lucent'));

    // Custom SCSS.
    $name = 'theme_lucent/customscss';
    $title = get_string('customscss', 'theme_lucent');
    $description = get_string('customscss_desc', 'theme_lucent');
    $setting = new admin_setting_scsscode($name, $title, $description, '', PARAM_RAW);
    $page->add($setting);

    // Background image.
    $name = 'theme_lucent/backgroundimage';
    $title = get_string('backgroundimage', 'theme_lucent');
    $description = get_string('backgroundimage_desc', 'theme_lucent');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}
