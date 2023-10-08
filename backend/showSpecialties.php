<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}

require 'layouts/header.php';
?>

<?php
require 'connect.php';
$query = 'SELECT * FROM specialties';
$result = mysqli_query($connect_db, $query);
?>



<div class="container" style="margin-top: 100px; padding: 0 80px 0 200px;">
    <?php
    if (isset($_SESSION['add'])) {
    ?>
        <div class="alert alert-success p-3">
            <?php
            echo $_SESSION['add'];
            unset($_SESSION['add']);
            ?>
        </div>
    <?php
    }

    ?>
    <?php
    if (isset($_SESSION['delete'])) {
    ?>
        <div class="alert alert-danger p-3">
            <?php
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
            ?>
        </div>
    <?php
    }

    ?>
    <?php
    if (isset($_SESSION['update'])) {
    ?>
        <div class="alert alert-warning p-3">
            <?php
            echo $_SESSION['update'];
            unset($_SESSION['update']);
            ?>
        </div>
    <?php
    }

    ?>
    <h2 class="text-center">Menu</h2>

    <a href="addSpecialties.php" class="btn btn-primary mb-3"><i class="fa-regular fa-calendar-plus"></i> ADD </a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($rows = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $i++ ?></th>
                    <td><?php echo $rows['name'] ?></td>
                    <td><?php echo $rows['type'] ?></td>
                    <td><?php echo $rows['description'] ?></td>
                    <td><?php echo $rows['price'] ?></td>
                    <td><img width="50px" height="50px" class="rounded-pill" src="img/<?php echo $rows['image'] ?>" alt=""></td>
                    <td style="display: flex; width: 220px; justify-content: space-between;">
                        <form action="deleteSpecialties.php" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $rows['id'] ?>">
                            <button type="submit" name="delete" class="btn btn-danger"><i class="fa-regular fa-calendar-xmark"></i> DELETE</button>
                        </form>

                        <form action="editSpecialties.php" method="post">
                            <input type="hidden" name="edit_id" value="<?php echo $rows['id'] ?>">
                            <button type="submit" name="edit" class="btn btn-primary"><i class="fa-solid fa-arrows-rotate"></i> EDIT</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php
require 'layouts/footer.php';
