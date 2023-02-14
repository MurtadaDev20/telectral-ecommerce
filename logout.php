<?php

session_start();
session_unset(); // remove session varibal
session_destroy();//تحطيم او هدم 
header('location:index.php');
?>