<?php
//Start session
session_start();

session_destroy();
header("location: http://localhost/voting/cpanel/index.php");
exit();