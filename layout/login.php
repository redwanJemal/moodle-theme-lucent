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
 * Lucent login layout — premium split-screen design.
 *
 * @package    theme_lucent
 * @copyright  2025 Lucent Theme
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$bodyattributes = $OUTPUT->body_attributes(['lucent-login-page']);

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

<div class="lucent-auth">
    <!-- ═══ Left Panel — Branding ═══ -->
    <div class="lucent-auth-brand">
        <div class="lucent-auth-brand-bg">
            <div class="lucent-auth-orb lucent-auth-orb-1"></div>
            <div class="lucent-auth-orb lucent-auth-orb-2"></div>
            <div class="lucent-auth-orb lucent-auth-orb-3"></div>
            <div class="lucent-auth-grid"></div>
        </div>
        <div class="lucent-auth-brand-content">
            <a href="<?php echo $CFG->wwwroot; ?>" class="lucent-auth-logo-link">
                <?php
                $logo = $OUTPUT->get_logo_url();
                if ($logo): ?>
                    <img src="<?php echo $logo; ?>" alt="<?php echo format_string($SITE->shortname); ?>" class="lucent-auth-logo">
                <?php else: ?>
                    <div class="lucent-auth-logo-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                        </svg>
                    </div>
                <?php endif; ?>
            </a>
            <?php
            $brandheadline = get_config('theme_lucent', 'loginbrandheadline') ?: 'Start your learning journey';
            $brandtagline = get_config('theme_lucent', 'loginbrandtagline') ?: 'Access thousands of courses, connect with expert instructors, and build skills that matter.';
            ?>
            <h1 class="lucent-auth-headline"><?php echo str_replace(['\n', '|'], '<br>', $brandheadline); ?></h1>
            <p class="lucent-auth-tagline"><?php echo $brandtagline; ?></p>
            <div class="lucent-auth-stats-row">
                <div class="lucent-auth-stat-pill">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                    <span>Expert-led courses</span>
                </div>
                <div class="lucent-auth-stat-pill">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Verified certificates</span>
                </div>
                <div class="lucent-auth-stat-pill">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Learn at your pace</span>
                </div>
            </div>
        </div>
        <div class="lucent-auth-brand-footer">
            <span>© <?php echo date('Y'); ?> <?php echo format_string($SITE->shortname); ?></span>
        </div>
    </div>

    <!-- ═══ Right Panel — Form ═══ -->
    <div class="lucent-auth-form-panel">
        <div class="lucent-auth-form-wrapper">
            <div class="lucent-auth-mobile-brand">
                <a href="<?php echo $CFG->wwwroot; ?>">
                    <?php if ($logo): ?>
                        <img src="<?php echo $logo; ?>" alt="<?php echo format_string($SITE->shortname); ?>">
                    <?php else: ?>
                        <span class="lucent-auth-mobile-sitename"><?php echo format_string($SITE->shortname); ?></span>
                    <?php endif; ?>
                </a>
            </div>

            <?php
            // Detect if this is signup or login
            $issignup = strpos($PAGE->pagetype, 'login-signup') !== false;
            ?>

            <div class="lucent-auth-form-header">
                <?php if ($issignup): ?>
                    <h2>Create Account</h2>
                    <p>Sign up to start your learning journey</p>
                <?php else: ?>
                    <h2><?php echo get_config('theme_lucent', 'loginheading') ?: get_string('loginheading_default', 'theme_lucent'); ?></h2>
                    <p><?php echo get_config('theme_lucent', 'loginsubheading') ?: get_string('loginsubheading_default', 'theme_lucent'); ?></p>
                <?php endif; ?>
            </div>

            <div class="lucent-auth-form-body <?php echo $issignup ? 'lucent-signup-form' : 'lucent-login-form'; ?>">
                <?php echo $OUTPUT->main_content(); ?>
            </div>

            <div class="lucent-auth-form-footer">
                <?php if ($issignup): ?>
                    <p>Already have an account? <a href="<?php echo new moodle_url('/login/index.php'); ?>">Sign in</a></p>
                <?php else: ?>
                    <?php if (!empty($CFG->registerauth)): ?>
                    <p>Don't have an account? <a href="<?php echo new moodle_url('/login/signup.php'); ?>">Create one</a></p>
                    <?php endif; ?>
                <?php endif; ?>
                <a href="<?php echo $CFG->wwwroot; ?>" class="lucent-auth-back-link">← Back to homepage</a>
            </div>
        </div>
    </div>
</div>

<?php echo $OUTPUT->standard_end_of_body_html(); ?>

</body>
</html>
