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
 * Form for editing streemitup block instances.
 *
 * @package     block_streemitup
 * @copyright   2019 Devlion <info@devlion.co>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Form for editing block_streemitup block instances.
 *
 * @package    block_streemitup
 * @copyright  2019 Devlion <info@devlion.co>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class block_streemitup_edit_form extends block_edit_form {

    /**
     * Extends the configuration form for block_streemitup.
     */
    protected function specific_definition($mform) {

        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));

        $mform->addElement('text', 'config_title', get_string('title', 'block_streemitup'));
        $mform->setDefault('config_title', get_string('title', 'block_streemitup'));
        $mform->setType('config_title', PARAM_TEXT);

        $mform->addElement('text', 'config_url', get_string('defaulturl', 'block_streemitup'));
        $mform->setType('config_url', PARAM_TEXT);

        $mform->addElement('text', 'config_username', get_string('defaultusername', 'block_streemitup'));
        $mform->setType('config_username', PARAM_TEXT);

        $mform->addElement('text', 'config_password', get_string('defaultpassword', 'block_streemitup'));
        $mform->setType('config_password', PARAM_TEXT);

        $mform->addElement('text', 'config_defaultlesson', get_string('defaultlesson', 'block_streemitup'));
        $mform->setType('config_defaultlesson', PARAM_TEXT);
        $mform->setDefault('config_defaultlesson', 'all_lessons');
    }
}
