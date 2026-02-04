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
 * Lucent frontpage layout — premium hero + course grid.
 *
 * @package    theme_lucent
 * @copyright  2025 Lucent Theme
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/behat/lib.php');
require_once($CFG->dirroot . '/course/lib.php');

$bodyattributes = $OUTPUT->body_attributes(['lucent-frontpage']);

global $DB;

// Get courses for display
$chelper = new coursecat_helper();
$chelper->set_show_courses(20)->set_courses_display_options([
    'recursive' => true,
    'limit' => 12,
    'viewmoreurl' => new moodle_url('/course/index.php'),
    'viewmoretext' => new lang_string('fulllistofcourses'),
]);

$courses = core_course_category::get(0)->get_courses($chelper->get_courses_display_options());

// Count stats
$totalcourses = $DB->count_records('course') - 1;
$totalusers = $DB->count_records('user', ['deleted' => 0, 'suspended' => 0]) - 1;
$totalcategories = $DB->count_records('course_categories');

// Get categories
$categories = core_course_category::get(0)->get_children();

// Build categories for the Explore mega-menu
$explorecategories = [];
foreach ($categories as $cat) {
    $children = $cat->get_children();
    $subcats = [];
    foreach ($children as $child) {
        $subcats[] = ['id' => $child->id, 'name' => format_string($child->name)];
    }
    $explorecategories[] = [
        'id' => $cat->id,
        'name' => format_string($cat->name),
        'children' => $subcats,
    ];
}

echo $OUTPUT->doctype();
?>
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

<!-- Navbar -->
<nav class="lucent-fp-navbar">
    <div class="lucent-container lucent-fp-navbar-inner">
        <a href="<?php echo $CFG->wwwroot; ?>" class="lucent-fp-brand">
            <?php
            $logo = $OUTPUT->get_compact_logo_url();
            if ($logo): ?>
                <img src="<?php echo $logo; ?>" alt="<?php echo format_string($SITE->shortname); ?>" class="lucent-fp-logo">
            <?php else: ?>
                <span class="lucent-fp-sitename"><?php echo format_string($SITE->shortname); ?></span>
            <?php endif; ?>
        </a>
        <div class="lucent-fp-nav-links">
            <div class="lucent-fp-explore-wrapper">
                <a href="<?php echo new moodle_url('/course/index.php'); ?>" class="lucent-fp-explore-trigger">Explore <span class="lucent-fp-explore-caret">&#9662;</span></a>
                <div class="lucent-explore-dropdown">
                    <?php foreach ($explorecategories as $ecat): ?>
                    <div class="lucent-explore-item">
                        <a href="<?php echo new moodle_url('/course/index.php', ['categoryid' => $ecat['id']]); ?>" class="lucent-explore-cat-link">
                            <?php echo $ecat['name']; ?>
                            <?php if (!empty($ecat['children'])): ?><span class="lucent-explore-arrow">&#9656;</span><?php endif; ?>
                        </a>
                        <?php if (!empty($ecat['children'])): ?>
                        <div class="lucent-explore-submenu">
                            <?php foreach ($ecat['children'] as $subcat): ?>
                            <a href="<?php echo new moodle_url('/course/index.php', ['categoryid' => $subcat['id']]); ?>" class="lucent-explore-sub-link"><?php echo $subcat['name']; ?></a>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                    <a href="<?php echo new moodle_url('/course/index.php'); ?>" class="lucent-explore-viewall">View All Courses →</a>
                </div>
            </div>
            <?php if (!isloggedin() || isguestuser()): ?>
                <a href="<?php echo new moodle_url('/login/index.php'); ?>" class="lucent-fp-nav-login">Log in</a>
                <a href="<?php echo new moodle_url('/login/signup.php'); ?>" class="lucent-fp-nav-signup">Sign up</a>
            <?php else: ?>
                <a href="<?php echo new moodle_url('/my/'); ?>">Dashboard</a>
                <a href="<?php echo new moodle_url('/user/profile.php'); ?>"><?php echo fullname($USER); ?></a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- ══════════════════════════════════════════════════ -->
