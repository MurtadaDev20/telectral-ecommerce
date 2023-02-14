<?php 
$host ='localhost';
$user='root';
$pass='';
$db= 'telectral';
$con= mysqli_connect($host , $user , $pass , $db);

if(!$con){
    echo "Connction Filed";
    exit();
}