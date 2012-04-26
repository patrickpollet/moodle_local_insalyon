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
 * Course creation  event handler definition.
 *
 * @package   insalyon
 * @copyright 2010 Dongsheng Cai <dongsheng@moodle.com>
 * @copyright 2012 Patrick Pollet pp@patrickpollet.net
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/* List of handlers */
$handlers = array (
    'course_created' => array (
        'handlerfile'      => '/local/insalyon/lib.php',
        'handlerfunction'  => 'local_course_created',
        'schedule'         => 'instant',
        'internal'         => 1,
    ),
   'course_updated' => array (
        'handlerfile'      => '/local/insalyon/lib.php',
        'handlerfunction'  => 'local_course_updated',
        'schedule'         => 'instant',
        'internal'         => 0,
    ),
    'role_assigned' => array (
        'handlerfile'      => '/local/insalyon/lib.php',
        'handlerfunction'  => 'local_role_assigned',
        'schedule'         => 'instant',
        'internal'         => 0,
    ),
    'role_unassigned' => array (
        'handlerfile'      => '/local/insalyon/lib.php',
        'handlerfunction'  => 'local_role_unassigned',
        'schedule'         => 'instant',
        'internal'         => 0,
	),
	 'groups_group_created'     => array(
            'handlerfile'     => '/local/insalyon/lib.php',
            'handlerfunction' => 'local_groups_group_created_handler',
            'schedule'        => 'instant'
        ),
 

);
