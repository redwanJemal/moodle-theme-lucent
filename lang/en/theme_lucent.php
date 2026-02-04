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

$string['pluginname'] = 'Lucent';
$string['choosereadme'] = 'Lucent is a premium, mobile-first Moodle theme built on Boost with a modern, app-like design. Features glass-effect navigation, mobile bottom nav bar, premium course cards, smooth animations, dark mode, and dozens of customization options. Perfect for universities, corporate training, and online academies.';
$string['configtitle'] = 'Lucent Settings';

// ══════════════════════════════════════════════════════════════
// General settings
// ══════════════════════════════════════════════════════════════
$string['generalsettings'] = 'General';
$string['brandcolor'] = 'Brand colour';
$string['brandcolor_desc'] = 'The primary brand colour used across the theme. This colour drives buttons, links, active states, and accent elements. Choose a colour that represents your brand identity.';
$string['secondarycolor'] = 'Secondary colour';
$string['secondarycolor_desc'] = 'A secondary accent colour used for subtle UI elements, muted text, and secondary buttons.';
$string['successcolor'] = 'Success colour';
$string['successcolor_desc'] = 'Colour used for success states, progress indicators, and completion badges.';

// Fonts.
$string['fontfamily'] = 'Body font';
$string['fontfamily_desc'] = 'Choose the primary font used throughout the theme. All fonts are loaded from Google Fonts for optimal performance. "System Default" uses the device\'s native font stack.';
$string['headingfont'] = 'Heading font';
$string['headingfont_desc'] = 'Choose a different font for headings (h1–h6) to create visual hierarchy. Select "Same as body font" to use a single font throughout.';

// ══════════════════════════════════════════════════════════════
// Appearance
// ══════════════════════════════════════════════════════════════
$string['appearance'] = 'Appearance';
$string['logo'] = 'Logo';
$string['logo_desc'] = 'Upload your logo. Displayed in the header navigation bar. Recommended: SVG or PNG with transparent background, max height 48px.';
$string['logocompact'] = 'Compact logo';
$string['logocompact_desc'] = 'A smaller logo for mobile views and collapsed navigation. Recommended: square icon, 32×32px or similar.';
$string['favicon'] = 'Favicon';
$string['favicon_desc'] = 'Upload a favicon (.ico or .png). This small icon appears in browser tabs and bookmarks.';

// Header style.
$string['headerstyle'] = 'Header style';
$string['headerstyle_desc'] = 'Choose the visual style of the top navigation bar. Glass (default) uses a frosted blur effect, Solid is a clean opaque background, and Transparent blends into the page content.';
$string['headerstyle_glass'] = 'Glass (frosted blur)';
$string['headerstyle_solid'] = 'Solid (opaque)';
$string['headerstyle_transparent'] = 'Transparent';

// Course card style.
$string['coursecardstyle'] = 'Course card style';
$string['coursecardstyle_desc'] = 'Choose how course cards appear on the dashboard. Rounded (default) uses soft corners, Sharp has square corners for a professional look, and Gradient adds a subtle colour overlay on images.';
$string['coursecardstyle_rounded'] = 'Rounded (soft corners)';
$string['coursecardstyle_sharp'] = 'Sharp (square corners)';
$string['coursecardstyle_gradient'] = 'Gradient (colour overlay)';

// Dark mode.
$string['darkmode'] = 'Dark mode';
$string['darkmode_desc'] = 'Enable the dark mode toggle, allowing users to switch between light and dark themes. The dark theme uses carefully chosen colours to reduce eye strain in low-light environments.';
$string['darkmodetoggle'] = 'Toggle dark mode';

// ══════════════════════════════════════════════════════════════
// Login page
// ══════════════════════════════════════════════════════════════
$string['loginsettings'] = 'Login Page';
$string['loginbg'] = 'Login background image';
$string['loginbg_desc'] = 'Upload a background image for the login page. For best results, use a high-resolution image (1920×1080 or larger). The image will be overlaid with a gradient for readability.';
$string['loginlogo'] = 'Login logo';
$string['loginlogo_desc'] = 'A logo displayed prominently on the login page. If not set, the main site logo will be used.';
$string['loginheading'] = 'Login heading';
$string['loginheading_desc'] = 'Custom heading text displayed on the login page above the form.';
$string['loginheading_default'] = 'Welcome Back';
$string['loginsubheading'] = 'Login subheading';
$string['loginsubheading_desc'] = 'A short tagline or description displayed below the login heading.';
$string['loginsubheading_default'] = 'Sign in to continue your learning journey';

