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
 * Lucent theme settings — premium theme configuration panel.
 *
 * @package    theme_lucent
 * @copyright  2025 Lucent Theme
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    $settings = new theme_boost_admin_settingspage_tabs('themesettinglucent', get_string('configtitle', 'theme_lucent'));

    // ══════════════════════════════════════════════════════════════
    // ── GENERAL TAB ─────────────────────────────────────────────
    // ══════════════════════════════════════════════════════════════
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

    // Custom font selection.
    $name = 'theme_lucent/fontfamily';
    $title = get_string('fontfamily', 'theme_lucent');
    $description = get_string('fontfamily_desc', 'theme_lucent');
    $choices = [
        'inter' => 'Inter (Default)',
        'poppins' => 'Poppins',
        'dm-sans' => 'DM Sans',
        'nunito' => 'Nunito',
        'plus-jakarta' => 'Plus Jakarta Sans',
        'outfit' => 'Outfit',
        'figtree' => 'Figtree',
        'system' => 'System Default',
    ];
    $setting = new admin_setting_configselect($name, $title, $description, 'inter', $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Heading font selection.
    $name = 'theme_lucent/headingfont';
    $title = get_string('headingfont', 'theme_lucent');
    $description = get_string('headingfont_desc', 'theme_lucent');
    $choices = [
        'same' => 'Same as body font',
        'inter' => 'Inter',
        'poppins' => 'Poppins',
        'dm-sans' => 'DM Sans',
        'plus-jakarta' => 'Plus Jakarta Sans',
        'outfit' => 'Outfit',
        'cabinet-grotesk' => 'Cabinet Grotesk',
    ];
    $setting = new admin_setting_configselect($name, $title, $description, 'same', $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // ══════════════════════════════════════════════════════════════
    // ── APPEARANCE TAB ──────────────────────────────────────────
    // ══════════════════════════════════════════════════════════════
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

    // Header style.
    $name = 'theme_lucent/headerstyle';
    $title = get_string('headerstyle', 'theme_lucent');
    $description = get_string('headerstyle_desc', 'theme_lucent');
    $choices = [
        'glass' => get_string('headerstyle_glass', 'theme_lucent'),
        'solid' => get_string('headerstyle_solid', 'theme_lucent'),
        'transparent' => get_string('headerstyle_transparent', 'theme_lucent'),
    ];
    $setting = new admin_setting_configselect($name, $title, $description, 'glass', $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Course card style.
    $name = 'theme_lucent/coursecardstyle';
    $title = get_string('coursecardstyle', 'theme_lucent');
    $description = get_string('coursecardstyle_desc', 'theme_lucent');
    $choices = [
        'rounded' => get_string('coursecardstyle_rounded', 'theme_lucent'),
        'sharp' => get_string('coursecardstyle_sharp', 'theme_lucent'),
        'gradient' => get_string('coursecardstyle_gradient', 'theme_lucent'),
    ];
    $setting = new admin_setting_configselect($name, $title, $description, 'rounded', $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dark mode toggle.
    $name = 'theme_lucent/darkmode';
    $title = get_string('darkmode', 'theme_lucent');
    $description = get_string('darkmode_desc', 'theme_lucent');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    $settings->add($page);

    // ══════════════════════════════════════════════════════════════
    // ── LOGIN TAB ───────────────────────────────────────────────
    // ══════════════════════════════════════════════════════════════
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

    // ══════════════════════════════════════════════════════════════
    // ── MOBILE TAB ──────────────────────────────────────────────
    // ══════════════════════════════════════════════════════════════
    $page = new admin_settingpage('theme_lucent_mobile', get_string('mobilesettings', 'theme_lucent'));

    // Mobile bottom nav toggle.
    $name = 'theme_lucent/mobilebottomnav';
    $title = get_string('mobilebottomnav', 'theme_lucent');
    $description = get_string('mobilebottomnav_desc', 'theme_lucent');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // ══════════════════════════════════════════════════════════════
    // ── FOOTER TAB ──────────────────────────────────────────────
    // ══════════════════════════════════════════════════════════════
    $page = new admin_settingpage('theme_lucent_footer', get_string('footersettings', 'theme_lucent'));

    // Footer columns.
    $name = 'theme_lucent/footercolumns';
    $title = get_string('footercolumns', 'theme_lucent');
    $description = get_string('footercolumns_desc', 'theme_lucent');
    $choices = [
        '1' => '1 column',
        '2' => '2 columns',
        '3' => '3 columns',
        '4' => '4 columns',
    ];
    $setting = new admin_setting_configselect($name, $title, $description, '4', $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer text.
    $name = 'theme_lucent/footertext';
    $title = get_string('footertext', 'theme_lucent');
    $description = get_string('footertext_desc', 'theme_lucent');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $page->add($setting);

    $settings->add($page);

    // ══════════════════════════════════════════════════════════════
    // ── SOCIAL MEDIA TAB ────────────────────────────────────────
    // ══════════════════════════════════════════════════════════════
    $page = new admin_settingpage('theme_lucent_social', get_string('socialsettings', 'theme_lucent'));

    // Facebook.
    $name = 'theme_lucent/facebook';
    $title = get_string('facebook', 'theme_lucent');
    $description = get_string('facebook_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $page->add($setting);

    // Twitter / X.
    $name = 'theme_lucent/twitter';
    $title = get_string('twitter', 'theme_lucent');
    $description = get_string('twitter_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $page->add($setting);

    // Instagram.
    $name = 'theme_lucent/instagram';
    $title = get_string('instagram', 'theme_lucent');
    $description = get_string('instagram_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $page->add($setting);

    // LinkedIn.
    $name = 'theme_lucent/linkedin';
    $title = get_string('linkedin', 'theme_lucent');
    $description = get_string('linkedin_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $page->add($setting);

    // YouTube.
    $name = 'theme_lucent/youtube';
    $title = get_string('youtube', 'theme_lucent');
    $description = get_string('youtube_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $page->add($setting);

    $settings->add($page);

    // ══════════════════════════════════════════════════════════════
    // ── ADVANCED TAB ────────────────────────────────────────────
    // ══════════════════════════════════════════════════════════════
    $page = new admin_settingpage('theme_lucent_advanced', get_string('advancedsettings', 'theme_lucent'));

    // Custom SCSS.
    $name = 'theme_lucent/customscss';
    $title = get_string('customscss', 'theme_lucent');
    $description = get_string('customscss_desc', 'theme_lucent');
    $setting = new admin_setting_scsscode($name, $title, $description, '', PARAM_RAW);
    $page->add($setting);

    // Custom CSS injection (raw CSS, not SCSS).
    $name = 'theme_lucent/customcss';
    $title = get_string('customcss', 'theme_lucent');
    $description = get_string('customcss_desc', 'theme_lucent');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $page->add($setting);

    // Google Analytics ID.
    $name = 'theme_lucent/googleanalytics';
    $title = get_string('googleanalytics', 'theme_lucent');
    $description = get_string('googleanalytics_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, '');
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
