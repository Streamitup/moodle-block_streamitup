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
$PAGE->set_url('/blocks/streamitup/view.php');
$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout('incourse');
$PAGE->set_title(get_string('title', 'block_streamitup'));
$PAGE->navbar->add(get_string('title', 'block_streamitup'));

require_capability('block/streamitup:view', $context);
$urlapi = new moodle_url('/blocks/streamitup/streamitupapi.php', array('courseid' => $courseid));

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('title', 'block_streamitup'), 3, 'main');
echo "<iframe  id='block_streamitup_videolist' src='" . $urlapi . "'></iframe>";
echo $OUTPUT->footer();
