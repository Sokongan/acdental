<?php
session_destroy();

// Redirect to index.php
header("Location: ./page/login.php");
exit();
?>
