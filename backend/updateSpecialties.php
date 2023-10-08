<?php
ini_set('display_errors', 1);

session_start();

require 'connect.php';

if(isset($_POST['update'])) {
    $update_id = $_POST ['update_id'];
    $name = $_POST ['name'];
    $type = $_POST ['type'];
    $description = $_POST ['description'];
    $price = $_POST ['price'];

    // image uploud
    $image = $_FILES['image'];
    $name_image = $image['name'];
    $tmp_name = $image['tmp_name'];

    $ext = pathinfo($name_image);
    $extension = $ext['extension'];

    $new_name = uniqid('') . '.' . $extension;
    $allowed = array('png', 'jpg', 'jpeg', 'pdf', 'webp', 'gif','jfif');
    $new_store = 'img/' . $new_name;
    if (in_array($extension, $allowed)) {
        move_uploaded_file($tmp_name, $new_store);
    }
    $query_update = 'UPDATE specialties SET name =  "'.$name. '",type =  "' . $type . '",description =  "' . $description . '",price =  "' . $price . '",image =  "' . $new_name . '"  WHERE id = "'.$update_id.'"';

    $result_update = mysqli_query($connect_db, $query_update);

    $_SESSION['update'] = 'تم تعديل البيانات بنجاح';


    header('location: showSpecialties.php');
}
