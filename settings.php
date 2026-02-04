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
 * Lucent theme settings — no-code customization panel.
 *
 * @package    theme_lucent
 * @copyright  2025 Lucent Theme
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    // ═══════════════════════════════════════════════════════
    // TAB 1: GENERAL
    // ═══════════════════════════════════════════════════════

    $page = new admin_settingpage('theme_lucent_general', get_string('generalsettings', 'theme_lucent'));

    // ── Brand Color ──
    $name = 'theme_lucent/brandcolor';
    $title = get_string('brandcolor', 'theme_lucent');
    $description = get_string('brandcolor_desc', 'theme_lucent');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#6366f1');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // ── Secondary Color ──
    $name = 'theme_lucent/secondarycolor';
    $title = get_string('secondarycolor', 'theme_lucent');
    $description = get_string('secondarycolor_desc', 'theme_lucent');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#64748b');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // ── Success Color ──
    $name = 'theme_lucent/successcolor';
    $title = get_string('successcolor', 'theme_lucent');
    $description = get_string('successcolor_desc', 'theme_lucent');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#10b981');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // ── Color Preset ──
    $name = 'theme_lucent/colorpreset';
    $title = get_string('colorpreset', 'theme_lucent');
    $description = get_string('colorpreset_desc', 'theme_lucent');
    $choices = [
        'indigo' => get_string('preset_indigo', 'theme_lucent'),
        'blue' => get_string('preset_blue', 'theme_lucent'),
        'emerald' => get_string('preset_emerald', 'theme_lucent'),
        'rose' => get_string('preset_rose', 'theme_lucent'),
        'amber' => get_string('preset_amber', 'theme_lucent'),
        'violet' => get_string('preset_violet', 'theme_lucent'),
        'custom' => get_string('preset_custom', 'theme_lucent'),
    ];
    $setting = new admin_setting_configselect($name, $title, $description, 'indigo', $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // ── Font Family ──
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

    // ── Heading Font ──
    $name = 'theme_lucent/headingfont';
    $title = get_string('headingfont', 'theme_lucent');
    $description = get_string('headingfont_desc', 'theme_lucent');
    $choices = [
        'same' => get_string('sameasprimary', 'theme_lucent'),
        'inter' => 'Inter',
        'poppins' => 'Poppins',
        'dm-sans' => 'DM Sans',
        'plus-jakarta' => 'Plus Jakarta Sans',
        'outfit' => 'Outfit',
    ];
    $setting = new admin_setting_configselect($name, $title, $description, 'same', $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // ── Dark Mode ──
    $name = 'theme_lucent/enabledarkmode';
    $title = get_string('enabledarkmode', 'theme_lucent');
    $description = get_string('enabledarkmode_desc', 'theme_lucent');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);


    // ═══════════════════════════════════════════════════════
    // TAB 2: BRANDING
    // ═══════════════════════════════════════════════════════

    $page = new admin_settingpage('theme_lucent_branding', get_string('brandingsettings', 'theme_lucent'));

    // ── Logo ──
    $name = 'theme_lucent/logo';
    $title = get_string('logo', 'theme_lucent');
    $description = get_string('logo_desc', 'theme_lucent');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // ── Compact Logo (Navbar) ──
    $name = 'theme_lucent/logocompact';
    $title = get_string('logocompact', 'theme_lucent');
    $description = get_string('logocompact_desc', 'theme_lucent');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logocompact');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // ── Favicon ──
    $name = 'theme_lucent/favicon';
    $title = get_string('favicon', 'theme_lucent');
    $description = get_string('favicon_desc', 'theme_lucent');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0, ['accepted_types' => ['.ico', '.png']]);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // ── Login Logo ──
    $name = 'theme_lucent/loginlogo';
    $title = get_string('loginlogo', 'theme_lucent');
    $description = get_string('loginlogo_desc', 'theme_lucent');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginlogo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);


    // ═══════════════════════════════════════════════════════
    // TAB 3: HERO / FRONTPAGE
    // ═══════════════════════════════════════════════════════

    $page = new admin_settingpage('theme_lucent_hero', get_string('herosettings', 'theme_lucent'));

    // ── Hero Badge Text ──
    $name = 'theme_lucent/herobadge';
    $title = get_string('herobadge', 'theme_lucent');
    $description = get_string('herobadge_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, '🎓 Online Learning Platform');
    $page->add($setting);

    // ── Hero Title ──
    $name = 'theme_lucent/herotitle';
    $title = get_string('herotitle', 'theme_lucent');
    $description = get_string('herotitle_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, 'Learn Without Limits');
    $page->add($setting);

    // ── Hero Highlight Word ──
    $name = 'theme_lucent/herohighlight';
    $title = get_string('herohighlight', 'theme_lucent');
    $description = get_string('herohighlight_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, 'Limits');
    $page->add($setting);

    // ── Hero Subtitle ──
    $name = 'theme_lucent/herosubtitle';
    $title = get_string('herosubtitle', 'theme_lucent');
    $description = get_string('herosubtitle_desc', 'theme_lucent');
    $setting = new admin_setting_configtextarea($name, $title, $description,
        'Discover courses taught by industry experts. Build skills that matter. Transform your career.');
    $page->add($setting);

    // ── Hero Background Image ──
    $name = 'theme_lucent/heroimage';
    $title = get_string('heroimage', 'theme_lucent');
    $description = get_string('heroimage_desc', 'theme_lucent');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'heroimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // ── Primary CTA Text ──
    $name = 'theme_lucent/heroctaText';
    $title = get_string('heroctatext', 'theme_lucent');
    $description = get_string('heroctatext_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, 'Explore Courses');
    $page->add($setting);

    // ── Secondary CTA Text ──
    $name = 'theme_lucent/herocta2text';
    $title = get_string('herocta2text', 'theme_lucent');
    $description = get_string('herocta2text_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, 'Get Started Free');
    $page->add($setting);

    // ── Show Stats ──
    $name = 'theme_lucent/showherostats';
    $title = get_string('showherostats', 'theme_lucent');
    $description = get_string('showherostats_desc', 'theme_lucent');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    // ── Show Categories Section ──
    $name = 'theme_lucent/showcategories';
    $title = get_string('showcategories', 'theme_lucent');
    $description = get_string('showcategories_desc', 'theme_lucent');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    // ── Courses Per Row ──
    $name = 'theme_lucent/coursesperrow';
    $title = get_string('coursesperrow', 'theme_lucent');
    $description = get_string('coursesperrow_desc', 'theme_lucent');
    $choices = ['3' => '3', '4' => '4', '6' => '6'];
    $setting = new admin_setting_configselect($name, $title, $description, '3', $choices);
    $page->add($setting);

    $settings->add($page);


    // ═══════════════════════════════════════════════════════
    // TAB 4: LOGIN PAGE
    // ═══════════════════════════════════════════════════════

    $page = new admin_settingpage('theme_lucent_login', get_string('loginsettings', 'theme_lucent'));

    // ── Login Heading ──
    $name = 'theme_lucent/loginheading';
    $title = get_string('loginheading', 'theme_lucent');
    $description = get_string('loginheading_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, 'Welcome back');
    $page->add($setting);

    // ── Login Subheading ──
    $name = 'theme_lucent/loginsubheading';
    $title = get_string('loginsubheading', 'theme_lucent');
    $description = get_string('loginsubheading_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, 'Sign in to your account to continue');
    $page->add($setting);

    // ── Brand Panel Headline ──
    $name = 'theme_lucent/loginbrandheadline';
    $title = get_string('loginbrandheadline', 'theme_lucent');
    $description = get_string('loginbrandheadline_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, 'Start your learning journey');
    $page->add($setting);

    // ── Brand Panel Tagline ──
    $name = 'theme_lucent/loginbrandtagline';
    $title = get_string('loginbrandtagline', 'theme_lucent');
    $description = get_string('loginbrandtagline_desc', 'theme_lucent');
    $setting = new admin_setting_configtextarea($name, $title, $description,
        'Access thousands of courses, connect with expert instructors, and build skills that matter.');
    $page->add($setting);

    // ── Login Background Image ──
    $name = 'theme_lucent/loginbg';
    $title = get_string('loginbg', 'theme_lucent');
    $description = get_string('loginbg_desc', 'theme_lucent');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbg');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);


    // ═══════════════════════════════════════════════════════
    // TAB 5: HEADER / NAVBAR
    // ═══════════════════════════════════════════════════════

    $page = new admin_settingpage('theme_lucent_header', get_string('headersettings', 'theme_lucent'));

    // ── Header Style ──
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

    // ── Course Card Style ──
    $name = 'theme_lucent/coursecardstyle';
    $title = get_string('coursecardstyle', 'theme_lucent');
    $description = get_string('coursecardstyle_desc', 'theme_lucent');
    $choices = [
        'rounded' => get_string('cardstyle_rounded', 'theme_lucent'),
        'sharp' => get_string('cardstyle_sharp', 'theme_lucent'),
        'gradient' => get_string('cardstyle_gradient', 'theme_lucent'),
    ];
    $setting = new admin_setting_configselect($name, $title, $description, 'rounded', $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // ── Mobile Bottom Nav ──
    $name = 'theme_lucent/mobilebottomnav';
    $title = get_string('mobilebottomnav', 'theme_lucent');
    $description = get_string('mobilebottomnav_desc', 'theme_lucent');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);


    // ═══════════════════════════════════════════════════════
    // TAB 6: FOOTER
    // ═══════════════════════════════════════════════════════

    $page = new admin_settingpage('theme_lucent_footer', get_string('footersettings', 'theme_lucent'));

    // ── Footer Description ──
    $name = 'theme_lucent/footerdesc';
    $title = get_string('footerdesc', 'theme_lucent');
    $description = get_string('footerdesc_desc', 'theme_lucent');
    $setting = new admin_setting_configtextarea($name, $title, $description, 'Empowering learners worldwide with quality education.');
    $page->add($setting);

    // ── Footer Links Column 1 Title ──
    $name = 'theme_lucent/footercol1title';
    $title = get_string('footercol1title', 'theme_lucent');
    $description = get_string('footercol1title_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, 'Quick Links');
    $page->add($setting);

    // ── Footer Links Column 1 ──
    $name = 'theme_lucent/footercol1';
    $title = get_string('footercol1', 'theme_lucent');
    $description = get_string('footercol1_desc', 'theme_lucent');
    $default = "About Us|/about\nCourses|/course\nContact|/contact\nFAQ|/faq";
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    // ── Footer Links Column 2 Title ──
    $name = 'theme_lucent/footercol2title';
    $title = get_string('footercol2title', 'theme_lucent');
    $description = get_string('footercol2title_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, 'Support');
    $page->add($setting);

    // ── Footer Links Column 2 ──
    $name = 'theme_lucent/footercol2';
    $title = get_string('footercol2', 'theme_lucent');
    $description = get_string('footercol2_desc', 'theme_lucent');
    $default = "Help Center|/help\nPrivacy Policy|/privacy\nTerms of Service|/terms";
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    // ── Social Links ──
    $socials = [
        'facebook' => ['Facebook', 'https://facebook.com/'],
        'twitter' => ['Twitter / X', 'https://twitter.com/'],
        'instagram' => ['Instagram', 'https://instagram.com/'],
        'linkedin' => ['LinkedIn', 'https://linkedin.com/'],
        'youtube' => ['YouTube', 'https://youtube.com/'],
    ];

    foreach ($socials as $key => $info) {
        $name = 'theme_lucent/social' . $key;
        $title = get_string('social' . $key, 'theme_lucent');
        $description = get_string('social_desc', 'theme_lucent', $info[0]);
        $setting = new admin_setting_configtext($name, $title, $description, '');
        $page->add($setting);
    }

    // ── Copyright Text ──
    $name = 'theme_lucent/copyright';
    $title = get_string('copyright', 'theme_lucent');
    $description = get_string('copyright_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $page->add($setting);

    $settings->add($page);


    // ═══════════════════════════════════════════════════════
    // TAB 7: ADVANCED
    // ═══════════════════════════════════════════════════════

    $page = new admin_settingpage('theme_lucent_advanced', get_string('advancedsettings', 'theme_lucent'));

    // ── Custom SCSS ──
    $name = 'theme_lucent/customscss';
    $title = get_string('customscss', 'theme_lucent');
    $description = get_string('customscss_desc', 'theme_lucent');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // ── Custom CSS ──
    $name = 'theme_lucent/customcss';
    $title = get_string('customcss', 'theme_lucent');
    $description = get_string('customcss_desc', 'theme_lucent');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // ── Google Analytics ──
    $name = 'theme_lucent/googleanalytics';
    $title = get_string('googleanalytics', 'theme_lucent');
    $description = get_string('googleanalytics_desc', 'theme_lucent');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $page->add($setting);

    // ── Head Injection (JS/HTML) ──
    $name = 'theme_lucent/headinjection';
    $title = get_string('headinjection', 'theme_lucent');
    $description = get_string('headinjection_desc', 'theme_lucent');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $page->add($setting);

    $settings->add($page);
}
