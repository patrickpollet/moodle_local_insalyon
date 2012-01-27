<?php

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


?>
