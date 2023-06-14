<?php

//Include authentication
require("process/auth.php");

//Include database connection
require("../config/db.php");

//Include class Organization
require("classes/Organization.php");

//Include class Position
require("classes/Position.php");

?>

<?php include_once ("inc/header.php");?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                <?php
                if(isset($_POST['update'])) {
                    $organization   = trim($_POST['organization']);
                    $position       = trim($_POST['position']);
                    $position_id    = trim($_POST['pos_id']);
    
                    $updatePos = new Position();
                    $rtnUpdatePos = $updatePos->UPDATE_POS($organization, $position, $position_id);
                }
                ?>

                <h4>Edit Position</h4><hr>

                <?php
                if(isset($_GET['id'])) {
                    $pos_id = trim($_GET['id']);

                    $editPos = new Position();
                    $rtnEditPos = $editPos->EDIT_POS($pos_id);
                }
                ?>

                <?php if($rtnEditPos) { ?>
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" role="form">
                    <?php while($rowEditPos = $rtnEditPos->fetch_assoc()) { ?>
                    <div class="form-group-sm">
                        <label for="organization">Organization</label>

                            <select required name="organization" class="form-control">

                                <option value="<?php echo $rowEditPos['org']; ?>"><?php echo $rowEditPos['org']; ?></option>

                                <?php
                                $readOrg = new Organization();
                                $rtnReadOrg = $readOrg->READ_ORG();
                                ?>

                                <?php if($rtnReadOrg) { ?>

                                    <?php while($rowOrg = $rtnReadOrg->fetch_assoc()) { ?>
                                        <option value="<?php echo $rowOrg['org']; ?>"><?php echo $rowOrg['org']; ?></option>
                                    <?php } //End while ?>

                                <?php $rtnReadOrg->free(); ?>
                                <?php } //End if ?>
                            </select>

                    </div>
                    <div class="form-group-sm">
                        <label for="position">Position</label>
                        <input required type="text" name="position" value="<?php echo $rowEditPos['pos']; ?>" class="form-control">
                    </div><hr/>
                    <div class="form-group-sm">
                        <input type="hidden" name="pos_id" value="<?php echo $rowEditPos['id']; ?>">
                        <input type="submit" name="update" value="Update" class="btn btn-info">
                    </div>
                    <?php } //End while ?>
                </form>
                <?php $rtnEditPos->free(); ?>
                <?php } //End if ?>
            </div>

        </div>
    </div>

    <?php include_once ("inc/footer.php");?>

<?php
//Close database connection
$db->close();