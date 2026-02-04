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
 * Lucent theme lib — callback functions for SCSS compilation, file serving, and settings.
 *
 * @package    theme_lucent
 * @copyright  2025 Lucent Theme
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Returns the main SCSS content.
 *
 * @param theme_config $theme The theme config object.
 * @return string SCSS content.
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
 * Get extra SCSS — injected after all other SCSS.
 *
 * @param theme_config $theme The theme config object.
 * @return string Extra SCSS.
 */
function theme_lucent_get_extra_scss($theme) {
    $content = '';

    // Boxed layout.
    $layoutstyle = !empty($theme->settings->layoutstyle) ? $theme->settings->layoutstyle : 'wide';
    if ($layoutstyle === 'boxed') {
        $content .= '
            body { background: #e2e8f0; }
            #page.drawers, #page-wrapper {
                max-width: 1400px;
                margin: 0 auto;
                background: var(--lucent-surface);
                box-shadow: 0 0 40px rgba(0,0,0,0.08);
            }
            body.lucent-dark { background: #0a0f1e; }
            body.lucent-dark #page.drawers,
            body.lucent-dark #page-wrapper {
                box-shadow: 0 0 40px rgba(0,0,0,0.3);
            }
        ';
    }

    // Top bar CSS from settings.
    $topbarbg = !empty($theme->settings->topbarbg) ? $theme->settings->topbarbg : '#0f172a';
    $topbarcolor = !empty($theme->settings->topbarcolor) ? $theme->settings->topbarcolor : '#ffffff';
    $content .= "
        :root {
            --lucent-topbar-bg: {$topbarbg};
            --lucent-topbar-color: {$topbarcolor};
        }
    ";

    // Course list style.
    $courseliststyle = !empty($theme->settings->courseliststyle) ? $theme->settings->courseliststyle : 'grid';
    if ($courseliststyle === 'list') {
        $content .= '
            .lucent-courses-grid {
                grid-template-columns: 1fr !important;
                gap: 1rem;
            }
            .lucent-course-card {
                flex-direction: row !important;
                max-height: 180px;
            }
            .lucent-course-card .lucent-course-image {
                width: 260px;
                min-width: 260px;
                height: auto;
                min-height: 180px;
            }
            .lucent-course-card .lucent-course-body {
                flex: 1;
            }
            .lucent-course-card .lucent-course-footer {
                border-top: none;
                border-left: 1px solid #f1f5f9;
                flex-direction: column;
                justify-content: center;
                padding: 14px;
                min-width: 60px;
            }
            @media (max-width: 768px) {
                .lucent-course-card {
                    flex-direction: column !important;
                    max-height: none;
                }
                .lucent-course-card .lucent-course-image {
                    width: 100%;
                    min-width: unset;
                    height: 160px;
                    min-height: 160px;
                }
                .lucent-course-card .lucent-course-footer {
                    border-left: none;
                    border-top: 1px solid #f1f5f9;
                    flex-direction: row;
                }
            }
        ';
    } elseif ($courseliststyle === 'compact') {
        $content .= '
            .lucent-courses-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)) !important;
                gap: 16px;
            }
            .lucent-course-card .lucent-course-image {
                height: 120px;
            }
            .lucent-course-card .lucent-course-body {
                padding: 12px 14px;
            }
            .lucent-course-card .lucent-course-title {
                font-size: 0.9375rem;
                -webkit-line-clamp: 1;
            }
            .lucent-course-card .lucent-course-desc {
                font-size: 0.75rem;
                -webkit-line-clamp: 1;
            }
            .lucent-course-card .lucent-course-footer {
                padding: 10px 14px;
            }
        ';
    }

    // Header style overrides.
    $headerstyle = !empty($theme->settings->headerstyle) ? $theme->settings->headerstyle : 'glass';
    switch ($headerstyle) {
        case 'solid':
            $content .= '
                .navbar, .lucent-navbar {
                    background: var(--lucent-surface) !important;
                    backdrop-filter: none !important;
                    -webkit-backdrop-filter: none !important;
                    box-shadow: var(--lucent-shadow-sm);
                }
            ';
            break;
        case 'transparent':
            $content .= '
                .navbar, .lucent-navbar {
                    background: transparent !important;
                    backdrop-filter: none !important;
                    -webkit-backdrop-filter: none !important;
                    border-bottom: none;
                    box-shadow: none;
                }
            ';
            break;
        // 'glass' is the default in main.scss, no override needed.
    }

    // Course card style overrides.
    $cardstyle = !empty($theme->settings->coursecardstyle) ? $theme->settings->coursecardstyle : 'rounded';
    switch ($cardstyle) {
        case 'sharp':
            $content .= '
                .dashboard-card, .card, .coursebox {
                    border-radius: 0 !important;
                }
                .dashboard-card .dashboard-card-img,
                .dashboard-card .course-image-view {
                    border-radius: 0;
                }
            ';
            break;
        case 'gradient':
            $content .= '
                .dashboard-card .card-img-top,
                .dashboard-card .dashboard-card-img {
                    position: relative;
                }
                .dashboard-card::before {
                    content: "";
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    height: 140px;
                    background: linear-gradient(135deg, rgba(var(--lucent-primary-rgb), 0.3), rgba(var(--lucent-primary-rgb), 0.05));
                    z-index: 1;
                    pointer-events: none;
                    border-radius: var(--lucent-radius-xl) var(--lucent-radius-xl) 0 0;
                }
            ';
            break;
    }

    // Mobile bottom nav toggle.
    $mobilebottomnav = isset($theme->settings->mobilebottomnav) ? $theme->settings->mobilebottomnav : 1;
    if (!$mobilebottomnav) {
        $content .= '
            .lucent-bottom-nav { display: none !important; }
            body { padding-bottom: 0 !important; }
        ';
    }

    // Font family.
    $fontmap = [
        'inter' => "'Inter'",
        'poppins' => "'Poppins'",
        'dm-sans' => "'DM Sans'",
        'nunito' => "'Nunito'",
        'plus-jakarta' => "'Plus Jakarta Sans'",
        'outfit' => "'Outfit'",
        'figtree' => "'Figtree'",
        'system' => "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif",
    ];

    $fontfamily = !empty($theme->settings->fontfamily) ? $theme->settings->fontfamily : 'inter';
    if (isset($fontmap[$fontfamily]) && $fontfamily !== 'inter') {
        $font = $fontmap[$fontfamily];
        if ($fontfamily !== 'system') {
            $fontname = str_replace("'", '', $font);
            $content .= "@import url('https://fonts.googleapis.com/css2?family=" .
                        urlencode($fontname) . ":wght@300;400;500;600;700;800&display=swap');\n";
        }
        $content .= "body { font-family: {$font}, -apple-system, BlinkMacSystemFont, sans-serif !important; }\n";
    }

    // Heading font.
    $headingfont = !empty($theme->settings->headingfont) ? $theme->settings->headingfont : 'same';
    if ($headingfont !== 'same' && isset($fontmap[$headingfont])) {
        $hfont = $fontmap[$headingfont];
        $hfontname = str_replace("'", '', $hfont);
        $content .= "@import url('https://fonts.googleapis.com/css2?family=" .
                    urlencode($hfontname) . ":wght@600;700;800;900&display=swap');\n";
        $content .= "h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 { font-family: {$hfont}, sans-serif !important; }\n";
    }

    // Custom SCSS from settings.
    if (!empty($theme->settings->customscss)) {
        $content .= $theme->settings->customscss;
    }

    // Custom CSS injection (raw CSS).
    if (!empty($theme->settings->customcss)) {
        $content .= $theme->settings->customcss;
    }

    return $content;
}

