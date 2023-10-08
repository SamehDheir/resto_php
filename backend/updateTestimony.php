<?php
ini_set('display_errors', 1);

session_start();

require 'connect.php';

if(isset($_POST['update'])) {
    $update_id = $_POST ['update_id'];
    $quote = $_POST ['quote'];
    $sayes = $_POST ['sayes'];

    // image uploud
   
    $query_update = 'UPDATE testimony SET quote =  "'. $quote. '", sayes =  "' . $sayes . '" WHERE id = "'.$update_id.'"';

    $result_update = mysqli_query($connect_db, $query_update);

    $_SESSION['update'] = 'تم تعديل البيانات بنجاح';


    header('location: showTestimony	.php');
}
