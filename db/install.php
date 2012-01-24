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
 * installation code for the local/insalyon module.
 *
 * @package    local
 * @subpackage insalyon
 * @copyright  2009 Petr Skoda
 * @copyright  2012 Patrick Pollet 
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();


/**
 *  this function MUST be present for the install process of a local plugin
 *  note the naming convention xmldb_local_xxxx_install 
 */

function xmldb_local_insalyon_install($oldversion) {
    global $CFG, $DB;

  return true;


}


?>
