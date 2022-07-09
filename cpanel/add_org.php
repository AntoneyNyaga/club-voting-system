<?php

//Include authentication
require("process/auth.php");

//Include database connection
require("../config/db.php");

//Include class Organization
require("classes/Organization.php");

?>
<?php include_once("inc/header.php"); ?>

    <!-- Using internal/embedded css -->
    <style>
        .btn{
            background-color:#697178;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            cursor: pointer;
            border-radius: 20px;
        }
        .green{
            background-color: #199319;
        }
        .red{
            background-color: red;
        }
        table,th{
            border-style : solid;
            border-width : 1;
            text-align :left;
        }
        td{
            text-align :left;
        }
    </style> 

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h4>Add Club</h4><hr>
            <?php
            if(isset($_POST['submit'])) {

                $org = trim($_POST['organization']);
                $active = trim($_POST['active']);

                $query = mysqli_query($db,"INSERT INTO organization VALUES(0, '$org', '$active')");             
            }
            ?>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" role="form">
                <div class="form-group-sm">
                    <label for="organization">Club Name</label>
                    <input required type="text" name="organization" class="form-control" require ><br>
                    <tr><td><input type= "radio" name="active" value="1" required> Active 
                    <input type= "radio" name="active" value="0" required> Inactive</td></tr>

                </div><hr>
                <div class="form-group-sm">
                    <input type="submit" name="submit" value="Submit" class="btn">
                </div>

            </form>
        </div>

        <div class="col-md-8">
            <h4>List of Clubs</h4><hr>
            <?php
            $readOrg = new Organization();
            $rtnReadOrg = $readOrg->READ_ORG();
            ?>
            <div class="table-responsive">
                <?php if($rtnReadOrg) { ?>
                <table class="table table-bordered table-condensed table-striped">
                    <tr>
                        <th>Organization</th>
                        <th><span class="glyphicon glyphicon-edit"></span></th>
                        <th><span class="glyphicon glyphicon-remove"></span></th>
                        <th>status</th>
                        <th>change status</th>
                    </tr>
                    <?php $query=mysqli_query($db,"select * from organization");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
                    <tr>
                        <td><?php echo htmlentities($row['org']);?></td>
                        <td><a href="http://localhost/voting/cpanel/edit_org.php?id=<?php echo htmlentities($row['id']);?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <td><a href="http://localhost/voting/cpanel/delete_org.php?id=<?php echo htmlentities($row['id']);?>"><span class="glyphicon glyphicon-remove"></span></a></td>
                        <td><?php $st=$row['status'];

                                            if($st==1)
                                            {
                                                echo "Active";
                                            }
                                            else
                                            {
                                                echo "Inactive";
                                            }
										 ?></td>
                                         <td>
                                         <?php 
                    if($st=$row['status']=="1") 
  
                        // if a course is active i.e. status is 1 
                        // the toggle button must be able to deactivate 
                        // we echo the hyperlink to the page "deactivate.php"
                        // in order to make it look like a button
                        // we use the appropriate css
                        // red-deactivate
                        // green- activate
                        echo 
"<a href=deactivate.php?id=".$st=$row['id']." class='btn red'>Deactivate</a>";
                    else 
                        echo 
"<a href=activate.php?id=".$st=$row['id']." class='btn green'>Activate</a>";
                    ?></td>
                        
                    </tr>
                    <?php } //End while ?>
                </table>
                <?php $rtnReadOrg->free(); ?>
                <?php } //End if ?>
            </div>
        </div>
    </div>
</div>

<?php include_once ("inc/footer.php");?>

<?php
//Close database connection
$db->close();