<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../../config.php');
require_once("$CFG->libdir/formslib.php");
$context = context_system::instance();
$title = get_string('pluginname', 'local_rdcleaning');
$PAGE->set_context($context);
$PAGE->set_pagelayout('standard');
$PAGE->set_url('/local/rdcleaning/index.php');
$PAGE->set_title($title);
$PAGE->set_heading($title);
global $CFG, $DB,$USER;
echo $OUTPUT->header();
$from = $DB->get_record('user',['id'=>16]);
$senderid = $USER->id;
        $contact = get_complete_user_data('id',16);//$from;
        $subject="Notes";
        $messagetext="hirtjhhkokhighilbn";
        $messagehtml =text_to_html($messagetext, null, false, true);
     $rr =  email_to_user($USER,$contact, $subject, $messagetext, $messagehtml);
//$rr=email_welcome_message();
     if($rr){
         echo "yes";
     }else{
         echo "No";
     }
//    print_object($rr);
//     $sender = 'vrkulshrestha@gmail.com';
//$recipient = 'vraj@mrccsolutions.com';
//
//$subject = "php mail test";
//$message = "php test message";
//$headers = 'From:' . $sender;
//
//if (mail($recipient, $subject, $message, $headers))
//{
//    echo "Message accepted";
//}
//else
//{
//    echo "Error: Message not accepted";
//}
echo $OUTPUT->footer();
function email_welcome_message() {
        global $CFG, $DB,$USER;

//        $course = $DB->get_record('course', array('id'=>$instance->courseid), '*', MUST_EXIST);
//        $context = context_course::instance($course->id);

//        $a = new stdClass();
//        $a->coursename = "Democourse";//format_string($course->fullname, true, array('context'=>$context));
//        $a->profileurl = "www.abc.com";//"$CFG->wwwroot/user/view.php?id=$user->id&course=$course->id";

//        if (trim($instance->customtext1) !== '') {
//            $message = $instance->customtext1;
//            $key = array('{$a->coursename}', '{$a->profileurl}', '{$a->fullname}', '{$a->email}');
//            $value = array($a->coursename, $a->profileurl, fullname($user), $user->email);
//            $message = str_replace($key, $value, $message);
//            if (strpos($message, '<') === false) {
                // Plain text only.
//                $messagetext = $message;
//                $messagehtml = text_to_html($messagetext, null, false, true);
//            } else {
//                // This is most probably the tag/newline soup known as FORMAT_MOODLE.
//                $messagehtml = format_text($message, FORMAT_MOODLE, array('context'=>$context, 'para'=>false, 'newlines'=>true, 'filter'=>true));
//                $messagetext = html_to_text($messagehtml);
//            }
//        } else {
//            $messagetext = get_string('welcometocoursetext', 'enrol_self', $a);
//            $messagehtml = text_to_html($messagetext, null, false, true);
//        }
//
//        $subject = get_string('welcometocourse', 'enrol_self', format_string($course->fullname, true, array('context'=>$context)));
//
//        $sendoption = $instance->customint4;
//        $contact = $this->get_welcome_email_contact($sendoption, $context);

        // Directly emailing welcome message rather than using messaging.
        $from = $DB->get_record('user',['id'=>16]);
        $contact = $from;//"tenwindow68@gmail.com";//core_user::get_noreply_user();
        $subject="Notes";
        $messagetext="hirtjhhkokhighilbn";
        $messagehtml =text_to_html($messagetext, null, false, true);
        email_to_user($USER, $contact, $subject, $messagetext, $messagehtml);
    }
//    $rr=email_welcome_message();
//    print_object($rr);die;
//     function get_welcome_email_contact($sendoption, $context) {
//        global $CFG;
//
//        $contact = null;
//        // Send as the first user assigned as the course contact.
//        if ($sendoption == ENROL_SEND_EMAIL_FROM_COURSE_CONTACT) {
//            $rusers = array();
//            if (!empty($CFG->coursecontact)) {
//                $croles = explode(',', $CFG->coursecontact);
//                list($sort, $sortparams) = users_order_by_sql('u');
//                // We only use the first user.
//                $i = 0;
//                do {
//                    $allnames = get_all_user_name_fields(true, 'u');
//                    $rusers = get_role_users($croles[$i], $context, true, 'u.id,  u.confirmed, u.username, '. $allnames . ',
//                    u.email, r.sortorder, ra.id', 'r.sortorder, ra.id ASC, ' . $sort, null, '', '', '', '', $sortparams);
//                    $i++;
//                } while (empty($rusers) && !empty($croles[$i]));
//            }
//            if ($rusers) {
//                $contact = array_values($rusers)[0];
//            }
//        } else if ($sendoption == ENROL_SEND_EMAIL_FROM_KEY_HOLDER) {
//            // Send as the first user with enrol/self:holdkey capability assigned in the course.
//            list($sort) = users_order_by_sql('u');
//            $keyholders = get_users_by_capability($context, 'enrol/self:holdkey', 'u.*', $sort);
//            if (!empty($keyholders)) {
//                $contact = array_values($keyholders)[0];
//            }
//        }
//
//        // If send welcome email option is set to no reply or if none of the previous options have
//        // returned a contact send welcome message as noreplyuser.
//        if ($sendoption == ENROL_SEND_EMAIL_FROM_NOREPLY || empty($contact)) {
//            $contact = core_user::get_noreply_user();
//        }
//
//        return $contact;
//    }