<!-- HERO SECTION -->
<!-- ══════════════════════════════════════════════════ -->
<section class="lucent-hero">
    <div class="lucent-hero-bg"></div>
    <div class="lucent-hero-content">
        <?php
        $herobadge = get_config('theme_lucent', 'herobadge') ?: '🎓 Online Learning Platform';
        $herotitle = get_config('theme_lucent', 'herotitle') ?: 'Learn Without Limits';
        $herohighlight = get_config('theme_lucent', 'herohighlight') ?: 'Limits';
        $herosubtitle = get_config('theme_lucent', 'herosubtitle') ?: 'Discover courses taught by industry experts. Build skills that matter. Transform your career.';
        $herocta = get_config('theme_lucent', 'heroctaText') ?: 'Explore Courses';
        $herocta2 = get_config('theme_lucent', 'herocta2text') ?: 'Get Started Free';

        // Split title around the highlight word
        $titlehtml = $herotitle;
        if ($herohighlight && strpos($herotitle, $herohighlight) !== false) {
            $titlehtml = str_replace($herohighlight, '<span class="lucent-gradient-text">' . $herohighlight . '</span>', $herotitle);
        }
        // Convert any newlines or "Without\n" to <br>
        $titlehtml = str_replace(['\n', '|'], '<br>', $titlehtml);
        ?>
        <div class="lucent-hero-badge"><?php echo $herobadge; ?></div>
        <h1 class="lucent-hero-title"><?php echo $titlehtml; ?></h1>
        <p class="lucent-hero-subtitle"><?php echo $herosubtitle; ?></p>
        <div class="lucent-hero-actions">
            <a href="<?php echo new moodle_url('/course/index.php'); ?>" class="btn lucent-btn-primary">
                <?php echo $herocta; ?>
            </a>
            <?php if (!isloggedin() || isguestuser()): ?>
            <a href="<?php echo new moodle_url('/login/signup.php'); ?>" class="btn lucent-btn-outline">
                <?php echo $herocta2; ?>
            </a>
            <?php endif; ?>
        </div>
        <?php $showstats = get_config('theme_lucent', 'showherostats'); if ($showstats === false || $showstats): ?>
        <div class="lucent-hero-stats">
            <div class="lucent-stat">
                <span class="lucent-stat-number"><?php echo $totalcourses; ?>+</span>
                <span class="lucent-stat-label">Courses</span>
            </div>
            <div class="lucent-stat-divider"></div>
            <div class="lucent-stat">
                <span class="lucent-stat-number"><?php echo $totalusers; ?>+</span>
                <span class="lucent-stat-label">Students</span>
            </div>
            <div class="lucent-stat-divider"></div>
            <div class="lucent-stat">
                <span class="lucent-stat-number"><?php echo $totalcategories; ?></span>
                <span class="lucent-stat-label">Categories</span>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Required by Moodle — hidden but present -->
<div style="display:none"><?php echo $OUTPUT->main_content(); ?></div>

<!-- ══════════════════════════════════════════════════ -->
<!-- CATEGORIES -->
<!-- ══════════════════════════════════════════════════ -->
<?php
$showcategories = get_config('theme_lucent', 'showcategories');
if (($showcategories === false || $showcategories) && !empty($categories)):
?>
<section class="lucent-section lucent-categories-section">
    <div class="lucent-container">
        <div class="lucent-section-header">
            <h2 class="lucent-section-title">Browse Categories</h2>
            <p class="lucent-section-subtitle">Find the perfect course for your learning goals</p>
        </div>
        <div class="lucent-categories-grid">
            <?php
            $catIcons = ['💻', '📊', '💼', '🎨', '📚', '🔬', '🎵', '🌍'];
            $catColors = ['#6366f1', '#10b981', '#f59e0b', '#ec4899', '#8b5cf6', '#06b6d4', '#ef4444', '#14b8a6'];
            $ci = 0;
            foreach ($categories as $cat):
                $coursecount = $cat->get_courses_count();
                $icon = $catIcons[$ci % count($catIcons)];
                $color = $catColors[$ci % count($catColors)];
                $ci++;
            ?>
            <a href="<?php echo new moodle_url('/course/index.php', ['categoryid' => $cat->id]); ?>" class="lucent-category-card" style="--cat-color: <?php echo $color; ?>">
                <div class="lucent-category-icon"><?php echo $icon; ?></div>
                <h3 class="lucent-category-name"><?php echo format_string($cat->name); ?></h3>
                <span class="lucent-category-count"><?php echo $coursecount; ?> courses</span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ══════════════════════════════════════════════════ -->
<!-- FEATURED COURSES -->
<!-- ══════════════════════════════════════════════════ -->
<section class="lucent-section lucent-courses-section">
    <div class="lucent-container">
        <div class="lucent-section-header">
            <h2 class="lucent-section-title">Featured Courses</h2>
            <a href="<?php echo new moodle_url('/course/index.php'); ?>" class="lucent-view-all">View all →</a>
        </div>
        <div class="lucent-courses-grid">
            <?php foreach ($courses as $course):
                $courseid = $course->id;
                $courseobj = get_course($courseid);
                $context = context_course::instance($courseid);

                // Get course image
                $courseimage = '';
                $fs = get_file_storage();
                $files = $fs->get_area_files($context->id, 'course', 'overviewfiles', false, 'filename', false);
                foreach ($files as $f) {
                    if ($f->is_valid_image()) {
                        $courseimage = moodle_url::make_pluginfile_url(
                            $f->get_contextid(), $f->get_component(), $f->get_filearea(),
                            null, $f->get_filepath(), $f->get_filename()
                        )->out();
                        break;
                    }
                }

                $summary = strip_tags(format_text($courseobj->summary, FORMAT_HTML));
                if (strlen($summary) > 100) {
                    $summary = substr($summary, 0, 100) . '...';
                }

                // Get category name
                $catname = '';
                if ($courseobj->category) {
                    $cat = core_course_category::get($courseobj->category, IGNORE_MISSING);
                    if ($cat) $catname = $cat->name;
                }
            ?>
            <a href="<?php echo new moodle_url('/course/view.php', ['id' => $courseid]); ?>" class="lucent-course-card">
                <div class="lucent-course-image" <?php if ($courseimage): ?>style="background-image: url('<?php echo $courseimage; ?>')"<?php endif; ?>>
                    <?php if (!$courseimage): ?>
                    <div class="lucent-course-placeholder">📚</div>
                    <?php endif; ?>
                    <?php if ($catname): ?>
                    <span class="lucent-course-badge"><?php echo format_string($catname); ?></span>
                    <?php endif; ?>
                </div>
                <div class="lucent-course-body">
                    <h3 class="lucent-course-title"><?php echo format_string($courseobj->fullname); ?></h3>
                    <?php if ($summary): ?>
                    <p class="lucent-course-desc"><?php echo $summary; ?></p>
                    <?php endif; ?>
                </div>
                <div class="lucent-course-footer">
                    <span class="lucent-course-meta">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                        <?php echo $courseobj->numsections ?? 8; ?> sections
                    </span>
                    <span class="lucent-course-arrow">→</span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════ -->
