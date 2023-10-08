<?php
session_start();
require 'connect.php';
if (isset($_POST['delete'])){
    $delete_id = $_POST ['delete_id'];

    $query = 'DELETE FROM testimony	 WHERE id = "'.$delete_id.'" ';
    $result = mysqli_query($connect_db, $query);
    $_SESSION['delete'] = 'تمت حذف البيانات بنجاح';

    header('location: showTestimony.php');

}
?>