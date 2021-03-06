<?php include('server.php');?>

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
      width: 100%; /* Set width to 100% */
      min-height: 100px;
      border-radius: 25px;
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
          padding-bottom: 20px;
          padding-left: 20px;
          padding-right: 20px;
      }
      
      h2{
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
      
      
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="logo.png" alt="Logo">
    </div>
    <ul class="nav navbar-nav">
      <li><a href="main.php">Home</a></li>
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
      <li><a href="search.html" class="active">Search</a></li> 
        
      <?php if(isset($_SESSION['username'])) : ?>
      <li><a href="profile.php">Profile</a></li>
        
      <?php else: ?>
        
      <li><a href="register.php">Profile</a></li> 
        
      <?php endif ?>
        
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav> 

    
         <div class="container">
         <div class="row">
            <form class="navbar-form form-inline navbar-right ml-auto" action="search.php" method="get">
                <div class="input-group search-box">
                    <input type="text" class="form-control" name="search">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-primary"><span>Search</span></button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    
<div class="container">
<h2><b>SEARCH</b></h2>
</div>    

    
  


<footer class="container-fluid text-center">
  <p style="color: white">Website created by Adrian Borkowski C17384436</p>
</footer>    
    
</body>
</html>
