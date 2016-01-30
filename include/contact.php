<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Teodor Muraru <temuraru@gmail.com>
 * Date: 9/1/12
 * Time: 8:38 AM
 */

$GLOBALS['ct_recipient']   = 'temuraru@gmail.com'; // Change to your email address!
$GLOBALS['ct_msg_subject'] = 'Contact M&Dorado';

$GLOBALS['DEBUG_MODE'] = 0;
// CHANGE TO 0 TO TURN OFF DEBUG MODE
// IN DEBUG MODE, ONLY THE CAPTCHA CODE IS VALIDATED, AND NO EMAIL IS SENT


// Process the form, if it was submitted
process_si_contact_form();

// The form processor PHP code
function process_si_contact_form()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // if the form has been submitted

        foreach($_POST as $key => $value) {
            if (!is_array($key)) {
                // sanitize the input data
                if ($key != 'ct_message') $value = strip_tags($value);
                $_POST[$key] = htmlspecialchars(stripslashes(trim($value)));
            }
        }

        $name    = @$_POST['name'];    // name from the form
        $email   = @$_POST['email'];   // email from the form
        $message = @$_POST['message']; // the message from the form
        $captcha = @$_POST['captcha_code']; // the user's entry for the captcha code
        $name    = substr($name, 0, 64);  // limit name to 64 characters

        $errors = array();  // initialize empty error array

        if (isset($GLOBALS['DEBUG_MODE']) && $GLOBALS['DEBUG_MODE'] == false) {
            // only check for errors if the form is not in debug mode

            if (strlen($name) < 3) {
                // name too short, add error
                $errors['name_error'] = 'Your name is required';
            }

            if (strlen($email) == 0) {
                // no email address given
                $errors['email_error'] = 'Email address is required';
            } else if ( !preg_match('/^(?:[\w\d]+\.?)+@(?:(?:[\w\d]\-?)+\.)+\w{2,4}$/i', $email)) {
                // invalid email format
                $errors['email_error'] = 'Email address entered is invalid';
            }

            if (strlen($message) < 10) {
                // message length too short
                $errors['message_error'] = 'Please enter a message';
            }

            if (strlen($captcha) < 6) {
                // message length too short
                $errors['captcha_error'] = 'Please enter the captcha code';
            }
        }

        // Only try to validate the captcha if the form has no errors
        // This is especially important for ajax calls
        if (sizeof($errors) == 0) {
            require_once APPLICATION_PATH . '/securimage/securimage.php';
            $securimage = new Securimage();

            if ($securimage->check($captcha) == false) {
                $errors['captcha_error'] = 'Incorrect security code entered';
            }
        }

        if (sizeof($errors) == 0) {
            // no errors, send the form
            $time       = date('r');
            $message = "A message was submitted from the contact form.  The following information was provided.<br /><br />"
                . "Name: $name<br />"
                . "Email: $email<br />"
                . "Message:<br />"
                . "<pre>$message</pre>"
                . "<br /><br />IP Address: {$_SERVER['REMOTE_ADDR']}<br />"
                . "Time: $time<br />"
                . "Browser: {$_SERVER['HTTP_USER_AGENT']}<br />";

            if (isset($GLOBALS['DEBUG_MODE']) && $GLOBALS['DEBUG_MODE'] == false) {
                // send the message with mail()
                mail($GLOBALS['ct_recipient'], $GLOBALS['ct_msg_subject'], $message, "From: {$GLOBALS['ct_recipient']}\r\nReply-To: {$email}\r\nContent-type: text/html; charset=ISO-8859-1\r\nMIME-Version: 1.0");
            }

            $return = array('error' => 0, 'message' => 'OK', 'fields' => array());
            die(json_encode($return));
        } else {
            $errmsg = ''; $fields = array();
            foreach($errors as $key => $error) {
                // set up error messages to display with each field
                $errmsg .= "{$error}<br />";
                $fields[$key] = $error;
            }

            $return = array('error' => 1, 'message' => $errmsg, 'fields' => $fields);
            die(json_encode($return));
        }
    } // POST
} // function process_si_contact_form()
