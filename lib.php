<?php

defined('MOODLE_INTERNAL') || die();

define ('ADMIN_USER','ppollet');

/**
 *  log a description and a value to a file in moodledata directory
 */

function local_pp_error_log ($intro,$ex) {
        global $CFG;
        if (is_object($ex) || is_array($ex)){
                $info=print_r((array)$ex,true);
        }else $info=$ex."\n";
        error_log (time().' : ' .$intro.' : '.$info,3,$CFG->dataroot.'/pp_debug_errors.log' );
}

/**
 * course created event handler
 *
 * @param object $course full $course object just inserted in DB
 */
function local_course_created($course) {
    global $DB,$CFG,$USER;
    local_pp_error_log ("processing course created local event@insalyon",$course);
    return true; //important
   
}


/**
* course created event handler
*
* @param object $course full $course object just inserted in DB
*/
function local_course_updated($course) {
    global $DB,$CFG,$USER;
    local_pp_error_log ("processing course updated local event@insalyon",$course);
    return true; //important
}

/**
 * role asiigned  event handler
 *
 * @param object $ra full object just updated in DB
 */
function local_role_assigned($ra) {
    global $DB,$CFG,$USER;
    local_pp_error_log ("processing role assigned local event@insalyon",$ra);
    return true; //important
}  


/**
 * role unsiigned  event handler
 *
 * @param object $ra full object just updated in DB
 */
function local_role_unassigned($ra) {
    global $DB,$CFG,$USER;
    local_pp_error_log ("processing role unassigned local event@insalyon",$ra);
    return true; //important

}



/**
 * user enrolled  event handler
 *
 * @param object $ue full object just updated in DB
 */
function local_user_enrolled($ue) {
    global $DB,$CFG,$USER;
    local_pp_error_log ("processing user enrolled local event@insalyon",$ue);
    return true; //important

}


/**
 * user unenrolled  event handler
 *
 * @param object $ue full object just updated in DB
 */
function local_user_unenrolled($ue) {
    global $DB,$CFG,$USER;
    local_pp_error_log ("processing user unenrolled local event@insalyon",$ue);
    return true; //important

}

/**
 * user enrol updated  event handler
 *
 * @param object $ue full object just updated in DB
 */
function local_user_enrol_modified($ue) {
    global $DB,$CFG,$USER;
    local_pp_error_log ("processing user enrol modified local event@insalyon",$ue);
    return true; //important

}

function local_groups_group_created_handler($eventdata) {
    global $CFG;
	 local_pp_error_log ("processing group created local event@insalyon",$eventdata);
    if(!$CFG->enablegroupings) {
        return true;   //ignore
    }

    $data = new stdClass();

    $data->courseid     = $eventdata->courseid;
    $data->name         = $eventdata->name;
    $data->description  = $eventdata->description;
    $data->timecreated  = $eventdata->timecreated;
    $data->timemodified = $eventdata->timemodified;

    if(!($id = groups_create_grouping($data))) {
        return false;
    }

    if(!groups_assign_grouping($id, $eventdata->id)) {
        return false;
    }

    return true;
}

?>
