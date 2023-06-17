<?php

//Include authentication
require("process/auth.php");

//Include database connection
require("../config/db.php");

//Include class Organization
require("classes/Organization.php");

//Include class Position
require("classes/Position.php");

//Include class Nominees
require("classes/Nominees.php");

?>

<?php include_once ("inc/header.php");?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <?php
            if(isset($_GET['id'])) {
                $nom_id = trim($_GET['id']);

                echo "<div class='alert alert-danger'>Are you sure you want to delete selected nominee? <a href='http://localhost/voting/cpanel/delete_nominee.php?del_id=$nom_id'>Yes</a> | <a href='http://localhost/voting/cpanel/add_nominees.php'>No</a></div>";
            }


        </div>
    </div>
</div>

<?php include_once ("inc/footer.php");?>