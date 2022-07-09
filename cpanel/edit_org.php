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
                if(isset($_POST['update'])) {

                    $organization    = trim($_POST['organization']);
                    $organization_id = trim($_POST['org_id']);

                    $updateOrg = new Organization();
                    $rtnUpdateOrg = $updateOrg->UPDATE_ORG($organization, $organization_id);
                }
                ?>
                <h4>Edit Club</h4><hr>
                <?php
                if(isset($_GET['id'])) {
                    $org_id = trim($_GET['id']);

                    $editOrg = new Organization();
                    $rtnEditOrg = $editOrg->EDIT_ORG($org_id);
                }
                ?>

                <?php if($rtnEditOrg) { ?>
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" role="form">
                    <?php while($rowEditOrg = $rtnEditOrg->fetch_assoc()) { ?>
                    <div class="form-group-sm">
                        <label for="organization">Organization</label>
                        <input required type="text" name="organization" value="<?php echo $rowEditOrg['org']; ?>" class="form-control">
                    </div><hr>
                    <div class="form-group-sm">
                        <input type="hidden" name="org_id" value="<?php echo $rowEditOrg['id']; ?>">
                        <input type="submit" name="update" value="Update" class="btn btn-info">
                    </div>
                    <?php } //End while ?>
                </form>
                <?php $rtnEditOrg->free(); ?>
                <?php } //End if ?>
            </div>
        </div>
    </div>

    <?php include_once ("inc/footer.php");?>
    
<?php
//Close database connection
$db->close();