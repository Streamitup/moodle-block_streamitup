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
 * Form for editing block_streamitup block instances.
 *
 * @package    block_streamitup
 * @copyright  2019 Devlion <info@devlion.co>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot . '/blocks/streamitup/lib.php');

class block_streamitup_edit_form extends block_edit_form {

    /**
     * Extends the configuration form for block_streamitup.
     */
    protected function specific_definition($mform) {

        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));

        $mform->addElement('text', 'config_title', get_string('title', 'block_streamitup'));
        $mform->setDefault('config_title', get_string('title', 'block_streamitup'));
        $mform->setType('config_title', PARAM_TEXT);

        $contextoptions = array();
        $contextoptions['iframe'] = get_string('iframe', 'block_streamitup');
        $contextoptions['newtab'] = get_string('newtab', 'block_streamitup');
        $mform->addElement('select', 'config_linktype', get_string('linktype', 'block_streamitup'), $contextoptions);
        $mform->setDefault('config_linktype', 'iframe');

        $mform->addElement('text', 'config_username', get_string('defaultusername', 'block_streamitup'));
        $mform->setType('config_username', PARAM_TEXT);

        $mform->addElement('passwordunmask', 'config_password', get_string('defaultpassword', 'block_streamitup'));
        $mform->setType('config_password', PARAM_TEXT);

        $mform->addElement('text', 'config_defaultlesson', get_string('defaultlesson', 'block_streamitup'));
        $mform->setType('config_defaultlesson', PARAM_TEXT);
        $mform->setDefault('config_defaultlesson', 'all_lessons');
    }
}
