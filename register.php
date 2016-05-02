<?php
/**
 * Created by PhpStorm.
 * User: Alfie
 * Date: 2016/05/02
 * Time: 10:06 PM
 */
require('./includes/config.inc.php');
require (MYSQL);
$page_title ='Register';

//Require the database connection:
include ('./includes/header.html');

//For storing registration errors
$reg_errors = array();

//Check for a submission:
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //check for firstname:
    if(preg_match('/^[A-Z\'.-]{2,45}$/i',$_POST['first_name'])){
        $fn = escape_data($_POST['first_name'], $dbc);
    }else{
        $reg_errors['first_name'] = 'Please enter your first name!';
    }

    // Check for a last name:
    if (preg_match('/^[A-Z \'.-]{2,45}$/i', $_POST['last_name'])) {
        $ln = escape_data($_POST['last_name'], $dbc);
    } else {
        $reg_errors['last_name'] = 'Please enter your last name!';
    }

    // Check for a username:
    if (preg_match('/^[A-Z0-9]{2,45}$/i', $_POST['username'])) {
        $u = escape_data($_POST['username'], $dbc);
    } else {
        $reg_errors['username'] = 'Please enter a desired name using only letters and numbers!';
    }
    
    //Check for an email address:
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) === $_POST['email']){
        $e = escape_data($_POST['email'], $dbc);
    }else{
        $reg_errors['email'] = 'Please enter a valid email address!';
    }

    // Check for a password and match against the confirmed password:
    if (preg_match('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,}$/', $_POST['pass1']) ) {
        if ($_POST['pass1'] === $_POST['pass2']) {
            $p = $_POST['pass1'];
        } else {
            $reg_errors['pass2'] = 'Your password did not match the confirmed password!';
        }
    } else {
        $reg_errors['pass1'] = 'Please enter a valid password!';
    }
}

?>

<h1>Register</h1>
<p>
    Assess to the site's content is availabe to registered users at a cost
</p>

<?php include ('./includes/footer.html');?>
