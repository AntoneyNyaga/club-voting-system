



<option value="">*****Select Position*****</option>
<?php if($result) { ?>
    <?php while($rowPos = $result->fetch_assoc()) { ?>
        <option value="<?php echo $rowPos['pos']; ?>"><?php echo $rowPos['pos']; ?></option>
    <?php } //End while ?>
<?php } //End if ?>

</html>