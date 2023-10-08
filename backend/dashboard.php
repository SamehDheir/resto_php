<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}

require 'layouts/header.php';
?>



<?php
require 'layouts/footer.php';
