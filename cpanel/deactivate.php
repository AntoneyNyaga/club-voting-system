<?php

//Include authentication
require("process/auth.php");

//Include database connection
require("../config/db.php");

//Include class Organization
require("classes/Organization.php");

?>


    // Store the value from get to
    // a local variable "course_id"
    $organization_id=$_GET['id'];

    // SQL query that sets the status to
    // 0 to indicate deactivation.
    $sql="UPDATE `organization` SET
        `status`=0 WHERE id='$organization_id'";

    // Execute the query
    mysqli_query($db,$sql);
}

// Go back to add_org.php
header('location: add_org.php');
?>
