<?php
/**
 * Created by PhpStorm.
 * User: Alfie
 * Date: 2016/04/25
 * Time: 8:27 PM
 */

if(!defined('LIVE')) DEFINE('LIVE', false);
    DEFINE('CONTACT_EMAIL', 'you@example.com');

define('BASE_URI', '/path/to/dir/'); //parent of the web root directory
define('BASE_URL', 'www,example.com/'); //
define('MYSQL', BASE_URI.'mysql.inc.php'); //  Points to mysql script connection

session_start();

function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars){

    $message = "An error occured in script '$e_file' on line:\n$e_message\n";

    $message .= "<pre>" .print_r(debug_backtrace(),1). "</pre>\n";

    $message .= "<pre>" .print_r($e_vars,1). "</pre>\n";

    //if the site is not live, show the errors message in the browser
    if(!LIVE){

        echo '<div class="alert alert-danger">' .nl2br($message).'</div>';
    }else{ //if the site is live, send the error in an email
        error_log($message,1,CONTACT_EMAIL,'FROM:admin@example.com');

        //if the site if live, show a generic message, if the error isn't a notice:
        if ($e_number != E_NOTICE){
            echo '<div class ="alert alert-danger"> A system error occurred, we apologize for the
             inconvenience .</div>';
        } //End of $live IF-ELSE.
        return true;
    }//End of my_error_handler()definition
    set_error_handler('my_error_handler');
}