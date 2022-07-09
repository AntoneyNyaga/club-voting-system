
<?php
//Create authentication

//Start session
session_start();

if(!isset($_SESSION['STUD_ID']) && is_array($_SESSION['STUD_ID']) && count($_SESSION['STUD_ID']) > 0) {
    header("location: http://localhost/voting/mindex.php");
    exit();
}