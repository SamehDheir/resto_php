<?php
ini_set('display_errors', 1);

require 'layouts/header.php';
require 'connect.php';
?>


<?php
if (isset($_POST['edit'])) {
  $edit_id = $_POST['edit_id'];

  $query = 'SELECT * FROM specialties WHERE id = "' . $edit_id . '" ';
  $result = mysqli_query($connect_db, $query);
  $row = mysqli_fetch_array($result);
}
?>

<form method="post" action="updateSpecialties.php" enctype="multipart/form-data" style="margin-top: 100px; margin-left: 300px;">
  <input type="hidden" value="<?php echo $row['id'] ?>" name="update_id">
  <div class="container">
    <div class="mb-3">
      <label class="form-label">name</label>
      <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Type</label>
      <input type="text" name="type" value="<?php echo $row['type'] ?>" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Price</label>
      <input type="text" name="price" value="<?php echo $row['price'] ?>" class="form-control">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Description</label>
      <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="input-group mb-3">
      <input type="file" name="image" class="form-control" id="inputGroupFile02">
      <label class="input-group-text" for="inputGroupFile02">Upload</label>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Submit</button>
  </div>
</form>

<?php
require 'layouts/footer.php'

?>