<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}

require 'layouts/header.php';
?>

<?php
require 'connect.php';
$query = 'SELECT * FROM testimony';
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
    <h2 class="text-center">Testimony</h2>

    <a href="addTestimony.php" class="btn btn-primary mb-3"><i class="fa-regular fa-calendar-plus"></i> ADD </a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Quote</th>
                <th scope="col">Sayes</th>

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
                    <td><?php echo $rows['quote'] ?></td>
                    <td><?php echo $rows['sayes'] ?></td>

                    <td style="display: flex; width: 220px; justify-content: space-between;">
                        <form action="deleteTestimony	.php" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $rows['id'] ?>">
                            <button type="submit" name="delete" class="btn btn-danger"><i class="fa-regular fa-calendar-xmark"></i> DELETE</button>
                        </form>

                        <form action="editTestimony	.php" method="post">
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