/**
 * Get pre SCSS — variable overrides before compilation.
 *
 * @param theme_config $theme The theme config object.
 * @return string Pre-SCSS variables.
 */
function theme_lucent_get_pre_scss($theme) {
    $scss = '';

    // Color preset mappings.
    $presets = [
        'indigo' => ['primary' => '#6366f1', 'secondary' => '#64748b', 'success' => '#10b981'],
        'blue'   => ['primary' => '#3b82f6', 'secondary' => '#6b7280', 'success' => '#06b6d4'],
        'emerald' => ['primary' => '#10b981', 'secondary' => '#64748b', 'success' => '#059669'],
        'rose'   => ['primary' => '#f43f5e', 'secondary' => '#71717a', 'success' => '#10b981'],
        'amber'  => ['primary' => '#f59e0b', 'secondary' => '#78716c', 'success' => '#84cc16'],
        'violet' => ['primary' => '#8b5cf6', 'secondary' => '#6b7280', 'success' => '#10b981'],
    ];

    $colorpreset = !empty($theme->settings->colorpreset) ? $theme->settings->colorpreset : 'indigo';

    if ($colorpreset !== 'custom' && isset($presets[$colorpreset])) {
        // Apply preset colors — overrides any color picker values.
        foreach ($presets[$colorpreset] as $variable => $color) {
            $scss .= '$' . $variable . ': ' . $color . ";\n";
        }
    } else {
        // Custom mode — use the color picker values.
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
    }

    return $scss;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course Course object.
 * @param stdClass $cm Course module object.
 * @param context $context Context object.
 * @param string $filearea File area name.
 * @param array $args Extra arguments.
 * @param bool $forcedownload Force download.
 * @param array $options Additional options.
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

/**
 * Get the Google Analytics tracking code.
 * To be called in the theme's additional HTML head or via a renderer.
 *
 * @return string HTML/JS for analytics tracking, or empty string.
 */
function theme_lucent_get_analytics_code() {
    $gaid = get_config('theme_lucent', 'googleanalytics');
    if (empty($gaid)) {
        return '';
    }

    // GA4 (G-XXXXXXXX) format.
    if (strpos($gaid, 'G-') === 0) {
        return "
            <script async src=\"https://www.googletagmanager.com/gtag/js?id={$gaid}\"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', '{$gaid}');
            </script>
        ";
    }

    // Universal Analytics (UA-XXXXXXXX) format.
    return "
        <script async src=\"https://www.google-analytics.com/analytics.js\"></script>
        <script>
            window.ga = window.ga || function(){(ga.q = ga.q || []).push(arguments)};
            ga.l = +new Date;
            ga('create', '{$gaid}', 'auto');
            ga('send', 'pageview');
        </script>
    ";
}
