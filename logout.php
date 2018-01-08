<?php
session_start();
session_destroy();
echo '<script>sessionStorage.setItem("SessionAdminPass","error");</script>';
header('Location:index.php');
?>