<!-- CTA SECTION -->
<!-- ══════════════════════════════════════════════════ -->
<?php if (!isloggedin() || isguestuser()): ?>
<section class="lucent-section lucent-cta-section">
    <div class="lucent-container">
        <div class="lucent-cta-card">
            <h2>Ready to Start Learning?</h2>
            <p>Join thousands of students already learning on our platform</p>
            <a href="<?php echo new moodle_url('/login/signup.php'); ?>" class="btn lucent-btn-primary lucent-btn-lg">
                Create Free Account
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ══════════════════════════════════════════════════ -->
<!-- FOOTER -->
<!-- ══════════════════════════════════════════════════ -->
<?php
$footerdesc = get_config('theme_lucent', 'footerdesc') ?: 'Empowering learners worldwide with quality education.';
$col1title = get_config('theme_lucent', 'footercol1title') ?: 'Quick Links';
$col1links = get_config('theme_lucent', 'footercol1');
$col2title = get_config('theme_lucent', 'footercol2title') ?: 'Support';
$col2links = get_config('theme_lucent', 'footercol2');
$copyright = get_config('theme_lucent', 'copyright');

// Social links
$socials = [];
foreach (['facebook', 'twitter', 'instagram', 'linkedin', 'youtube'] as $soc) {
    $url = get_config('theme_lucent', 'social' . $soc);
    if (!empty($url)) {
        $socials[$soc] = $url;
    }
}

// Parse pipe-separated links
function lucent_parse_links($raw) {
    if (empty($raw)) return [];
    $lines = explode("\n", trim($raw));
    $links = [];
    foreach ($lines as $line) {
        $parts = explode('|', trim($line), 2);
        if (count($parts) === 2) {
            $links[] = ['text' => trim($parts[0]), 'url' => trim($parts[1])];
        }
    }
    return $links;
}
$col1 = lucent_parse_links($col1links);
$col2 = lucent_parse_links($col2links);
?>
<footer class="lucent-footer">
    <div class="lucent-footer-main">
        <div class="lucent-container">
            <div class="lucent-fp-footer-grid">
                <div class="lucent-fp-footer-brand">
                    <h5 class="lucent-footer-heading"><?php echo format_string($SITE->shortname); ?></h5>
                    <p class="lucent-footer-desc"><?php echo $footerdesc; ?></p>
                    <?php if (!empty($socials)): ?>
                    <div class="lucent-social-links">
                        <?php foreach ($socials as $platform => $url): ?>
                        <a href="<?php echo $url; ?>" class="lucent-social-link" target="_blank" rel="noopener" aria-label="<?php echo ucfirst($platform); ?>">
                            <i class="fa fa-<?php echo $platform === 'youtube' ? 'youtube-play' : $platform; ?>"></i>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php if (!empty($col1)): ?>
                <div>
                    <h6 class="lucent-footer-heading-sm"><?php echo $col1title; ?></h6>
                    <ul class="lucent-footer-links">
                        <?php foreach ($col1 as $link): ?>
                        <li><a href="<?php echo $CFG->wwwroot . $link['url']; ?>"><?php echo $link['text']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php if (!empty($col2)): ?>
                <div>
                    <h6 class="lucent-footer-heading-sm"><?php echo $col2title; ?></h6>
                    <ul class="lucent-footer-links">
                        <?php foreach ($col2 as $link): ?>
                        <li><a href="<?php echo $CFG->wwwroot . $link['url']; ?>"><?php echo $link['text']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <div>
                    <h6 class="lucent-footer-heading-sm">Account</h6>
                    <div class="lucent-footer-login-info">
                        <?php echo $OUTPUT->login_info(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lucent-footer-bottom">
        <div class="lucent-container" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:8px;">
            <div class="lucent-footer-copyright">
                <?php echo $copyright ?: '&copy; ' . date('Y') . ' ' . format_string($SITE->shortname) . '. All rights reserved.'; ?>
            </div>
            <div class="lucent-footer-theme-credit">
                Designed with <span class="lucent-heart">&hearts;</span> by Lucent Theme
            </div>
        </div>
    </div>
</footer>

<?php echo $OUTPUT->standard_end_of_body_html(); ?>

</body>
</html>
