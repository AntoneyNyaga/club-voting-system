<?php

require("process/auth.php");


require("config/db.php");


require("classes/Voting.php");
?>

<?php include_once ("inc/header.php");?>

<?php
if(isset($_GET['organization'])) {
    $org = $_GET['organization'];
}
?>

<?php

$readPos = new Voting();
$rtnReadPos = $readPos->READ_POSITION($org);

?>

<div class="container">
    <div class="row">
        <?php if($rtnReadPos) { ?>
        <div class="col-md-6 col-md-offset-3">
            <?php
            if(isset($_POST['vote'])) {
                $org            = trim($_POST['org']);
                $pos            = trim($_POST['pos']);
                $candidate_id   = trim($_POST['nominee']);
                $voters_id       = trim($_POST['voter_id']);


                $insertVote = new Voting();
                $rtnInsertVote = $insertVote->VOTE_NOMINEE($org, $pos, $candidate_id, $voters_id);
            }

            ?>
            <div class="voting-con"> <br>

                <h4 style="text-align: center;"><?php echo $org; ?> Voting Page</h4><hr />
                <?php while($rowPos = $rtnReadPos->fetch_assoc()) { ?>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" role="form">
                    <p class="help-block"><b><?php echo $rowPos['pos']; ?></b></p>
                        <?php
                        $readNominee = new Voting();
                        $rtnReadNominee = $readNominee->READ_NOMINEES($org, $rowPos['pos']);
                        ?>

                        <?php if($rtnReadNominee) { ?>
                            <div class="form-group">
                                <select name="nominee" class="form-control">
                                    <option value="">*****Select Nominee*****</option>
                                    <?php while($rowNominee = $rtnReadNominee->fetch_assoc()) { ?>
                                    <option value="<?php echo $rowNominee['id']; ?>"><?php echo $rowNominee['name']; ?></option>
                                    <?php } //End while ?>
                                </select>
                            </div>
                        <?php } //End if ?>
                        <input type="hidden" name="org" value="<?php echo $org; ?>">
                        <input type="hidden" name="pos" value="<?php echo $rowPos['pos']; ?>">
                        <input type="hidden" name="voter_id" value="<?php echo $_SESSION['ID']; ?>">

                    <?php
                    $validateVote = new Voting();
                    $rtnValVote = $validateVote->VALIDATE_VOTE($org, $rowPos['pos'], $_SESSION['ID'])
                    ?>
                        <button type="submit" name="vote"
                                <?php if($rtnValVote->num_rows > 0) { ?>
                                <?php echo "class='btn btn-default disabled'>"; ?>
                                <?php } else { ?>
                                <?php echo "class='btn btn-info'>"; ?>
                                <?php } //End if ?>
                            Vote
                        </button>
                </form><hr />
                <?php } //End while ?>
            </div>
        </div>
        <?php } //End if ?>
    </div>
</div>

<?php include_once ("inc/footer.php");?>
