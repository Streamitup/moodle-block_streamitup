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
 * The comments block helper functions and callbacks
 *
 * @package    block_streamitup
 * @copyright  2019 Devlion <info@devlion.co>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
define('BLOCK_STREAMITUP_IFRANE', 'iframe');
define('BLOCK_STREAMITUP_NEWTAB', 'newtab');

/**
 * Get specific block instance
 *
 * @package  block_streamitup
 *
 * @param object $context
 * @return object
 */
function block_streamitup_instance($context) {
    global $DB;
    $blockinstance = $DB->get_record('block_instances', ['parentcontextid' => $context->id, 'blockname' => 'streamitup']);
    if (!empty($blockinstance)) {
        return unserialize(base64_decode($blockinstance->configdata));
    }
    return null;
}
