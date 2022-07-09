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

<?php include_once("inc/header.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h4>Add Position</h4><hr>
            <?php

            if(isset($_POST['submit'])) {

                $organization   = trim($_POST['organization']);
                $pos            = trim($_POST['position']);

                $insertPos = new Position();
                $rtnInsertPos = $insertPos->INSERT_POS($organization, $pos);
            }
            ?>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" role="form">
                <?php
                $readOrg = new Organization();
                $rtnReadOrg = $readOrg->READ_ORG();
                ?>
                <div class="form-group-sm">
                    <label for="organization">Club</label>
                    <?php if($rtnReadOrg) { ?>
                    <select required name="organization" class="form-control">
                        <option value="">*****Select Club*****</option>
                        <?php while($rowOrg = $rtnReadOrg->fetch_assoc()) { ?>
                        <option value="<?php echo $rowOrg['org']; ?>"><?php echo $rowOrg['org']; ?></option>
                        <?php } //End while ?>
                    </select>
                    <?php $rtnReadOrg->free(); ?>
                    <?php } //End if ?>
                </div>
                <div class="form-group-sm">
                    <label for="position">Position</label>
                    <input required type="text" name="position" class="form-control">
                </div><hr/>
                <div class="form-group-sm">
                    <input type="submit" name="submit" value="Submit" class="btn btn-info">
                </div>
            </form>
        </div>

        <?php
        $readPos = new Position();
        $rtnReadPos = $readPos->READ_POS();
        ?>
        <div class="col-md-8">
            <h4>List of Positions</h4><hr>
            <div class="table-responsive">
                <?php if($rtnReadPos) { ?>
                <table class="table table-bordered table-condensed table-striped">
                    <tr>
                        <th>Club</th>
                        <th>Position</th>
                        <th><span class="glyphicon glyphicon-edit"></span></th>
                        <th><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                    <?php while($rowPos = $rtnReadPos->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $rowPos['org']; ?></td>
                        <td><?php echo $rowPos['pos']; ?></td>
                        <td><a href="http://localhost/voting/cpanel/edit_pos.php?id=<?php echo $rowPos['id']; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <td><a href="http://localhost/voting/cpanel/delete_pos.php?id=<?php echo $rowPos['id']; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
                    </tr>
                    <?php } //End while ?>
                </table>
                    <?php $rtnReadPos->free(); ?>
                <?php } //End if ?>
            </div>
        </div>
    </div>
</div>

<?php include_once ("inc/footer.php");?>

<?php
//Close database connection
$db->close();