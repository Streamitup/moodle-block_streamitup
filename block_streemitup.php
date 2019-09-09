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
 * Block streemitup is defined here.
 *
 * @package     block_streemitup
 * @copyright   2019 Devlion <info@devlion.co>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * streemitup block.
 *
 * @package    block_streemitup
 * @copyright  2019 Devlion <info@devlion.co>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

class block_streemitup extends block_base {

    /**
     * Initializes class member variables.
     */
    public function init() {
        // Needed by Moodle to differentiate between blocks.
        $this->title = get_string('pluginname', 'block_streemitup');
    }

    /**
     * Returns the block contents.
     *
     * @return stdClass The block contents.
     */
    public function get_content() {

        if ($this->content !== null) {
            return $this->content;
        }

        if (empty($this->instance)) {
            $this->content = '';
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->items = array();
        $this->content->icons = array();
        $this->content->footer = '';

        if (empty($this->config->url) || empty($this->config->username) || empty($this->config->password)) {
            $this->content->text = get_string('configurationnotset', 'block_streemitup');
            return $this->content;
        }

        if (!empty($this->config->text)) {
            $this->content->text = $this->config->text;
        } else {

            $redirecturl = new moodle_url('/blocks/streemitup/view.php',
                    array('add' => true, 'courseid' => $this->page->course->id));
            $imgsrc = new moodle_url('/blocks/streemitup/images/link.png');

            $buttontitle = get_string('buttontitle', 'block_streemitup');
            $text = html_writer::link($redirecturl,
                    '<input type="image" src="' . $imgsrc . '" alt="' . $buttontitle . '" tutle="' . $buttontitle .
                    '" border="0" value = button /></input>');

            $this->content->text = $text;
        }

        return $this->content;
    }

    /**
     * Defines configuration data.
     *
     * The function is called immediatly after init().
     */
    public function specialization() {

        // Load user defined title and make sure it's never empty.
        if (empty($this->config->title)) {
            $this->title = get_string('pluginname', 'block_streemitup');
        } else {
            $this->title = $this->config->title;
        }
    }

    /**
     * Enables global configuration of the block in settings.php.
     *
     * @return bool True if the global configuration is enabled.
     */
    public function has_config() {
        return false;
    }

    /**
     * Returns true if this block has instance config.
     *
     * @return bool
     **/
    public function instance_allow_config() {
        return true;
    }

    /**
     * Sets the applicable formats for the block.
     *
     * @return string[] Array of pages and permissions.
     */
    public function applicable_formats() {
        return array('course' => true);
    }
}
