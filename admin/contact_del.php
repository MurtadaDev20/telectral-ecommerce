<?php

if (!isset($_SESSION['username'])) {
    header("location:index.php");
}

?>
<?php
// include 'inc/header.php';
include 'function/db.php';
if (isset($_GET['id'])) {
    $del_id = $_GET['id'];
    $query = "DELETE from contact where contact_id ='$del_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header('location:news_contact.php');
    }
}
