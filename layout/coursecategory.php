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
 * Lucent course category layout — shows all courses as cards with category filters.
 *
 * @package    theme_lucent
 * @copyright  2025 Lucent Theme
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/behat/lib.php');
require_once($CFG->dirroot . '/course/lib.php');

// ── Standard drawers setup (same as drawers.php) ──
$addblockbutton = $OUTPUT->addblockbutton();

if (isloggedin()) {
    $courseindexopen = (get_user_preferences('drawer-open-index', true) == true);
    $blockdraweropen = (get_user_preferences('drawer-open-block') == true);
} else {
    $courseindexopen = false;
    $blockdraweropen = false;
}

if (defined('BEHAT_SITE_RUNNING') && get_user_preferences('behat_keep_drawer_closed') != 1) {
    $blockdraweropen = true;
}

$extraclasses = ['uses-drawers', 'lucent-coursecategory-page'];
if ($courseindexopen) {
    $extraclasses[] = 'drawer-open-index';
}

$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = (strpos($blockshtml, 'data-block=') !== false || !empty($addblockbutton));
if (!$hasblocks) {
    $blockdraweropen = false;
}
$courseindex = core_course_drawer();
if (!$courseindex) {
    $courseindexopen = false;
}

$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$forceblockdraweropen = $OUTPUT->firstview_fakeblocks();

$secondarynavigation = false;
$overflow = '';
if ($PAGE->has_secondary_navigation()) {
    $tablistnav = $PAGE->has_tablist_secondary_navigation();
    $moremenu = new \core\navigation\output\more_menu($PAGE->secondarynav, 'nav-tabs', true, $tablistnav);
    $secondarynavigation = $moremenu->export_for_template($OUTPUT);
    $overflowdata = $PAGE->secondarynav->get_overflow_menu_data();
    if (!is_null($overflowdata)) {
        $overflow = $overflowdata->export_for_template($OUTPUT);
    }
}

$primary = new core\navigation\output\primary($PAGE);
$renderer = $PAGE->get_renderer('core');
$primarymenu = $primary->export_for_template($renderer);
$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions() && !$PAGE->has_secondary_navigation();
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;

$header = $PAGE->activityheader;
$headercontent = $header->export_for_template($renderer);

// ── Fetch courses for our custom grid ──
$selectedcategory = optional_param('categoryid', 0, PARAM_INT);

// Get all top-level categories for filter pills
$allcategories = core_course_category::get(0)->get_children();

// Fetch courses — either from selected category or all
if ($selectedcategory > 0) {
    try {
        $cat = core_course_category::get($selectedcategory);
        $courses = $cat->get_courses(['recursive' => true, 'limit' => 50]);
        $pagetitle = format_string($cat->name);
    } catch (Exception $e) {
        $courses = [];
        $pagetitle = 'All Courses';
    }
} else {
    $courses = core_course_category::get(0)->get_courses(['recursive' => true, 'limit' => 50]);
    $pagetitle = 'All Courses';
}

// Build course data for rendering
$coursedata = [];
foreach ($courses as $course) {
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
        $ccat = core_course_category::get($courseobj->category, IGNORE_MISSING);
        if ($ccat) {
            $catname = $ccat->name;
        }
    }

    $coursedata[] = [
        'id' => $courseid,
        'fullname' => format_string($courseobj->fullname),
        'summary' => $summary,
        'image' => $courseimage,
        'catname' => $catname,
        'url' => (new moodle_url('/course/view.php', ['id' => $courseid]))->out(),
        'numsections' => $courseobj->numsections ?? 8,
    ];
}

// Build categories for the Explore mega-menu
$explorecategories = [];
foreach ($allcategories as $cat) {
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

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'courseindexopen' => $courseindexopen,
    'blockdraweropen' => $blockdraweropen,
    'courseindex' => $courseindex,
    'primarymoremenu' => $primarymenu['moremenu'],
    'secondarymoremenu' => $secondarynavigation ?: false,
    'mobileprimarynav' => $primarymenu['mobileprimarynav'],
    'usermenu' => $primarymenu['user'],
    'langmenu' => $primarymenu['lang'],
    'forceblockdraweropen' => $forceblockdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'overflow' => $overflow,
    'headercontent' => $headercontent,
    'addblockbutton' => $addblockbutton,
    'lucentcategories' => json_encode($explorecategories),
    // Custom course listing data
    'lucentcoursegrid' => true,
    'lucentcourses' => $coursedata,
    'lucentallcategories' => $allcategories,
    'lucentselectedcategory' => $selectedcategory,
    'lucentpagetitle' => $pagetitle,
];

echo $OUTPUT->render_from_template('theme_lucent/coursecategory', $templatecontext);
