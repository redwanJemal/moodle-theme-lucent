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
 * Lucent theme language strings.
 *
 * @package    theme_lucent
 * @copyright  2025 Lucent Theme
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Plugin info.
$string['pluginname'] = 'Lucent';
$string['choosereadme'] = 'Lucent is a premium, mobile-first Moodle theme with a glass navbar, dark mode, responsive dashboard, and full admin customization panel.';
$string['configtitle'] = 'Lucent Settings';

// ── Settings Tabs ──
$string['generalsettings'] = 'General';
$string['brandingsettings'] = 'Branding';
$string['herosettings'] = 'Hero / Frontpage';
$string['loginsettings'] = 'Login Page';
$string['headersettings'] = 'Header & Layout';
$string['footersettings'] = 'Footer';
$string['advancedsettings'] = 'Advanced';

// ── General ──
$string['brandcolor'] = 'Brand Color';
$string['brandcolor_desc'] = 'Primary accent color used throughout the theme — buttons, links, active states.';
$string['secondarycolor'] = 'Secondary Color';
$string['secondarycolor_desc'] = 'Used for secondary UI elements, muted text, and subtle accents.';
$string['successcolor'] = 'Success Color';
$string['successcolor_desc'] = 'Used for completion indicators, success alerts, and progress bars.';

$string['colorpreset'] = 'Color Preset';
$string['colorpreset_desc'] = 'Quick-apply a color scheme. Choose "Custom" to use the color pickers above.';
$string['preset_indigo'] = '💜 Indigo (Default)';
$string['preset_blue'] = '💙 Ocean Blue';
$string['preset_emerald'] = '💚 Emerald Green';
$string['preset_rose'] = '💗 Rose Pink';
$string['preset_amber'] = '🧡 Amber Orange';
$string['preset_violet'] = '💟 Deep Violet';
$string['preset_custom'] = '🎨 Custom (use color pickers)';

$string['fontfamily'] = 'Font Family';
$string['fontfamily_desc'] = 'Primary font used for all text. Google Fonts loaded automatically.';
$string['headingfont'] = 'Heading Font';
$string['headingfont_desc'] = 'Optional separate font for headings (h1-h6). Select "Same as primary" to use one font.';
$string['sameasprimary'] = 'Same as primary font';

$string['enabledarkmode'] = 'Enable Dark Mode';
$string['enabledarkmode_desc'] = 'Add a dark mode toggle for users. When enabled, users can switch between light and dark mode.';

// ── Branding ──
$string['logo'] = 'Full Logo';
$string['logo_desc'] = 'Full-size logo displayed on the login page and branding areas. Recommended: SVG or PNG with transparent background.';
$string['logocompact'] = 'Navbar Logo';
$string['logocompact_desc'] = 'Compact logo for the navigation bar. Recommended height: 36px.';
$string['favicon'] = 'Favicon';
$string['favicon_desc'] = 'Browser tab icon. Upload .ico or .png file (16x16 or 32x32 pixels).';
$string['loginlogo'] = 'Login Page Logo';
$string['loginlogo_desc'] = 'Optional logo specifically for the login page. Falls back to the full logo if not set.';

// ── Hero / Frontpage ──
$string['herobadge'] = 'Hero Badge Text';
$string['herobadge_desc'] = 'Small badge text above the hero title. Supports emoji. Example: "🎓 Online Learning Platform"';
$string['herotitle'] = 'Hero Title';
$string['herotitle_desc'] = 'Main headline text in the hero section. Keep it short and impactful.';
$string['herohighlight'] = 'Highlight Word';
$string['herohighlight_desc'] = 'Word from the title to highlight with gradient color. Must match exactly.';
$string['herosubtitle'] = 'Hero Subtitle';
$string['herosubtitle_desc'] = 'Supporting text below the hero title. 1-2 sentences recommended.';
$string['heroimage'] = 'Hero Background Image';
$string['heroimage_desc'] = 'Optional background image for the hero section. Will overlay the gradient. Recommended: 1920x800px.';
$string['heroctatext'] = 'Primary Button Text';
$string['heroctatext_desc'] = 'Text for the main call-to-action button in the hero.';
$string['herocta2text'] = 'Secondary Button Text';
$string['herocta2text_desc'] = 'Text for the secondary button. Only shown to non-logged-in users.';
$string['showherostats'] = 'Show Statistics';
$string['showherostats_desc'] = 'Display course/student/category counts in the hero section.';
$string['showcategories'] = 'Show Categories Section';
$string['showcategories_desc'] = 'Display the "Browse Categories" grid on the frontpage.';
$string['coursesperrow'] = 'Courses Per Row';
$string['coursesperrow_desc'] = 'Number of course cards per row on desktop.';

// ── Login Page ──
$string['loginheading'] = 'Login Heading';
$string['loginheading_desc'] = 'Main heading on the login form.';
$string['loginheading_default'] = 'Welcome back';
$string['loginsubheading'] = 'Login Subheading';
$string['loginsubheading_desc'] = 'Text below the login heading.';
$string['loginsubheading_default'] = 'Sign in to your account to continue';
$string['loginbrandheadline'] = 'Brand Panel Headline';
$string['loginbrandheadline_desc'] = 'Large headline on the left branding panel (desktop only).';
$string['loginbrandtagline'] = 'Brand Panel Tagline';
$string['loginbrandtagline_desc'] = 'Tagline text below the headline on the branding panel.';
$string['loginbg'] = 'Login Background Image';
$string['loginbg_desc'] = 'Background image for the login brand panel. Replaces the default gradient.';

