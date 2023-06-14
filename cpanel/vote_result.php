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

<?php
$readOrg = new Organization();
$rtnReadOrg = $readOrg->READ_ORG();
?>
<div class="container">
    <div class="row">
        <?php if($rtnReadOrg) { ?>
        <div class="col-md-3">
            <h3>Select Club</h3><hr>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="GET" role="form">
                <div class="form-group">
                    <label for="organization">Club</label>
                    <select name="organization" class="form-control">
                        <option value="">*****Select Club*****</option>
                        <?php while($rowOrg = $rtnReadOrg->fetch_assoc()) { ?>
                        <option value="<?php echo $rowOrg['org']; ?>"><?php echo $rowOrg['org']; ?></option>
                        <?php } //End while ?>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
            <?php $rtnReadOrg->free(); ?>
        <?php } //End if ?>


        <div class="col-md-9">
            <?php
            if(!isset($_GET['organization'])) {
                echo "<div class='alert alert-warning'>Please select Club and click submit to show vote result.</div>";
            } else {
            $org = trim($_GET['organization']);
            ?>
                <a href="http://localhost/voting/cpanel/print_result.php?organization=<?php echo $org; ?>"><h3><span class="glyphicon glyphicon-print pull-right"></h3></span> </a>
                <h4><?php echo $org; ?> Result</h4>
                <hr>

                <?php
                $readPos = new Position();
                $rtnReadPos = $readPos->READ_POS_BY_ORG($org);
                ?>

                <?php if($rtnReadPos) { ?>

                    <?php while($rowPos = $rtnReadPos->fetch_assoc()) { ?>
                    <h5><?php echo $rowPos['pos']; ?></h5>

                        <?php
                        $readNomOrgPos = new Nominees();
                        $rtnReadNomOrgPos = $readNomOrgPos->READ_NOM_BY_ORG_POS($org, $rowPos['pos']);
                        ?>

                        <div class="table-responsive">
                            <?php if($rtnReadNomOrgPos) { ?>
                            <table class="table table-condensed table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Votes</th>
                                </tr>
                                <?php while($rowCountVotes = $rtnReadNomOrgPos->fetch_assoc()) { ?>




                                    <?php
                                    $countVotes = new Nominees();
                                    $rtnCountVotes = $countVotes->COUNT_VOTES($rowCountVotes['id'])
                                    ?>
                                    <tr>
                                        <td style="width: 20%;"><?php echo $rowCountVotes['id']; ?></td>
                                        <td style="width: 70%;"><?php echo $rowCountVotes['name']; ?></td>
                                        <td style="width: 10%;"><?php echo $rtnCountVotes->num_rows; ?></td>
                                    </tr>





                                <?php } //End while ?>
                            </table>
                            <?php $rtnReadNomOrgPos->free(); } //End if ?>
                        </div>

                    <?php } //End while ?>

                <?php $rtnReadPos->free(); } //End if ?>

            <?php } //End if ?>
        </div>



    </div>
</div>

<?php include_once ("inc/footer.php");?>