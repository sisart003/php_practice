<?php
  session_start();
//Database Configuration File
include('config.php');
error_reporting(0);
  if(isset($_POST['login']))
  {
    // Getting username/ email and password
    $uname=$_POST['username'];
    $password=md5($_POST['password']);
    // Fetch data from database on the basis of username/email and password
    $sql ="SELECT UserName,UserEmail,LoginPassword FROM userdata WHERE (UserName=:usname || UserEmail=:usname) and (LoginPassword=:usrpassword)";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':usname', $uname, PDO::PARAM_STR);
    $query-> bindParam(':usrpassword', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
    $_SESSION['userlogin']=$_POST['username'];
    echo "<script > document.location = 'welcome.php'; </script>";
  } else{
    echo "<script>alert('Invalid Details');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PDO | Registration Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
  <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
        </head>
<body>
<form id="loginForm" method="post">
<div class="form-group">
<label for="username" class="control-label">Username / Email id</label>
<input type="text" class="form-control" id="username" name="username"  required="" title="Please enter you username or Email-id" placeholder="email or username" >
 <span class="help-block"></span>
 </div>
<div class="form-group">
<label for="password" class="control-label">Password</label>
<input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" required="" title="Please enter your password">
 <span class="help-block"></span>
</div>
<button type="submit" class="btn btn-success btn-block" name="login">Login</button>
</form>

</body>
</html>