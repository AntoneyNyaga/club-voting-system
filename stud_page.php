<?php
//Include authentication
require("process/auth.php");

//Include database connection
require("config/db.php");

//Include class Voting
require("classes/Voting.php");
?>

<?php include_once ("inc/header.php");?>

<?php
$readOrganization = new Voting();
$rtnReadOrg = $readOrganization->READ_ORG();
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h3 style="text-align: center;">Select Club</h3><hr />
            <h4>Welcome <?php echo $_SESSION['NAME']; ?></h4>
            <?php if($rtnReadOrg) { ?>
            <form action="voting_page.php" method="GET" role="form">
                <div class="form-group">
                    <label for="organization">Club</label>
                    <select required class="form-control" name="organization">
                        <option value="">*****Select Club*****</option>

                        <?php $query=mysqli_query($db,"select * from organization where status=1");
                        $cnt=1; while($row=mysqli_fetch_array($query)){
                        ?>							
                        <option value="<?php echo ($row['org']); ?>"><?php echo($row['org']); ?></option>
                        <?php } //End while ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="btn btn-info">
                </div>
            </form>
                <?php $rtnReadOrg->free(); ?>
            <?php } //End if ?>
        </div>
    </div>
</div>


<?php include_once ("inc/footer.php");?>