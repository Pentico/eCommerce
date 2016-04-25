<?php
/**
 * Created by PhpStorm.
 * User: Alfie
 * Date: 2016/04/16
 * Time: 8:48 PM
 */

require('./includes/Config.php');
require (MYSQL); //The database connection
include ('./includes/header.html');

?> <h3> Welcome</h3>
   <p class="lead"> e-commerce for all !</p>

<?php
include ('./includes/footer.html'); //TODO : add the footer file to the project
?>