// ══════════════════════════════════════════════════════════════
// Mobile settings
// ══════════════════════════════════════════════════════════════
$string['mobilesettings'] = 'Mobile';
$string['mobilebottomnav'] = 'Mobile bottom navigation';
$string['mobilebottomnav_desc'] = 'Enable the fixed bottom navigation bar on mobile devices. This provides quick access to Home, Courses, Search, Notifications, and Profile — like a native mobile app. Disable if you prefer the traditional mobile layout.';

// ══════════════════════════════════════════════════════════════
// Dashboard
// ══════════════════════════════════════════════════════════════
$string['dashboardsettings'] = 'Dashboard';
$string['heroimage'] = 'Hero image';
$string['heroimage_desc'] = 'A hero banner image displayed at the top of the dashboard. Recommended size: 1200×400px.';

// ══════════════════════════════════════════════════════════════
// Footer
// ══════════════════════════════════════════════════════════════
$string['footersettings'] = 'Footer';
$string['footercolumns'] = 'Footer columns';
$string['footercolumns_desc'] = 'Choose how many columns to display in the footer area. More columns work better on desktop, fewer columns are cleaner on all screen sizes.';
$string['footertext'] = 'Footer text';
$string['footertext_desc'] = 'Custom HTML or text displayed in the footer area. You can use this for legal notices, contact information, or additional links.';

// ══════════════════════════════════════════════════════════════
// Social media
// ══════════════════════════════════════════════════════════════
$string['socialsettings'] = 'Social Media';
$string['facebook'] = 'Facebook URL';
$string['facebook_desc'] = 'Enter the full URL to your Facebook page (e.g., https://facebook.com/yourpage). Leave empty to hide the Facebook icon.';
$string['twitter'] = 'Twitter / X URL';
$string['twitter_desc'] = 'Enter the full URL to your Twitter/X profile (e.g., https://x.com/yourhandle). Leave empty to hide the icon.';
$string['instagram'] = 'Instagram URL';
$string['instagram_desc'] = 'Enter the full URL to your Instagram profile (e.g., https://instagram.com/yourprofile). Leave empty to hide the icon.';
$string['linkedin'] = 'LinkedIn URL';
$string['linkedin_desc'] = 'Enter the full URL to your LinkedIn page (e.g., https://linkedin.com/company/yourcompany). Leave empty to hide the icon.';
$string['youtube'] = 'YouTube URL';
$string['youtube_desc'] = 'Enter the full URL to your YouTube channel (e.g., https://youtube.com/@yourchannel). Leave empty to hide the icon.';

// ══════════════════════════════════════════════════════════════
// Advanced
// ══════════════════════════════════════════════════════════════
$string['advancedsettings'] = 'Advanced';
$string['customscss'] = 'Custom SCSS';
$string['customscss_desc'] = 'Add custom SCSS rules that will be compiled with the theme. Use SCSS variables (like $primary) for consistency. This is processed at compile time.';
$string['customcss'] = 'Custom CSS';
$string['customcss_desc'] = 'Inject raw CSS directly into every page. Use this for quick overrides or third-party integrations. This CSS is added as-is, without SCSS processing.';
$string['googleanalytics'] = 'Google Analytics ID';
$string['googleanalytics_desc'] = 'Enter your Google Analytics measurement ID (e.g., G-XXXXXXXXXX or UA-XXXXXXXX-X) to enable site tracking. Leave empty to disable analytics. Supports both GA4 and Universal Analytics.';
$string['backgroundimage'] = 'Background image';
$string['backgroundimage_desc'] = 'Upload a full-page background image. This will appear behind all content as a subtle texture or pattern.';

// ══════════════════════════════════════════════════════════════
// Region
// ══════════════════════════════════════════════════════════════
$string['region-side-pre'] = 'Right';
