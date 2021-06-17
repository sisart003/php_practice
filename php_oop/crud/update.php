<?php
    // include database connection file
    include_once("function.php");

    
    //Object
    $updatedata=new DB_con();
    if(isset($_POST['update']))
    {
        // Get the userid
        $userid=intval($_GET['id']);
        // Posted Values
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $emailid=$_POST['emailid'];
        $contactno=$_POST['contactno'];
        $address=$_POST['address'];
        //Function Calling
        $sql=$updatedata->update($fname,$lname,$emailid,$contactno,$address,$userid);
        // Mesage after updation
        echo "<script>alert('Record Updated successfully');</script>";
        // Code for redirection
        echo "<script>window.location.href='index.php'</script>";
    }
    // Get the userid
    $userid=intval($_GET['id']);
    $onerecord=new DB_con();
    $sql=$onerecord->fetchonerecord($userid);
    $cnt=1;
    while($row=mysqli_fetch_array($sql))
    {
  ?>
<form name="insertrecord" method="post">
    <div class="row">
        <div class="col-md-4"><b>First Name</b>
            <input type="text" name="firstname" value="<?php echo htmlentities($row['FirstName']);?>" class="form-control" required>
        </div>
        <div class="col-md-4"><b>Last Name</b>
            <input type="text" name="lastname" value="<?php echo htmlentities($row['LastName']);?>" class="form-control" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"><b>Email id</b>
            <input type="email" name="emailid" value="<?php echo htmlentities($row['EmailId']);?>" class="form-control" required>
        </div>
        <div class="col-md-4"><b>Contactno</b>
            <input type="text" name="contactno" value="<?php echo htmlentities($row['ContactNumber']);?>" class="form-control" maxlength="10" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8"><b>Address</b>
            <textarea class="form-control" name="address" required><?php echo htmlentities($row['Address']);?></textarea>
        </div>
    </div>
    <?php } ?>
    <div class="row" style="margin-top:1%">
        <div class="col-md-8">
            <input type="submit" name="update" value="Update">
        </div>
    </div>
</form>