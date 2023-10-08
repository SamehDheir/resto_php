<?php
session_start();
require 'connect.php';

if (isset($_POST['add'])) {
    $quote = $_POST['quote'];
    $sayes = $_POST['sayes'];

    // image uploud

    $query = 'INSERT INTO testimony VALUES(NULL,"' . $quote . '","' . $sayes . '")';
    $result = mysqli_query($connect_db, $query);
    $_SESSION['add'] = 'تم اضافة البيانات بنجاح';
    header('location:showTestimony.php');
}
?>

<?php
ini_set('display_errors', 1);

require 'layouts/header.php';
?>




<form method="post" enctype="multipart/form-data" style="margin-top: 100px; margin-left: 300px;">
    <div class="container">
        <div class="mb-3">
            <label class="form-label">Quote</label>
            <input type="text" name="quote" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Sayes</label>
            <input type="text" name="sayes" class="form-control">
        </div>
        <button type="submit" name="add" class="btn btn-primary">Submit</button>
    </div>
</form>

<?php
require 'layouts/footer.php'

?>