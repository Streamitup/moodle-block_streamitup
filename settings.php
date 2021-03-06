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
 * Plugin administration pages are defined here.
 *
 * @package     block_streemitup
 * @category    admin
 * @copyright   2019 Devlion <info@devlion.co>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    // Default username.
    $setting = new admin_setting_configtext('block_streamitup/url',
            new lang_string('defaulturl', 'block_streamitup'),
            new lang_string('defaulturl_desc', 'block_streamitup'), '', PARAM_TEXT);
    $settings->add($setting);

    // Default username.
    $setting = new admin_setting_configtext('block_streamitup/imageurl',
            new lang_string('imageurl', 'block_streamitup'),
            new lang_string('imageurl_desc', 'block_streamitup'), '', PARAM_TEXT);
    $settings->add($setting);

}
