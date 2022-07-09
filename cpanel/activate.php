<?php

//Include authentication
require("process/auth.php");

//Include database connection
require("../config/db.php");

//Include class Organization
require("classes/Organization.php");

?>
<?php include_once("inc/header.php"); ?><?php

	
	if (isset($_GET['id'])){

		// Store the value from get to a
		// local variable "course_id"
		$organization_id=$_GET['id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `organization` SET
			`status`=1 WHERE id='$organization_id'";

		// Execute the query
		mysqli_query($db,$sql);
	}

	// Go back to cadd_org.php
	header('location: add_org.php');
?>
