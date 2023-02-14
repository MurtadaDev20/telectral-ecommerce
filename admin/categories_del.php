<?php
include 'function/config.php';

if (isset($_GET['id'])) {
    $del_id = $_GET['id'];
    $query = "DELETE from categories where id ='$del_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header('location:categories_manage.php');
    }
}
