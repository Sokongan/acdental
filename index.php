<?php
require_once __DIR__ . '/config/bootstrap.php';
if (!$_SESSION['username']) {
    header("Location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('lib/includes.php') ?>
<body>
<div class="container">
    <!--Header!-->

    <div class="header">
        <?php include('grid/header.php'); ?>
    </div>

    <div class="footer">
        <?php include('grid/footer.php'); ?>
    </div>

</div>
</body>
</html>
