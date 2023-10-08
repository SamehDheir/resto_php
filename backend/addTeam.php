<?php
session_start();
require 'connect.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $jop = $_POST['jop'];

    // image uploud
    $image = $_FILES['image'];
    $name_image = $image['name'];
    $tmp_name = $image['tmp_name'];

    $ext = pathinfo($name_image);
    $extension = $ext['extension'];

    $new_name = uniqid('') . '.' . $extension;
    $allowed = array('png', 'jpg', 'jpeg', 'pdf', 'webp', 'gif');
    $new_store = 'img/' . $new_name;
    if (in_array($extension, $allowed)) {
        move_uploaded_file($tmp_name, $new_store);
    }
    $query = 'INSERT INTO team VALUES(NULL,"' . $name . '","' . $jop . '","' . $new_name . '")';
    $result = mysqli_query($connect_db, $query);
    $_SESSION['add'] = 'تم اضافة البيانات بنجاح';
    header('location:showTeam.php');
}
?>

<?php
ini_set('display_errors', 1);

require 'layouts/header.php';
?>




<form method="post" enctype="multipart/form-data" style="margin-top: 100px; margin-left: 300px;">
    <div class="container">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Jop</label>
            <input type="text" name="jop" class="form-control">
        </div>
        
        <div class="input-group mb-3">
            <input type="file" name="image" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
        <button type="submit" name="add" class="btn btn-primary">Submit</button>
    </div>
</form>

<?php
require 'layouts/footer.php'

?>