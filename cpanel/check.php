<?php
  include "config.php";
  $s=$_POST['active'];
  $s=$_POST['rmvfile'];
  $sel="update organization set status=$status where id='".$_POST['rmvfile']."'";  //your query
 $sel1=mysql_query($sel);
 ?>