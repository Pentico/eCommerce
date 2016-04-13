<?php
/**
 * Created by PhpStorm.
 * User: Alfie
 * Date: 2016/04/06
 * Time: 8:52 PM
 */

//database functions ::MYSQL

function db_connect($host,$user,$pass){
    //create a connection
    return mysql_connect($host,$user,$pass);
} 

//select database
function db_select_db($name){
    
    return mysql_select_db($name);
}

//database query
function db_query($s){
    return mysql_query($s);
}

//db fetch row
function db_fetch_row($q){
    return mysql_fetch_row($q);
}

//insert
function db_insert_id(){
    return mysql_insert_id();
}


//database error message
function db_error(){
    return mysql_error();
}