// ── Header & Layout ──
$string['headerstyle'] = 'Header Style';
$string['headerstyle_desc'] = 'Visual style for the navigation bar.';
$string['headerstyle_glass'] = '✨ Glass (blur + transparent)';
$string['headerstyle_solid'] = '◼️ Solid (opaque background)';
$string['headerstyle_transparent'] = '👻 Transparent (no background)';

$string['coursecardstyle'] = 'Course Card Style';
$string['coursecardstyle_desc'] = 'Visual style for course cards on the dashboard.';
$string['cardstyle_rounded'] = '🔵 Rounded (Default)';
$string['cardstyle_sharp'] = '🔲 Sharp corners';
$string['cardstyle_gradient'] = '🌈 Gradient overlay';

$string['mobilebottomnav'] = 'Mobile Bottom Navigation';
$string['mobilebottomnav_desc'] = 'Show the app-like bottom navigation bar on mobile devices.';

// ── Footer ──
$string['footerdesc'] = 'Footer Description';
$string['footerdesc_desc'] = 'Short text about your organization, shown in the footer.';
$string['footercol1title'] = 'Column 1 Title';
$string['footercol1title_desc'] = 'Heading for the first footer links column.';
$string['footercol1'] = 'Column 1 Links';
$string['footercol1_desc'] = 'One link per line in format: Link Text|/url';
$string['footercol2title'] = 'Column 2 Title';
$string['footercol2title_desc'] = 'Heading for the second footer links column.';
$string['footercol2'] = 'Column 2 Links';
$string['footercol2_desc'] = 'One link per line in format: Link Text|/url';

$string['socialfacebook'] = 'Facebook URL';
$string['socialtwitter'] = 'Twitter / X URL';
$string['socialinstagram'] = 'Instagram URL';
$string['sociallinkedin'] = 'LinkedIn URL';
$string['socialyoutube'] = 'YouTube URL';
$string['social_desc'] = 'Full URL to your {$a} profile. Leave empty to hide.';

$string['copyright'] = 'Copyright Text';
$string['copyright_desc'] = 'Custom copyright text. Leave empty for default "© [year] [sitename]".';

// ── Error Page ──
$string['error_pagetitle'] = 'Page not found';
$string['error_message'] = 'The page you\'re looking for doesn\'t exist or has been moved. Let\'s get you back on track.';
$string['error_gohome'] = 'Back to Home';

// ── Maintenance Page ──
$string['maintenance_title'] = 'We\'ll be back soon';
$string['maintenance_message'] = 'We\'re making some improvements to bring you a better experience. Please check back in a few minutes.';

// ── Layout ──
$string['layoutstyle'] = 'Layout Style';
$string['layoutstyle_desc'] = 'Choose between a full-width layout or a centered boxed layout with background color.';
$string['layout_wide'] = '📐 Wide (Full Width)';
$string['layout_boxed'] = '📦 Boxed (Centered)';

// ── Top Bar ──
$string['enabletopbar'] = 'Enable Top Bar';
$string['enabletopbar_desc'] = 'Show an announcement/info bar above the navigation. Great for contact info, alerts, or promotions.';
$string['topbarcontent'] = 'Top Bar Content';
$string['topbarcontent_desc'] = 'Text content for the top bar. Supports HTML and emoji. Example: "📞 +251 XXX | ✉️ info@school.com"';
$string['topbarbg'] = 'Top Bar Background';
$string['topbarbg_desc'] = 'Background color for the top bar.';
$string['topbarcolor'] = 'Top Bar Text Color';
$string['topbarcolor_desc'] = 'Text color for the top bar content.';

// ── Hero Styles ──
$string['herostyle'] = 'Hero Style';
$string['herostyle_desc'] = 'Visual style for the frontpage hero section.';
$string['herostyle_gradient'] = '🎨 Gradient (Default)';
$string['herostyle_image'] = '🖼️ Background Image';
$string['herostyle_video'] = '🎬 Video Background';
$string['herostyle_minimal'] = '✨ Minimal (Light)';
$string['herovideo'] = 'Hero Video URL';
$string['herovideo_desc'] = 'YouTube or Vimeo URL for the video background hero. Example: https://www.youtube.com/watch?v=dQw4w9WgXcQ';

// ── Course List Style ──
$string['courseliststyle'] = 'Course List Style';
$string['courseliststyle_desc'] = 'How courses are displayed in the frontpage grid and category pages.';
$string['courseliststyle_grid'] = '🔲 Card Grid (Default)';
$string['courseliststyle_list'] = '📋 List View';
$string['courseliststyle_compact'] = '🔳 Compact Grid';

// ── Advanced ──
$string['customscss'] = 'Custom SCSS';
$string['customscss_desc'] = 'Custom SCSS code — compiled with the theme. Use $primary, $secondary, etc. variables.';
$string['customcss'] = 'Custom CSS';
$string['customcss_desc'] = 'Raw CSS injected after all other styles. Use for quick overrides.';
$string['googleanalytics'] = 'Google Analytics ID';
$string['googleanalytics_desc'] = 'Enter your GA4 (G-XXXXXXXX) or Universal Analytics (UA-XXXXXXXX) tracking ID.';
$string['headinjection'] = 'Head Injection';
$string['headinjection_desc'] = 'Custom HTML/JS injected into the <head>. Use for chat widgets, tracking pixels, etc.';
