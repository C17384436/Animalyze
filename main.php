<?php 

    session_start();

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location:login.php");
    }
?>

<!DOCTYPE html>


<html lang="en">
<head>
  <title>Animalyze FYP</title>
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
     }
      
      @media (max-width: 600px) {
       .carousel-caption {
         display: none; 
        }
      }
      
      
      body {
       background-color: #7F9B94;
       background-size:cover;
       background-attachment:fixed;
      }
      
      well{
        background-color: aqua;
          
      }
      
      h1{
        text-align:center;
        color: white;
        background-color: white;
        background-size: 50%;
        border-radius: 25px;
        background-image: url(test.png);
      }
      
      h3{
       text-align:center;  
        color: white;
        background-size: 50%;
        border-radius: 25px;
        background-image: url(test.png);
          
      }
      
      a{
        border-radius: 25px;  
      }
      
      
      carousel-inner{
          border-radius: 25px;
      }
      
      p{
          text-align: auto;
          font-size: 18px;
        }
      
      form{
          background-color: white;
          border-radius: 25px;
          padding-left: 25px;
          padding-right: 25px;
          padding-top: 25px;
          padding-bottom: 25px;
      }
      
      
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

<div class="container">
<h1><b>ANIMALYZE - A Lost & Found Pet Board</b></h1>
<br>
</div>

    
<div class="container">
<div class="row">
  <div class="col-sm-12">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="bg.jpg" alt="Image">
          <div class="carousel-caption">
          </div>      
        </div>

        <div class="item">
          <img src="bg2.jpg" alt="Image">
          <div class="carousel-caption">
          </div>      
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
<hr>
</div>

<div class="container text-center">    
  <h3><b>How It Works</b></h3>
  <br>
    
  <form>
    
    <div class="row">
        
      <div class="col-sm-12">
        <img src="col2.png" class="img-responsive" style="width:100%" alt="Image">
      </div>
        
    </div>
    
    <br> 
    
    <div class="row">
        
      <div class="col-sm-6">
        <div class=".">
          <p><b>Lost/Found An Animal?</b></p>
        </div>
        <div class="well">
          <p>Make sure to check out our Lost and Found tabs on the top bar! From there, you can press "Submit a Lost Pet" or "Submit a Found Pet" and fill out the registration form to register a lost or a found pet.<br><br> Please remember that pets are family to most, fill in the form with as much information as possible! </p>
        </div>
      </div>
        
        
      <div class="col-sm-6">
        <div class=".">
          <p><b>Looking For An Animal?</b></p>
        </div>
      <div class="well">
         <p>To search for potentially already registered pets, please make sure to look at the "View Lost Pets" or "View Found Pets" sections under the "Lost" and "Found" tabs found up above.<br><br> Otherwise, you can click "Search" for a more precise view! <br><br> </p>
      </div>
      </div>
        
    </div>
    
  </form>

  <hr>
    
</div>
    

<div class="container">
    <h3><b>Some Lost Animals</b></h3>
  <br>
  <form>
    <div class="row">
    <div class="col-md-2">
      <div class="thumbnail">
        <a href="1.jpg" target="_blank">
          <img src="1.jpg" width="350" height="263" alt="Lights" style="width:100%">
          <div class="caption">
            <p>Lucy</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-2">
      <div class="thumbnail">
        <a href="2.jpg" target="_blank">
          <img src="2.jpg" width="350" height="263" alt="Nature" style="width:100%">
          <div class="caption">
            <p>Sam</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-2">
      <div class="thumbnail">
        <a href="3.jpg" target="_blank">
          <img src="3.jpg" width="350" height="263"alt="Fjords" style="width:100%">
          <div class="caption">
            <p>Pebbles</p>
          </div>
        </a>
      </div>
    </div>
      <div class="col-md-2">
      <div class="thumbnail">
        <a href="4.jpg" target="_blank">
          <img src="4.jpg" alt="Lights" style="width:100%">
          <div class="caption">
            <p>Bowie</p>
          </div>
        </a>
      </div>
    </div>
      <div class="col-md-2">
      <div class="thumbnail">
        <a href="5.jpg" target="_blank">
          <img src="5.jpg" alt="Lights" style="width:100%">
          <div class="caption">
            <p>Heidi</p>
          </div>
        </a>
      </div>
    </div>
      <div class="col-md-2">
      <div class="thumbnail">
        <a href="6.jpg" target="_blank">
          <img src="6.jpg" alt="Lights" style="width:100%">
          <div class="caption">
            <p>Rocco</p>
          </div>
        </a>
      </div>
    </div>
  </div>
 </form>
</div>

<br>
    
    
    
<footer class="container-fluid text-center">
  <p style="color: white">Website created by Adrian Borkowski C17384436</p>
</footer>  
  
</body>
</html>
