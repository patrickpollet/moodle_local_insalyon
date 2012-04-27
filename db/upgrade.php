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
 * upgrade code for the local/insalyon module.
 *
 * @package    local
 * @subpackage insalyon
 * @copyright  2009 Petr Skoda
 * @copyright  2012 Patrick Pollet 
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();


/**
 *  this function MUST be present for the upgrade process of a local plugin
 *  note the naming convention xmldb_local_xxxx_upgrade 
 */

function xmldb_local_insalyon_upgrade($oldversion) {
    global $CFG, $DB;

    $dbman = $DB->get_manager();

    //===== adding attributes to mdl_user for LDAP synch  ======//

    if ($oldversion < 2012012413) {
        $table = new xmldb_table('user');

        // primary group in scolarity database
        $field = new xmldb_field('insa_group_scol', XMLDB_TYPE_CHAR, '64', null,null, null, '');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // LDAP attribute unique for any employee, student ...  used by our gravatar like server
        $field = new xmldb_field('insa_unique_id', XMLDB_TYPE_CHAR, '64', null, null, null, '');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        //true if this account has been processed via nightly ldap sync
        $field = new xmldb_field('insa_ldap_sync', XMLDB_TYPE_INTEGER, '1', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        upgrade_plugin_savepoint(true, 2012012413, 'local', 'insalyon', false);



    }




  return true;


}


?>
