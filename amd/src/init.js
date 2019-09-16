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
 * Javascript to initialise the streamitup block.
 *
 * @package    block_streamitup
 * @copyright  2019 Devlion <info@devlion.co>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define(
    [
        'jquery'
    ],
    function (
        $
    ) {
        /**
         * Initialise all of the modules for the overview block.
         *
         * @param {string} url The target url
         */
        var init = function (linktype, constiframe, constnewtab) {

            $('#block_streamitup_linktype_select').change(function () {
                $('#block_streamitup_' + constiframe).hide();
                $('#block_streamitup_' + constnewtab).hide();

                if ($(this).val() == constiframe) {
                    $('#block_streamitup_' + constiframe).show();
                    $('#block_streamitup_' + constnewtab).hide();
                } else {
                    $('#block_streamitup_' + constiframe).hide();
                    $('#block_streamitup_' + constnewtab).show();
                }
            });

            $("#block_streamitup_linktype_select option[value=" + linktype + "]").attr('selected', 'selected');

            if (linktype == constiframe) {
                $('#block_streamitup_' + constiframe).show();
                $('#block_streamitup_' + constnewtab).hide();
            } else {
                $('#block_streamitup_' + constiframe).hide();
                $('#block_streamitup_' + constnewtab).show();
            }

        };
        return {
            init: init
        };
    });
