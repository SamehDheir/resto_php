<?php
session_start();
require 'connect.php';
if (isset($_POST['delete'])){
    $delete_id = $_POST ['delete_id'];


    $query_image = 'SELECT * FROM menu WHERE id = "'.$delete_id.'" ';
    $result_image = mysqli_query($connect_db, $query_image);
    $row_image = mysqli_fetch_array($result_image);
    $image = $row_image['image'];
    $storage_image = "img/$image";
    if (file_exists($storage_image)) {
        unlink($storage_image);
    }


    $query = 'DELETE FROM menu WHERE id = "' . $delete_id . '" ';
    $result = mysqli_query($connect_db, $query);

    $_SESSION['delete'] = 'تمت حذف البيانات بنجاح';
    header('location: showMenu.php');

}
