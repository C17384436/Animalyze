<?php 
  session_start(); 
  $username = $_SESSION['username'];

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Submit A Pet</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      footer {
       background-color: #252525;
       padding: 25px;
       position:static;
      }
    
      img{
       width:80%;
       object-fit: cover;
      }
      
    .carousel-inner img {
      width: 100%;
      min-height: 100px;
      border-radius: 25px;
      background-image: url(test.png);
      padding-top: 130px;
      padding-bottom: -10px;
      }

      body {
       background-color: #7F9B94;
       background-size:cover;
       background-attachment:fixed;
      }
    
      form{
          
          border-radius: 25px;
          background-color:white;
          background-position: top;
          padding-left: 20px;
          padding-right: 20px;
      }
      
      h1{
          border-radius: 25px;
          background-image: url(test.png);
          background-position: left;
          color:white;
          text-align: center;
      }
      
      label{
       padding-left: 5px;
      }
      
      a{
        border-radius: 25px;  
      }
      
      h3{
          
      }
      
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="logo.png" alt="Logo">
    </div>
    <ul class="nav navbar-nav">
      <li><a href="main.php" class="active">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Lost<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="lostpets.php">View Lost Pets</a></li>
          <li><a href="submitlost.php">Submit Lost Pet Form</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Found<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="foundpets.php">View Found Pets</a></li>
          <li><a href="submitfound.php">Submit Found Pet Form</a></li>
        </ul>
      </li>
      <li><a href="search.php">Search</a></li>
        
      <?php if(isset($_SESSION['username'])) : ?>
      <li><a href="profile.php">Profile</a></li>
        
      <?php else: ?>
        
      <li><a href="register.php">Profile</a></li> 
        
      <?php endif ?>
        
    </ul>
      
    <?php if(isset($_SESSION['username'])) : ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a>Welcome <strong><?php echo $_SESSION['username']; ?></strong>!</a></li>
      <li><a href="main.php?logout='1'"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
      
    <?php else: ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    <?php endif ?>
  </div>
</nav> 
    
    
    <div class="content">
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
</div>
    <div class="container">
        <h2>Your<b> Profile</b></h2>
        <h3><?php echo $_SESSION['username']; ?>'s Profile</h3>
        <br>
        
        
        
        <script>
        function myFunctionA()
        {
            alert("Photo updated successfully!");
        }
        </script>
        
        <script>function myFunctionB()
        {
                alert("File Size Limit Crossed 200 KB Use Picture Size less than 200 KB!");
        } 
        </script>
        
        
        <?php

        $db=new mysqli('localhost','root','','imagedb');
        if($db->connect_errno)
        {
            echo $db->connect_error;
        }
        $pull="select * from users where username='$username'";
        $allowedExts = array("jpg", "jpeg", "gif", "png","JPG");
        $extension = @end(explode(".", $_FILES["file"]["name"]));
        if(isset($_POST['pupload'])){
        if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/JPG")
        || ($_FILES["file"]["type"] == "image/png")
        || ($_FILES["file"]["type"] == "image/pjpeg"))
        && ($_FILES["file"]["size"] < 200000) && in_array($extension, $allowedExts)) { if ($_FILES["file"]["error"]> 0)
            {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            }
            else
            {
            echo '<div class="plus">';
            if (file_exists("upload/" . $_FILES["file"]["name"]))
            {
            unlink("upload/" . $_FILES["file"]["name"]);
            }
            else{
            $pic=$_FILES["file"]["name"];
            $conv=explode(".",$pic);
            $ext=$conv['1'];
            move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$username.".".$ext);
            $url=$username.".".$ext;
            $query="update users set url='$url', lastUpload=now() where username='$username'";
            if($upl=$db->query($query)){
            echo "<script type='text/javascript'>myfunctionA()</script>";
            }
            }
            }
            }else{
             echo "<script type='text/javascript'>myfunctionB()</script>";
            }
            }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <?php
                    $res=$db->query($pull);
                    $pics=$res->fetch_assoc();
                    echo '<div class="imgLow" align="middle">';
                    echo "<img src='upload/$pics[url]' alt='profile picture' width='300' height='350' class='doubleborder'/></div>";
                ?>
                <input type="file" name="file" class="button"/>
                <input type="submit" name="pupload" class="button" value="Upload" />
        </form>
        
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Your <b> Forms</b></h2>
                
                
                </div>
            </div>
        </div>
</body>
</html>    