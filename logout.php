<?php
Session_start();
session_reset();
session_destroy();
header("location:index.php");
?>