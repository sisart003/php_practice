<?php
    include('function.php');
    if(isset($_GET['del']))
    {
    // Geeting deletion row id
    $rid=$_GET['del'];
    $deletedata=new DB_con();
    $sql=$deletedata->delete($rid);
    if($sql)
        {
            // Message for successfull insertion
            echo "<script>alert('Record deleted successfully');</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }
?>
<table id="mytable" class="table table-bordred table-striped">
    <thead>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Posting Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?php
        $fetchdata=new DB_con();
        $sql=$fetchdata->fetchdata();
        $cnt=1;
        while($row=mysqli_fetch_array($sql))
        {
        ?>
            <tr>
            <td><?php echo htmlentities($cnt);?></td>
            <td><?php echo htmlentities($row['FirstName']);?></td>
            <td><?php echo htmlentities($row['LastName']);?></td>
            <td><?php echo htmlentities($row['EmailId']);?></td>
            <td><?php echo htmlentities($row['ContactNumber']);?></td>
            <td><?php echo htmlentities($row['Address']);?></td>
            <td><?php echo htmlentities($row['PostingDate']);?></td>
        <td><a href="update.php?id=<?php echo htmlentities($row['id']);?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil">e</span></button></a></td>
        <td><a href="index.php?del=<?php echo htmlentities($row['id']);?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span>d</button></a></td>
            </tr>
        <?php
        // for serial number increment
        $cnt++;
        } ?>
    </tbody>
</table>