<?php

//Include class Voters
require("classes/Voters.php");

?>

<?php include_once ("inc/header.php");?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <?php
            if(isset($_GET['id'])) {
                $voter_id = trim($_GET['id']);

                echo "<div class='alert alert-danger'>Are you sure you want to delete selected voter? <a href='http://localhost/voting/cpanel/delete_voter.php?del_id=$voter_id'>Yes</a> | <a href='http://localhost/voting/cpanel/add_voters.php'>No</a></div>";
            }


            if(isset($_GET['del_id'])) {
                $id_to_del = $_GET['del_id'];

                $delVoter = new Voters();
                $rtnDelVoter = $delVoter->DELETE_VOTER($id_to_del);
            }
            ?>
        </div>
    </div>
</div>

<?php include_once ("inc/footer.php");?>