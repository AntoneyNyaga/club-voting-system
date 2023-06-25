<?php
//Start session
session_start();

unset($_SESSION['ID']);
unset($_SESSION['NAME']);
unset($_SESSION['COURSE']);
unset($_SESSION['YEAR']);
unset($_SESSION['STUD_ID']);
?>

<?php include_once ("inc/header.php");?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <Ediv class="login-con">
                <h3>Student Login</h3><hr>

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
