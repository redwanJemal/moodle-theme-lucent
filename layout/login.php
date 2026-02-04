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
 * Lucent login layout.
 *
 * @package    theme_lucent
 * @copyright  2025 Lucent Theme
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$bodyattributes = $OUTPUT->body_attributes();

echo $OUTPUT->doctype(); ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Inline critical login styles for fast first paint */
        body#page-login-index {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #312e81 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .lucent-login-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            width: 100%;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }
        .lucent-login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 1.25rem;
            padding: 3rem;
            max-width: 440px;
            width: 100%;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .lucent-login-brand {
            text-align: center;
            margin-bottom: 2rem;
        }
        .lucent-login-brand img {
            max-height: 48px;
            margin-bottom: 1.5rem;
        }
        .lucent-login-brand h1 {
            font-family: 'Inter', -apple-system, sans-serif;
            font-size: 1.75rem;
            font-weight: 800;
            color: #1e293b;
            margin: 0 0 0.375rem 0;
            letter-spacing: -0.03em;
        }
        .lucent-login-brand p {
            color: #64748b;
            font-size: 0.9375rem;
            margin: 0;
        }
        /* Floating orbs decoration */
        .lucent-orb {
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
        }
        .lucent-orb-1 {
            top: -10%;
            right: -5%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
        }
        .lucent-orb-2 {
            bottom: -15%;
            left: -8%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.12) 0%, transparent 70%);
        }
        .lucent-orb-3 {
            top: 40%;
            left: 20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.08) 0%, transparent 70%);
        }
        @media (max-width: 768px) {
            .lucent-login-card {
                padding: 2rem 1.5rem;
                margin: 1rem;
                border-radius: 1rem;
            }
        }
    </style>
</head>
<body <?php echo $bodyattributes; ?>>

<?php echo $OUTPUT->standard_top_of_body_html(); ?>

<!-- Decorative orbs -->
<div class="lucent-orb lucent-orb-1"></div>
<div class="lucent-orb lucent-orb-2"></div>
<div class="lucent-orb lucent-orb-3"></div>

<div class="lucent-login-wrapper">
    <div class="lucent-login-card">
        <div class="lucent-login-brand">
            <?php
            $loginlogo = $OUTPUT->get_logo_url();
            if ($loginlogo) {
                echo '<img src="' . $loginlogo . '" alt="Logo">';
            }
            ?>
            <h1><?php
                $heading = get_config('theme_lucent', 'loginheading');
                echo $heading ? $heading : get_string('loginheading_default', 'theme_lucent');
            ?></h1>
            <p><?php
                $subheading = get_config('theme_lucent', 'loginsubheading');
                echo $subheading ? $subheading : get_string('loginsubheading_default', 'theme_lucent');
            ?></p>
        </div>

        <?php echo $OUTPUT->main_content(); ?>
    </div>
</div>

<?php echo $OUTPUT->standard_end_of_body_html(); ?>

</body>
</html>
