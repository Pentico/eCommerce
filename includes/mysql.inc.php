<?php
/**
 * Created by PhpStorm.
 * User: Alfie
 * Date: 2016/04/25
 * Time: 7:46 PM
 */

DEFINE('DB_USER','Alfred');
DEFINE('DB_PASSWORD','Pentico2Pen');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','ecommerce1');

//connectiong to the database
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//Character set:
mysqli_set_charset($dbc,'utf8');

function escape_data($data, $dbc){

    if(get_magic_quotes_gpc())  $data = stripslashes($data);

    return mysqli_real_escape_string($dbc, trim($data));
    
} //End of the escape_data function