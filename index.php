

<?php include_once ("inc/header.php");?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-con">
                <h3>Student Login</h3><hr>
                <?php
                if(isset($_SESSION['ERROR_MSG_ARRAY']) && is_array($_SESSION['ERROR_MSG_ARRAY']) && COUNT($_SESSION['ERROR_MSG_ARRAY']) > 0) {
                    foreach($_SESSION['ERROR_MSG_ARRAY'] as $msg) {
                        echo "<div class='alert alert-danger'>";
                        echo $msg;
                        echo "</div>";
                    }
                    unset($_SESSION['ERROR_MSG_ARRAY']);
                }
                ?>
                <form method="post" action="process/login.php" role="form">
                    <div class="form-group has-warning has-feedback">
                        <label for="stud_id">Sudent ID</label>
                        <input type="text" name="stud_id" id="stud_id" class="form-control" autocomplete="off">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                        <button type="submit" name="submit" class="btn btn-info">Submit</button>
                   </div>
        </form>
         </div>
    </div>
</div>

<?php include_once ("inc/footer.php");?>
