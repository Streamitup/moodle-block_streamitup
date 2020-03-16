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
 * Controller for various actions of the block.
 *
 * This page display the community course search form.
 * It also handles adding a course to the community block.
 * It also handles downloading a course template.
 *
 * @package    block_streamitup
 * @copyright  2019 Devlion <info@devlion.co>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 1999 onwards Martin Dougiamas  http://dougiamas.com
 */

require('../../config.php');

require_login();
$courseid = required_param('courseid', PARAM_INT);
$parentcourse = $DB->get_record('course', array('id' => $courseid), '*', MUST_EXIST);

$context = context_course::instance($courseid);
$PAGE->set_course($parentcourse);
$PAGE->set_url('/blocks/streamitup/streamitupapi.php');
$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout('embedded');
$PAGE->set_title(get_string('title', 'block_streamitup'));

require_capability('block/streamitup:view', $context);

$blockconfig = get_config('block_streamitup');
$blockinstance = $DB->get_record('block_instances', ['parentcontextid' => $context->id, 'blockname' => 'streamitup']);
if (!empty($blockinstance)) {
    $blockinstance = unserialize(base64_decode($blockinstance->configdata));
}

$roleids = [];

$roles = get_roles_used_in_context($context);
foreach ($roles as $role) {
    $currentrole = $role->shortname;
    switch ($currentrole) {
        case "student":
            $roleids[] = 0;
            break;
        case "teacher":
            $roleids[] = 1;
            break;
        case "editingteacher":
            $roleids[] = 2;
            break;
        default:
            $roleids[] = 4;
    }
    break;
}

if (is_siteadmin()) {
    $roleids[] = 3;
}

$currentrole = implode('#', $roleids);

echo $OUTPUT->header();
echo "<form id=\"gotomember\"  name=\"gotomember\" method=\"post\" action=\"$blockconfig->url\">
<input type=\"hidden\" name=\"lesson_url\" value=\"$blockinstance->defaultlesson\">
<input type=\"hidden\" name=\"username\" value=\"$blockinstance->username\">
<input type=\"hidden\" name=\"passwd\" value=\"$blockinstance->password\">
<input type=\"hidden\" name=\"studentname\" value=\"$USER->username\">
<input type=\"hidden\" name=\"user_role\" value=\"$currentrole\">
<input type=\"image\" src=\"\" alt=\"\" border=\"0\" value = submit /></input>
</form>
<script>
document.getElementById(\"gotomember\").submit();
</script>";
echo $OUTPUT->footer();
