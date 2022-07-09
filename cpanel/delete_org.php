<?php

//Include authentication
require("process/auth.php");

//Include database connection
require("../config/db.php");

//Include class Organization
require("classes/Organization.php");

?>

<?php include_once ("inc/header.php");?>

<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?php
                if(isset($_GET['id'])) {
                    $org_id = trim($_GET['id']);

                    echo "<div class='alert alert-danger'>Are you sure you want to delete selected club? <a href='http://localhost/voting/cpanel/delete_org.php?del_id=$org_id'>Yes</a> | <a href='http://localhost/voting/cpanel/add_org.php'>No</a></div>";
                }


                if(isset($_GET['del_id'])) {
                    $id_to_del = $_GET['del_id'];

                    $delOrg = new Organization();
                    $rtnDelOrg = $delOrg->DELETE_ORG($id_to_del);
                }
                ?>
            </div>
        </div>
    </div>

    <?php include_once ("inc/footer.php");?>
    
<?php
//Close database connection
$db->close();