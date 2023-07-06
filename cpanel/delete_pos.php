<?php

//Include authentication
require("process/auth.php");

//Include database connection
require("../config/db.php");

//Include class Position
require("classes/Position.php");

?>

<?php include_once ("inc/header.php");?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?php
                if(isset($_GET['id'])) {
                    $pos_id = trim($_GET['id']);

                    echo "<div class='alert alert-danger'>Are you sure you want to delete selected position? <a href='http://localhost/voting/cpanel/delete_pos.php?del_id=$pos_id'>Yes</a> | <a href='http://localhost/voting/cpanel/add_pos.php'>No</a></div>";
                }


                
            </div>
        </div>
    </div>

    <?php include_once ("inc/footer.php");?>

<?php
/* Close database connection*/
$db->close();