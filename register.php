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

include ('./includes/header.html');
require_once ('./includes/form_functions.inc.php');
?>

<h1>Register</h1>
<p>
    Assess to the site's content is availabe to registered users at a cost
</p>

<?php include ('./includes/footer.html');?>
