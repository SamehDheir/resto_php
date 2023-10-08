<?php
ini_set('display_errors', 1);

require 'layouts/header.php';
require 'connect.php';
?>


<?php
if (isset($_POST['edit'])) {
  $edit_id = $_POST['edit_id'];

  $query = 'SELECT * FROM testimony	 WHERE id = "' . $edit_id . '" ';
  $result = mysqli_query($connect_db, $query);
  $row = mysqli_fetch_array($result);
}
?>

<form method="post" action="updateTestimony.php" enctype="multipart/form-data" style="margin-top: 100px; margin-left: 300px;">
  <input type="hidden" value="<?php echo $row['id'] ?>" name="update_id">
  <div class="container">
    <div class="mb-3">
      <label class="form-label">name</label>
      <input type="text" name="quote" value="<?php echo $row['quote'] ?>" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Jop</label>
      <input type="text" name="sayes" value="<?php echo $row['sayes'] ?>" class="form-control">
    </div>

    <button type="submit" name="update" class="btn btn-primary">Submit</button>
  </div>
</form>

<?php
require 'layouts/footer.php'

?>