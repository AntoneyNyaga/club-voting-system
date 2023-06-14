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