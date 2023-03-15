<?php

//Include authentication
require("process/auth.php");

//Include database connection
require("../config/db.php");

//Include class Organization
require("classes/Organization.php");

?>
<?php
// Check if id is set or not, if true,
// toggle else simply go back to the page
if (isset($_GET['id'])){

 
    $sql="UPDATE `organization` SET
        `status`=0 WHERE id='$organization_id'";

    // Execute the query
    mysqli_query($db,$sql);
}

// Go back to add_org.php
header('location: add_org.php');
?>
